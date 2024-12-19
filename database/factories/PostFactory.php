<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Nature;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(6), // Titre aléatoire
            'slug' => Str::slug($this->faker->sentence(3)), // Génère un slug à partir du titre
            'introduction' => $this->faker->text(200), // Texte d'introduction aléatoire
            'contenu' => $this->faker->paragraphs(3, true), // Contenu de plusieurs paragraphes
            'temps' => $this->faker->numberBetween(1, 60), // Temps en minutes
            'type_id' => Type::inRandomOrder()->value('id') ?? Type::factory(), // ID valide ou création d'un nouveau Type
            'categorie_id' => Categorie::inRandomOrder()->value('id') ?? Categorie::factory(), // ID valide ou création d'une nouvelle Catégorie
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(), // ID valide ou création d'un nouvel Utilisateur
            'nature_id' => Nature::inRandomOrder()->value('id') ?? Nature::factory(), // ID valide ou création d'une nouvelle Nature
            'status' => $this->faker->numberBetween(0, 1), // Status aléatoire
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Date de création
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'), // Dernière mise à jour
            'deleted_at' => $this->faker->optional()->dateTimeBetween('-6 months', 'now'), // Optionnel : date de suppression
            'vues' => $this->faker->numberBetween(0, 10000), // Nombre de vues factices
        ];
    }
    //'type_id' => $this->faker->numberBetween(1, 5), // Type factice
    //'image' => $this->faker->imageUrl(640, 480, 'articles', true, 'Article Image'), // URL d'image factice

}
