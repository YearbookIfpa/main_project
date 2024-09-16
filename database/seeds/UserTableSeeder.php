<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
        User::create([
            'name' => 'Edinelson Junior',
            'email' => 'edinelsonjr.ufopa@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
            'users_type_id' => 1,
            'campus_id' => fake()->numberBetween(1, 500),
        ]);
        for ($i = 0; $i < 500; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => bcrypt('123456'), // password
                'remember_token' => Str::random(10),
                'users_type_id' => fake()->numberBetween(2, 4),
                'campus_id' => fake()->numberBetween(1, 500),
            ]);
        }
    }
}
