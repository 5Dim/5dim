<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Planetas;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // \App\Models\User::factory(10)->create();
        User::factory()->times(1)->create([
            'name' => 'McGuten',
            'email' => 'mcguten.videos@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        User::factory()->times(1)->create([
            'name' => 'OdinSpain',
            'email' => 'odinspn@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        User::factory()->times(1)->create([
            'name' => 'vcode',
            'email' => 'vcode.es@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        // Jugadores::factory()->times(100)->create();
        Planetas::factory()->times(5000)->create([
            'tipo' => 'planeta',
        ]);
        Planetas::factory()->times(3)->create([
            'tipo' => 'nodriza',
        ]);
        Planetas::factory()->times(30)->create([
            'tipo' => 'anubis',
        ]);
        Planetas::factory()->times(20)->create([
            'tipo' => 'dyson',
        ]);
        Planetas::factory()->times(50)->create([
            'tipo' => 'canon',
        ]);
        Planetas::factory()->times(500)->create([
            'tipo' => 'asteroide',
            'imagen' => $faker->numberBetween(74, 79),
        ]);
    }
}
