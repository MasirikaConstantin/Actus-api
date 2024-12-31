<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\PostValidator;
use App\Http\Requests\Api\V1\ReactionValidator;
use App\Http\Resources\CarousselRessource;
use App\Http\Resources\FavorisResource;
use App\Http\Resources\RessourcePostAll;
use App\Http\Resources\UnPostRessource;
use App\Models\Categorie;
use App\Models\Favori;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    

    public function index(Request $request)
{
    $validatedData = $request->validate([
        'limit' => 'nullable|integer|min:1|max:100'
    ]);
    
    $limit = $validatedData['limit'] ?? 10;
    
    // Récupérer les posts avec les sections, les réactions, et les commentaires
    $posts = Post::select('id','titre',"slug",'introduction','image', 'temps','type_id','categorie_id', 'user_id', 'status', "created_at", 'vues')
    ->with(['sections', 'commentaires','categorie'])
    ->where('status','=',1)
        ->withCount([
            'reactions as total_reactions',
            'reactions as true_reactions' => function ($query) {
                $query->where('reaction', true); // ou 1 selon votre logique
            },
            'reactions as false_reactions' => function ($query) {
                $query->where('reaction', false); // ou 0 selon votre logique
            },
            'commentaires', // Comptage des commentaires pour chaque post
            'favoris'
        ])->orderBy('created_at', 'desc')
        ->paginate($limit);
    
    return response()->json([
        'message' => 'Liste des posts paginée récupérée avec succès.',
        'posts' => $posts
    ]);
    
}


    /**
     * Enregistrer un nouveau post
     */
    public function store(PostValidator $request)
    {

       $post =Post::create($this->extractData(new Post(), $request));

       

        return response()->json($post, 201);
    }


    private function extractData(Post $post,PostValidator $request){
        $data=$request->validated();
        //dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
            $data['image']=$image->store("imagePost",'public');
        return $data;
    }




public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
public function show(Post $post)
{
    // Incrementer le compteur de vues
    $post->incrementViewsCount();

    // Charger le post avec les relations et les comptages nécessaires
    $post = Post::where('id', $post->id)
        ->where('status', '=', 1)
        ->with([
            'sections', 
            'reactions', 
            'commentaires.user',  // Charger l'utilisateur associé à chaque commentaire
            'categorie', 
            'user'
        ])
        ->withCount([
            'reactions as total_reactions',
            'reactions as true_reactions' => function ($query) {
                $query->where('reaction', true); // ou 1 selon votre logique
            },
            'reactions as false_reactions' => function ($query) {
                $query->where('reaction', false); // ou 0 selon votre logique
            },
            'commentaires', // Comptage des commentaires
            'favoris' // Comptage des favoris
        ])
        ->firstOrFail();

    // Retourner les données au format JSON
    return new UnPostRessource($post);
   
}



    public function Reaction(Post $post, ReactionValidator $request) {
        //    $request->validated();
            $user = Auth::user();
            $reactionType = request('reaction_type');
        
            // Vérifier si l'utilisateur a déjà réagi au post
            if ($user->reactions()->where('post_id', $post->id)->exists()) {
                $reactions=$user->reactions();
                $reactions->delete();
                return response()->json([
                    'reaction' => "Vous avez annuler votre Réaction à ce Post"
                ]);
                
            } else {
                // Enregistrer la réaction dans la base de données
                $reaction = new Reaction();
                $reaction->user_id = $user->id;
                $reaction->post_id = $post->id;
                $reaction->reaction= $request->validated('reaction');
                $react =$reaction->save();
        }
            return response()->json([
                'reaction' => $react
            ]);
        }

    public function register(){

    }

public function lescategory( string $category, Request $request){
   // $cate = Categorie::find($category);
    //return $category;
    $validatedData = $request->validate([
        'limit' => 'nullable|integer|min:1|max:100'
    ]);
    
    $limit = $validatedData['limit'] ?? 10;
    
    // Récupérer les posts avec les sections, les réactions, et les commentaires
    $posts = Post::where('categorie_id',"=",$category)->with(['sections', 'reactions', 'commentaires','categorie','user'])
        ->withCount([
            'reactions as total_reactions',
            'reactions as true_reactions' => function ($query) {
                $query->where('reaction', true); // ou 1 selon votre logique
            },
            'reactions as false_reactions' => function ($query) {
                $query->where('reaction', false); // ou 0 selon votre logique
            },
            'commentaires', // Comptage des commentaires pour chaque post
            'favoris'
        ])->orderBy('created_at', 'desc')
        ->paginate($limit);
    
        return RessourcePostAll::collection($posts);
    return response()->json([
        'message' => 'Liste des posts paginée récupérée avec succès.',
        'posts' => $posts,
        "category" => $category
    ]);
}

