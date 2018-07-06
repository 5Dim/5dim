<?php

use Faker\Generator as Faker;
use App\Recursos;

$factory->define(Recursos::class, function (Faker $faker) {
    return [
        'personal' => $faker->numberBetween($min = 0, $max = 1000000000),
        'mineral' => $faker->numberBetween($min = 0, $max = 1000000000),
        'cristal' => $faker->numberBetween($min = 0, $max = 1000000000),
        'gas' => $faker->numberBetween($min = 0, $max = 1000000000),
        'plastico' => $faker->numberBetween($min = 0, $max = 1000000000),
        'ceramica' => $faker->numberBetween($min = 0, $max = 1000000000),
        'liquido' => $faker->numberBetween($min = 0, $max = 1000000000),
        'micros' => $faker->numberBetween($min = 0, $max = 1000000000),
        'fuel' => $faker->numberBetween($min = 0, $max = 1000000000),
        'ma' => $faker->numberBetween($min = 0, $max = 1000000000),
        'municion' => $faker->numberBetween($min = 0, $max = 1000000000),
        'planetas_id' => 1,
    ];
});