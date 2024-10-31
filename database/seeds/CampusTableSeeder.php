<?php

namespace Database\Seeders;

use App\Campus;
use Illuminate\Database\Seeder;

class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
            Campus::create([
                'name' => fake()->city(),
                'cities_id' => fake()->numberBetween(1, 50),
                'institutions_id' => fake()->numberBetween(1, 50),
            ]);
        }
    }
}
