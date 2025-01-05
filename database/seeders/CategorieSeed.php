<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $categories = [
        [
            'name' => 'Électronique',
            'description' => 'Appareils et gadgets électroniques',
            'icon' => '📱',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Vêtements',
            'description' => 'Mode et vêtements',
            'icon' => '👗',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Électroménager',
            'description' => 'Appareils ménagers et essentiels pour la maison',
            'icon' => '🏠',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Livres',
            'description' => 'Tous types de livres',
            'icon' => '📚',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Sports',
            'description' => 'Équipements et matériel de sport',
            'icon' => '⚽',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Jouets',
            'description' => 'Jouets pour enfants et adultes',
            'icon' => '🧸',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Beauté',
            'description' => 'Produits de beauté et soins personnels',
            'icon' => '💄',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Automobile',
            'description' => 'Pièces et accessoires pour voitures',
            'icon' => '🚗',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Informatique',
            'description' => 'Ordinateurs et accessoires informatiques',
            'icon' => '💻',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Jardinage',
            'description' => 'Outils et plantes pour le jardin',
            'icon' => '🌱',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Actualités',
            'description' => 'Informations et nouvelles du monde',
            'icon' => '📰',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Politique',
            'description' => 'Actualités et débats politiques',
            'icon' => '🏛️',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'International',
            'description' => 'Nouvelles et événements internationaux',
            'icon' => '🌍',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Économie',
            'description' => 'Actualités économiques et financières',
            'icon' => '💹',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Culture',
            'description' => 'Actualités culturelles et artistiques',
            'icon' => '🎭',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Santé',
            'description' => 'Nouvelles et conseils sur la santé',
            'icon' => '🏥',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Technologie',
            'description' => 'Nouvelles et innovations technologiques',
            'icon' => '🚀',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ];

    // Insertion des données dans la table
    DB::table('categories')->insert($categories);
}
}
