<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavorisRequest;
use App\Models\Favori;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FavorisRequest $request)
    {

                // Récupérer les données validées
            $validatedData = $request->validated();

            // Trouver l'utilisateur
            $user = User::find($validatedData['user_id']);
            if (!$user) {
                return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
            }

            // Vérifier si une réaction existe déjà pour cet utilisateur et ce post
            $existingReaction = $user->favoris()->where('post_id', $validatedData['post_id'])->first();

            if ($existingReaction) {
                // Supprimer la réaction existante
                $existingReaction->delete();

                return response()->json([
                    'message' => 'Le Post est supprimer de vos favories',
                    'favoris' => $existingReaction,
                ], 200);
            }

            
            $favoris = Favori::create($request->validated());


            return response()->json([
                'message' => 'Ajouté aux favoris',
                'favoris' => $favoris,
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favori $favori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favori $favori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favori $favori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favori $favori)
    {
        //
    }
}
