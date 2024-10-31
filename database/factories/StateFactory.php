<?php

namespace Database\Factories;

use App\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(State::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
