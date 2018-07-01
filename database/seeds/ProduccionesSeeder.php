<?php

use Illuminate\Database\Seeder;
use App\Producciones;

class ProduccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producciones')->truncate();
        $produccion=new Producciones();
        $producciones=$produccion->generarDatosProducciones();
    }
}