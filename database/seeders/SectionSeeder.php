<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Post;

class SectionSeeder extends Seeder
{
    public function run()
    {
        // Assurez-vous que des posts existent
        if (Post::count() === 0) {
            \App\Models\Post::factory(10)->create(); // Génère des posts si nécessaires
        }

        // Créez des sections liées aux posts existants
        Section::factory(150)->create(); // Génère 50 sections aléatoires
    }
}
