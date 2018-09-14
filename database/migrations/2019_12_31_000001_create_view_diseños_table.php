<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS view_diseños");


        DB::statement("CREATE VIEW view_diseños

        AS select
        cd.id AS id,
        cd.id  AS fuel,
        cd.id  AS municion,
        cd.id  AS mantenimiento,
        cd.id  AS defensa,
        cd.id  AS ataque,
        cd.id  AS tiempo,
        cd.id  AS velocidad,
        cd.id  AS carga,
        cd.id  AS cargaPequeña,
        cd.id  AS cargaMediana,
        cd.id  AS cargaGrande,
        cd.id  AS cargaEnorme,
        cd.id  AS cargaMega,
        cd.id  AS diseños_id

        from
            costes_diseños as  cd
            LEFT JOIN diseños diseños ON cd.diseños_id=diseños.id
            LEFT JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=diseños.id
            LEFT JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.id
            LEFT JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id
            ");


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_diseños");
    }
}