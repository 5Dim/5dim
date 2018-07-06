<?php

use Faker\Generator as Faker;
use App\Planetas;

$factory->define(Planetas::class, function (Faker $faker) {
    return [
        'jugadores_id' => 1,
        'estrella' => $faker->numberBetween($min = 0, $max = 10000),
        'orbita' => $faker->numberBetween($min = 0, $max = 9),
        'nombre' => $faker->name(),
        'imagen' => $faker->numberBetween($min = 0, $max = 50),
        'mov1' => $faker->numberBetween($min = 0, $max = 15),
        'mov2' => $faker->numberBetween($min = 0, $max = 15),
    ];
});