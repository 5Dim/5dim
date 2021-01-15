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
            'jugadores_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'estrella' => $this->faker->numberBetween($min = 1, $max = 9999),
            'orbita' => $this->faker->numberBetween($min = 1, $max = 9),
            'nombre' => $this->faker->name(),
            'imagen' => $this->faker->numberBetween($min = 0, $max = 50),
            'tipo' => 'planeta',
        ];
        // });
    }
}
