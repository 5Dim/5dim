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

        DB::statement("CREATE VIEW view_diseños AS
                        SELECT
                        cd.id as id,
                        cd.fuel as fuel,
                        cd.municion as municion,
                        cd.mantenimiento as mantenimiento,
                        cd.defensa as defensa,
                        cd.ataque as ataque,
                        cd.tiempo as tiempo,
                        cd.velocidad as velocidad,
                        cd.carga as carga,
                        cd.cargaPequeña as cargaPequeña,
                        cd.cargaMediana as cargaMediana,
                        cd.cargaGrande as cargaGrande,
                        cd.cargaEnorme as cargaEnorme,
                        cd.cargaMega as cargaMega

                        FROM costes_diseños AS cd");
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