<?php

use Illuminate\Database\Seeder;
use App\Jugadores;

class JugadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('jugadores')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        factory(Jugadores::class)->create([
            'users_id' => 1,
        ]);
    }
}
