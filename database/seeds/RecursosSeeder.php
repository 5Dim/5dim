<?php

use Illuminate\Database\Seeder;
use App\Recursos;

class RecursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('recursos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        factory(Recursos::class)->create([
            'planetas_id' => 1,
        ]);
    }
}
