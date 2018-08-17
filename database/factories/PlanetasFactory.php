<?php

use Faker\Generator as Faker;
use App\Planetas;

$factory->define(Planetas::class, function (Faker $faker) {
    return [
        'jugadores_id' => $faker->numberBetween($min = 1, $max = 100),
        'estrella' => $faker->numberBetween($min = 1, $max = 9999),
        'orbita' => $faker->numberBetween($min = 1, $max = 9),
        'nombre' => $faker->name(),
        'imagen' => $faker->numberBetween($min = 0, $max = 50),
        'tipo' => 'planeta',
    ];
});