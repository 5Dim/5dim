<?php

namespace Database\Factories;

// use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CualidadesPlanetas;

class CualidadesPlanetasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CualidadesPlanetas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $factory->define(CualidadesPlanetas::class, function (Faker $faker) {
            return [
                'mineral' => $this->faker->numberBetween($min = 30, $max = 99),
                'cristal' => $this->faker->numberBetween($min = 30, $max = 99),
                'gas' => $this->faker->numberBetween($min = 30, $max = 99),
                'plastico' => $this->faker->numberBetween($min = 30, $max = 99),
                'ceramica' => $this->faker->numberBetween($min = 30, $max = 99),
                'eje_x' => 0,
                'eje_y' => 0,
                'enfriamiento' => 0,
                'planetas_id' => $this->faker->numberBetween($min = 1, $max = 1000),
            ];
        // });
    }
}
