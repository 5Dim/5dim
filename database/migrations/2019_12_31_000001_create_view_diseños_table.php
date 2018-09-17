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


        DB::statement("CREATE VIEW view_diseños  AS


select
        cd.id AS id,
        cd.id  AS fuel,
        cd.id  AS municion,
        cd.id  AS mantenimiento,
        cd.id  AS defensa,
        cd.id  AS ataque,
        cd.id  AS tiempo,
        ( ( mejoras.invPropQuimico * (select nivel from investigaciones where codigo='invPropQuimico' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropQuimico')
			+mejoras.invPropNuk * (select nivel from investigaciones where codigo='invPropNuk' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropNuk')
			+mejoras.invPropIon * (select nivel from investigaciones where codigo='invPropIon' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropIon')
			+mejoras.invPropPlasma * (select nivel from investigaciones where codigo='invPropPlasma' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropPlasma')
			+mejoras.invPropMa * (select nivel from investigaciones where codigo='invPropMa' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropMa')
			+mejoras.invPropHMA  * (select nivel from investigaciones where codigo='invPropHMA' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropHMA')
			) / cd.masa)  AS velocidad,
        cd.id  AS carga,
        cd.id  AS cargaPequeña,
        cd.id  AS cargaMediana,
        cd.id  AS cargaGrande,
        cd.id  AS cargaEnorme,
        cd.id  AS cargaMega,
        cd.id  AS diseños_id

        from
            costes_diseños as  cd
            INNER JOIN mejoras_diseños mejoras ON cd.diseños_id=mejoras.id
            INNER JOIN diseños diseños ON cd.diseños_id=diseños.id
            INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=diseños.id
            INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.id










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