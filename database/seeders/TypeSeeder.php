<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'etat' => 0,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'etat' => 1,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        // Insert data into the table
        DB::table('types')->insert($types);
    }
}
