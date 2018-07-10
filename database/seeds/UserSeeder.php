<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\DatosMaestrosController;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        factory(User::class)->create([
            'name' => 'McGuten',
            'email' => 'mcguten.videos@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        factory(User::class)->create([
            'name' => 'OdinSpain',
            'email' => 'odinspn@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        factory(User::class, 98)->create();

        $datosM=new DatosMaestrosController();
        $datosM->DatosMaestros();

    }
}