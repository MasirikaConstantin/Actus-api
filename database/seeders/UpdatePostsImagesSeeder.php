<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatePostsImagesSeeder extends Seeder
{
    /**
     * Exécute le seeder.
     */
    public function run(): void
    {
        // Liste des images disponibles
        $images = [
            'posts/0wEHk2n0yt8yLujtnOK7gbUt1dQbc93TdwNF02VB.png',
            'posts/2FZiRkC7sQ53qYPQ5IkXmJ2kvhmplWvvMsinDsJH.jpg',
            'posts/46XVLpwroQDxByAnwFmbpXh7V3BbtSk7CA7pdxmt.svg',
        ];

        // Récupérer uniquement les posts où la colonne `image` est null
        $posts = DB::table('posts')
            ->whereNull('image') // Condition pour vérifier si `image` est null
            ->get();

        // Parcourir chaque post et mettre à jour l'image de manière aléatoire
        foreach ($posts as $post) {
            $randomImage = $images[array_rand($images)]; // Sélectionner une image aléatoire
            DB::table('posts')
                ->where('id', $post->id)
                ->update(['image' => $randomImage]);
        }
    }
}