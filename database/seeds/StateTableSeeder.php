<?php

namespace Database\Seeders;

use App\State;
use Illuminate\Database\Seeder;


class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            State::create([
                'name' => fake()->state(),
            ]);
        }
    }
}
