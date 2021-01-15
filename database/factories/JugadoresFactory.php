<?php

namespace Database\Factories;

// use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jugadores;


class JugadoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jugadores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $factory->define(Jugadores::class, function (Faker $faker) {

        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'nombre' => $this->faker->name,
            'universo_id' => 0,
            'premiun_at' => date("Y-m-d H:i:s"),
        ];
        // });
    }
}