public function caroussel(){
    $posts = Post::whereNotNull('image')
    ->with(['categorie','commentaires'])
    ->where('status','=',1)

    ->withCount([
        'reactions as total_reactions',
        'reactions as true_reactions' => function ($query) {
            $query->where('reaction', true); // ou 1 selon votre logique
        },
        'reactions as false_reactions' => function ($query) {
            $query->where('reaction', false); // ou 0 selon votre logique
        },
        'commentaires', // Comptage des commentaires pour chaque post

    ])
    ->orderBy('created_at', 'desc') // Trie par date de création en ordre décroissant
    ->limit(5)
    ->get();

    return  CarousselRessource::collection($posts);
}

public function populaire(){
    
    $mostPopularPost = Post::
    select('id', 'titre','introduction','categorie_id','image') // image est nécessaire car utilisé par l'accesseur
    ->withCount(['reactions'])
    ->where('status','=',1)
    ->orderBy('reactions_count', 'desc')
    ->limit(5)
    ->get();

    return response()->json([
        'message' => 'Liste des posts les plus récupérée avec succès.',
        'posts' => $mostPopularPost,
    ]);
}

public function sponsorise(){

        $sponsorisePost = Post::
        select('id', 'titre', 'introduction', 'categorie_id', 'nature_id','image',"status")
        ->whereHas('nature', function($query) {
            $query->where('nom', 'Sponsorise');
        })->with("categorie")
    ->where('status','=',1)

        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    return response()->json([
        'message' => 'Liste des posts sponsorisés récupérée avec succès.',
        'posts' => $sponsorisePost,
    ]);
}

public function plusvue(){
    
    $mostPopularPost = Post::
    select('id', 'titre','introduction','categorie_id',"vues",'status') 
    ->where('status','=',1)
    ->orderBy('vues', 'desc') // Trie par le nombre de réactions en ordre décroissant
    ->limit(10)->get(); // Récupère le post le plus populaire


    return response()->json([
        'message' => 'Liste des posts les plus récupérée avec succès.',
        'posts' => $mostPopularPost,
    ]);
}

public function search(Request $request)
{
    $query = $request->get('query');

    $posts = Post::select('posts.id', 'posts.titre', 'posts.introduction', 'posts.image', 'posts.categorie_id')
        ->join('categories', 'posts.categorie_id', '=', 'categories.id')
        ->where('posts.status', 1)
        ->where(function($q) use ($query) {
            $q->where('posts.titre', 'LIKE', "%{$query}%")
              ->orWhere('posts.introduction', 'LIKE', "%{$query}%")
              ->orWhere('categories.name', 'LIKE', "%{$query}%");
        })
        ->with('categorie:id,name')
        ->limit(10)
        ->get();

    // Ajouter l'URL de l'image à chaque post
   // $posts->each(function($post) {
     //   $post->image = $post->image;
   // });

    return response()->json([
        'posts' => $posts
    ]);
}

public function mesfavoris(User $user) {
  //  $user = User::find($userId); // Remplacez $userId par l'ID de l'utilisateur
  $favoris = $user->favoris()->with(['categorie','nature'])->get();
  // Collection de posts favoris
    return FavorisResource::collection($favoris);
   
}


public function hasReacted(Request $request, Post $post)
{

    $validatedData = $request->validate([
        'user_id'=>'required|exists:users,id',
        "post_id"=>'required|exists:posts,id'
    ]);
    $user = User::find($validatedData['user_id']);

    if (!$user) {
        return response()->json([
            'message' => 'Utilisateur non authentifié'
        ], 401);
    }

    // Vérifier si l'utilisateur a réagi à ce post
    //$hasReacted = $post->reactions()->where('user_id', $user->id)->exists();
    $existingReaction = $user->reactions()->where('post_id', $validatedData['post_id'])->exists();


    return response()->json([
        'has_reacted' => $existingReaction
    ]);

}

}

