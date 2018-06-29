<?php

use Faker\Generator as Faker;
use App\Recursos;

$factory->define(Recursos::class, function (Faker $faker) {
    return [
        'personal' => $faker->randomDigitNotNull(),
        'mineral' => $faker->randomDigitNotNull(),
        'cristal' => $faker->randomDigitNotNull(),
        'gas' => $faker->randomDigitNotNull(),
        'plastico' => $faker->randomDigitNotNull(),
        'ceramica' => $faker->randomDigitNotNull(),
        'liquidos' => $faker->randomDigitNotNull(),
        'micros' => $faker->randomDigitNotNull(),
        'fuel' => $faker->randomDigitNotNull(),
        'ma' => $faker->randomDigitNotNull(),
        'municion' => $faker->randomDigitNotNull(),
        'planetas_id' => 1,
    ];
});
