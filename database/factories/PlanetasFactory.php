<?php

namespace Database\Factories;

// use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Planetas;



class PlanetasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planetas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $factory->define(Planetas::class, function (Faker $faker) {
        return [
            'jugadores_id' => null,
            'estrella' => $this->faker->numberBetween(1, 9999),
            'orbita' => $this->faker->numberBetween(1, 9),
            // 'nombre' => $this->faker->name(),
            'imagen' => $this->faker->numberBetween(10, 69),
            'creacion' => time(),
            'tipo' => $this->faker->randomElement(['planeta', 'nodriza', 'anubis', 'dyson', 'canon']),
        ];
        // });
    }
}
