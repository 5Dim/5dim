<?php

use Illuminate\Database\Seeder;
use App\CualidadesPlanetas;

class CualidadesPlanetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cualidades_planetas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        factory(CualidadesPlanetas::class, 1000)->create();
    }
}