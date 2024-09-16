<?php

namespace Database\Seeders;

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'name' => 'Admin'
        ]);
        UserType::create([
            'name' => 'Discente'
        ]);
        UserType::create([
            'name' => 'Docente'
        ]);
        UserType::create([
            'name' => 'Técnico'
        ]);
    }
}
