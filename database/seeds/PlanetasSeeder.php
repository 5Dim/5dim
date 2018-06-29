<?php

use Illuminate\Database\Seeder;

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
        factory(Planetas::class)->create([
            'user_id' => 'McGuten',
        ]);
        factory(User::class, 5)->create();
    }
}
