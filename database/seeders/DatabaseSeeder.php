<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Planetas;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;

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
            'timezone' => 'Europe/Madrid',
            'idioma' => 'Español',
        ]);
        User::factory()->times(1)->create([
            'name' => 'OdinSpain',
            'email' => 'odinspn@gmail.com',
            'password' => Hash::make('1234'),
            'timezone' => 'Europe/Madrid',
            'idioma' => 'Español',
        ]);
        User::factory()->times(1)->create([
            'name' => 'vcode',
            'email' => 'vcode.es@gmail.com',
            'password' => Hash::make('1234'),
            'timezone' => 'Europe/Madrid',
            'idioma' => 'Español',
        ]);
        Planetas::factory()->times(1200)->create([
            'tipo' => 'planeta',
        ]);
        for ($i = 0; $i < 500; $i++) {
            Planetas::factory()->create([
                'tipo' => 'asteroide',
                'imagen' => $faker->numberBetween(70, 79),
            ]);
        }
        for ($i = 0; $i < 200; $i++) {
            Planetas::factory()->create([
                'tipo' => 'sol',
                'imagen' => $faker->numberBetween(80, 89),
            ]);
        }
        // for ($i = 0; $i < 5; $i++) {
        //     Planetas::factory()->create([
        //         'tipo' => 'nodriza',
        //         'imagen' => 1,
        //     ]);
        // }
        // for ($i = 0; $i < 5; $i++) {
        //     Planetas::factory()->create([
        //         'tipo' => 'anubis',
        //         'imagen' => 5,
        //     ]);
        // }
        // for ($i = 0; $i < 5; $i++) {
        //     Planetas::factory()->create([
        //         'tipo' => 'dyson',
        //         'imagen' => 6,
        //     ]);
        // }
        // for ($i = 0; $i < 5; $i++) {
        //     Planetas::factory()->create([
        //         'tipo' => 'canon',
        //         'imagen' => 7,
        //     ]);
        // }
    }
}
