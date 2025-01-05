<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*for($i = 0; $i < 105; $i++){
            \Illuminate\Support\Facades\DB::table('reactions')->insert([
                "user_id"=>rand(2, 10),
                "post_id"=>rand(1, 10),
                "reaction"=>rand(1, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }*/

        /// Assurez-vous que des posts existent
        if (Post::count() === 0) {
            \App\Models\Post::factory(10)->create(); // Génère des posts si nécessaires
        }

        // Créez des sections liées aux posts existants
        Reaction::factory(550)->create(); // Génère 50 sections aléatoires
    }
}
