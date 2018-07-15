<?php

use Faker\Generator as Faker;
use App\Jugadores;

$factory->define(Jugadores::class, function (Faker $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 0, $max = 100),
        'universo_id' => 0,
    ];
});