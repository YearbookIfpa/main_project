<?php

namespace Database\Seeders;

use App\Institution;
use Illuminate\Database\Seeder;

class InstitutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 300; $i++) {
            Institution::create([
                'name' => fake()->company(),
            ]);
        }
    }
}
