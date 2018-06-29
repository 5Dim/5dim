<?php

use Faker\Generator as Faker;
use App\Planetas;

$factory->define(Planetas::class, function (Faker $faker) {
    return [
        'user_id' => $faker->random
    ];
});
