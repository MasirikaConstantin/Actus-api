<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reaction>
 */
class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->value('id') ?? Post::factory(), // ID valide ou nouveau Post
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(), // ID valide ou nouveau Post
            "reaction"=>rand(1, 0),

        ];
    }
}
