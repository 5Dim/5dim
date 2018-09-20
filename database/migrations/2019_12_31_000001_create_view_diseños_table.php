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
        DB::statement("DROP VIEW IF EXISTS view_diseños");   //coalesce max (enconstruccion) contruccion


        DB::statement("CREATE VIEW view_diseños  AS


select
        cd.id AS id,
        ROUND ( mejoras.fuel * (1+((select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvIa'))),0)  AS fuel,
        ROUND ( mejoras.municion *  (1+((select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvIa'))),0)  AS municion,
        ROUND (mejoras.mantenimiento * (1+((select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvIa'))),0)  AS mantenimiento,
        ROUND (mejoras.defensa * (1+((select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvIa'))),0)  AS defensa,
        ROUND (mejoras.tiempo * greatest ((1-((select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvIa'))),100),0)   AS tiempo,
        ifnull ((select SUM(total) from  view_daños_diseños where diseños_id= diseños.id),0) as ataque,
        ROUND (least (
        ( ( mejoras.invPropQuimico * (select nivel from investigaciones where codigo='invPropQuimico' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropQuimico')
			+mejoras.invPropNuk * (select nivel from investigaciones where codigo='invPropNuk' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropNuk')
			+mejoras.invPropIon * (select nivel from investigaciones where codigo='invPropIon' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropIon')
			+mejoras.invPropPlasma * (select nivel from investigaciones where codigo='invPropPlasma' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropPlasma')
			+mejoras.invPropMa * (select nivel from investigaciones where codigo='invPropMa' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropMa')
			+mejoras.invPropHMA  * (select nivel from investigaciones where codigo='invPropHMA' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropHMA')
			) / cd.masa) ,cualidadesFuselajes.velocidadMax),2) as velocidad,
        ROUND (mejoras.carga * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)    AS carga,
        ROUND (mejoras.cargaPequeña * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)  AS cargaPequeña,
        ROUND (mejoras.cargaMediana * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)  AS cargaMediana,
        ROUND (mejoras.cargaGrande * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaGrande,
        ROUND (mejoras.cargaEnorme * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaEnorme,
        ROUND (mejoras.cargaMega * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaMega,
        cd.diseños_id  AS diseños_id

        from
            costes_diseños as  cd
            INNER JOIN mejoras_diseños mejoras ON cd.diseños_id=mejoras.id
            INNER JOIN diseños diseños ON cd.diseños_id=diseños.id
            INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=diseños.id
            INNER JOIN jugadores jugadores ON jugadores.id= diseños.jugadores_id
            INNER JOIN cualidades_fuselajes cualidadesFuselajes ON diseños.fuselajes_id=cualidadesFuselajes.fuselajes_id










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