<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentaireSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// Assurez-vous que des posts existent
        if (Post::count() === 0) {
            \App\Models\Post::factory(10)->create(); // Génère des posts si nécessaires
        }

        // Créez des sections liées aux posts existants
        Commentaire::factory(1550)->create(); // Génère 50 sections aléatoires
    }
}
