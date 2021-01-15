<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Recursos;
use App\Models\CualidadesPlanetas;
use App\Models\Jugadores;
use App\Models\Planetas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
        Jugadores::factory()->times(100)->create();
        Planetas::factory()->times(1000)->create();
        CualidadesPlanetas::factory()->times(100)->create();
        Recursos::factory()->times(1)->create();
    }
}
