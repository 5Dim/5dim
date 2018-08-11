<?php

use Faker\Generator as Faker;
use App\Jugadores;

$factory->define(Jugadores::class, function (Faker $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 100),
        'nombre' => $faker->name,
        'universo_id' => 0,
        'premiun_at' => date("Y-m-d H:i:s"),
    ];
});