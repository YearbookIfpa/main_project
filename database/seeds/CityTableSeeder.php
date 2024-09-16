<?php

namespace Database\Seeders;

use App\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
            City::create([
                'name' => fake()->city(),
                'states_id' => fake()->numberBetween(1, 50),
            ]);
        }
    }
}
