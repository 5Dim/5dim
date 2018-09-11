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

            cd.fuel AS fuel,
            cd.municion AS municion,
            cd.mantenimiento AS mantenimiento,
            cd.defensa AS defensa,
            cd.ataque AS ataque,
            cd.tiempo AS tiempo,
            cd.velocidad  AS velocidad ,
            cd.carga AS carga,
            cd.cargaPequeña AS cargaPequeña,
            cd.cargaMediana AS cargaMediana,
            cd.cargaGrande AS cargaGrande,
            cd.cargaEnorme AS cargaEnorme,
            cd.cargaMega AS cargaMega,
            cd.diseños_id AS diseños_id

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