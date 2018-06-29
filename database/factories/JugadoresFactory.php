<?php

use Faker\Generator as Faker;
use App\Jugadores;

$factory->define(Jugadores::class, function (Faker $faker) {
    return [
        'users_id' => 1,
    ];
});
