<?php

namespace Database\Factories;

// use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recursos;



class RecursosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recursos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $factory->define(Recursos::class, function (Faker $faker) {
        return [
            'personal' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'mineral' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'cristal' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'gas' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'plastico' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'ceramica' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'liquido' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'micros' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'fuel' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'ma' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'municion' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'creditos' => $this->faker->numberBetween($min = 0, $max = 1000000000),
            'planetas_id' => 1,
        ];
        // });
    }
}
