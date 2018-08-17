<?php

use Faker\Generator as Faker;
use App\CualidadesPlanetas;

$factory->define(CualidadesPlanetas::class, function (Faker $faker) {
    return [
        'mineral' => $faker->numberBetween($min = 30, $max = 99),
        'cristal' => $faker->numberBetween($min = 30, $max = 99),
        'gas' => $faker->numberBetween($min = 30, $max = 99),
        'plastico' => $faker->numberBetween($min = 30, $max = 99),
        'ceramica' => $faker->numberBetween($min = 30, $max = 99),
        'eje_x' => 0,
        'eje_y' => 0,
        'enfriamiento' => 0,
        'planetas_id' => $faker->numberBetween($min = 0, $max = 1000),
    ];
});