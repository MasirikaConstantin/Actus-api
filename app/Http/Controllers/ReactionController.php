<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReactionValidated;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;

class ReactionController extends Controller
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
        //
    }
    public function store(Post $post, ReactionValidated $request)
{
    // Récupérer les données validées
    $validatedData = $request->validated();

    // Trouver l'utilisateur
    $user = User::find($validatedData['user_id']);
    if (!$user) {
        return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
    }

    // Vérifier si une réaction existe déjà pour cet utilisateur et ce post
    $existingReaction = $user->reactions()->where('post_id', $validatedData['post_id'])->first();

    if ($existingReaction) {
        // Supprimer la réaction existante
        $existingReaction->delete();

        return response()->json([
            'message' => 'Réaction supprimée avec succès.',
            'reaction' => $existingReaction,
        ], 200);
    }

    // Créer une nouvelle réaction
    $reaction = new Reaction();
    $reaction->user_id = $validatedData['user_id'];
    $reaction->post_id = $validatedData['post_id'];
    $reaction->reaction = $validatedData['reaction'];
    $reaction->save();

    return response()->json([
        'message' => 'Réaction ajoutée avec succès.',
        'reaction' => $reaction,
    ], 201);
}


    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
