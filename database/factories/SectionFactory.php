<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class SectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->value('id') ?? Post::factory(), // ID valide ou nouveau Post
            'titre' => $this->faker->sentence(6), // Titre aléatoire
            'contenu' => $this->faker->paragraphs(3, true), // Contenu en paragraphes
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Date de création
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'), // Dernière mise à jour
        ];
        //'image' => $this->faker->imageUrl(640, 480, 'sections', true, 'Section Image'), // Image aléatoire

    }
}
