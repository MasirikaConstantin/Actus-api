<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 15; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                "name"=>"Exemple Utilisateur $i",
                "email"=>"coco$i@gmail.com",
                "password"=>bcrypt("xxxxxxxx"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
