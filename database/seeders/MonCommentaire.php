<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Post;
use Faker\Factory as Faker;
class MonCommentaire extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Récupère le post avec l'ID 4
         $post = Post::find(4);

         // Si le post existe, on va créer 50 commentaires aléatoires
         if ($post) {
             // Instancie Faker pour générer des données aléatoires
             $faker = Faker::create();
 
             // Crée 50 commentaires aléatoires
             for ($i = 0; $i < 150; $i++) {
                 Commentaire::create([
                     'post_id' => $post->id,  // Lier le commentaire au post avec l'ID 4
                     'user_id' => rand(1, 10), // Assurez-vous que l'utilisateur existe, ici entre 1 et 10
                     'contenu' => $faker->sentence,  // Crée une phrase aléatoire pour le commentaire
                 ]);
             }
 
             echo "50 commentaires ont été ajoutés au post avec l'ID 4.\n";
         } else {
             echo "Le post avec l'ID 4 n'existe pas.\n";
         }
    }
}
