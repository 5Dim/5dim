<?php

use Illuminate\Database\Seeder;
use App\Almacenes;

class AlmacenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('almacenes')->truncate();
        $almacen=new Almacenes();
        $almacenes=$almacen->generarDatosAlmacenes();
    }
}