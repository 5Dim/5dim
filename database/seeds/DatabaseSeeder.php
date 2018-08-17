<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JugadoresSeeder::class);
        $this->call(PlanetasSeeder::class);
        $this->call(CualidadesPlanetasSeeder::class);
        $this->call(RecursosSeeder::class);
        $this->call(AlmacenesSeeder::class);
        $this->call(ProduccionesSeeder::class);
    }
}