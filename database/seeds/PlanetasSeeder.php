<?php

use Illuminate\Database\Seeder;
use App\Planetas;

class PlanetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('planetas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        factory(Planetas::class, 1000)->create();
    }
}