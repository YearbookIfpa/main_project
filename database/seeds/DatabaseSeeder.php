<?php

use Database\Seeders\CampusTableSeeder;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\InstitutionTableSeeder;
use Database\Seeders\StateTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\UserTypeTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(InstitutionTableSeeder::class);
        $this->call(CampusTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
