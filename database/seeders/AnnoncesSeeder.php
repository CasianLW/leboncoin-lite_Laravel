<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnoncesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('annonces')->insert([
                'title' => $faker->sentence(),
                'email' => $faker->email(),
                'name' => $faker->name(),
                'description' => $faker->paragraph(),
                'location' => $faker->city(),
                'price' => $faker->numberBetween(10, 1000),
                'token' => Str::random(10),
                'status' => $faker->boolean(50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}