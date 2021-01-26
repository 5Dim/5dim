<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS view_disenios");   //coalesce max (enconstruccion) contruccion


        DB::statement("CREATE VIEW view_disenios  AS

/* (select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) *
(select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) *
(select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) *
(select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) *
greatest (select nivel from investigaciones where codigo='invIa' and jugadores_id=jugadores.id) *
*/

select
        cd.id AS id,
        ROUND ( mejoras.fuel * (1-( (select valor from constantes where codigo='mejorainvIa'))),0)  AS fuel,
        ROUND ( mejoras.municion *  (1-( (select valor from constantes where codigo='mejorainvIa'))),0)  AS municion,
        ROUND (mejoras.mantenimiento * (1-( (select valor from constantes where codigo='mejorainvIa'))),0)  AS mantenimiento,
        ROUND (mejoras.defensa * (1+( (select valor from constantes where codigo='mejorainvIa'))),0)  AS defensa,
        ROUND (mejoras.tiempo * greatest ((1-( (select valor from constantes where codigo='mejorainvIa'))),0),0)   AS tiempo,
        ifnull ((select SUM(total) from  view_danios_disenios where disenios_id= disenios.id),0) as ataque,
        ROUND (
        ( ( mejoras.invPropQuimico * (select nivel from investigaciones where codigo='invPropQuimico' and jugadores_id=jugadores.id)* (select valor from constantes where codigo='mejorainvPropQuimico')
			+mejoras.invPropNuk * IFNULL( (select nivel from investigaciones where codigo='invPropNuk' and jugadores_id=jugadores.id),0) * (select valor from constantes where codigo='mejorainvPropNuk')
			+mejoras.invPropIon * IFNULL( (select nivel from investigaciones where codigo='invPropIon' and jugadores_id=jugadores.id),0) * (select valor from constantes where codigo='mejorainvPropIon')
			+mejoras.invPropPlasma * IFNULL( (select nivel from investigaciones where codigo='invPropPlasma' and jugadores_id=jugadores.id),0) * (select valor from constantes where codigo='mejorainvPropPlasma')
			+mejoras.invPropMa * IFNULL( (select nivel from investigaciones where codigo='invPropMa' and jugadores_id=jugadores.id),0) * (select valor from constantes where codigo='mejorainvPropMa')
			+mejoras.invPropHMA  * IFNULL( (select nivel from investigaciones where codigo='invPropHMA' and jugadores_id=jugadores.id),0) * (select valor from constantes where codigo='mejorainvPropHMA')
			) / cd.masa) ,2) as velocidad,
        ROUND (mejoras.carga * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)    AS carga,
        ROUND (mejoras.cargaPequenia * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)  AS cargaPequenia,
        ROUND (mejoras.cargaMediana * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)  AS cargaMediana,
        ROUND (mejoras.cargaGrande * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaGrande,
        ROUND (mejoras.cargaEnorme * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaEnorme,
        ROUND (mejoras.cargaMega * (1+((select nivel from investigaciones where codigo='invCarga' and jugadores_id=jugadores.id) * (select valor from constantes where codigo='mejorainvCarga'))),0)   AS cargaMega,
        cd.disenios_id  AS disenios_id

        from
            costes_disenios as  cd
            INNER JOIN mejoras_disenios mejoras ON cd.disenios_id=mejoras.id
            INNER JOIN disenios disenios ON cd.disenios_id=disenios.id
            INNER JOIN disenios_jugadores diseniosjugadores ON diseniosjugadores.id=disenios.id
            INNER JOIN jugadores jugadores ON jugadores.id= disenios.jugadores_id
            INNER JOIN cualidades_fuselajes cualidadesFuselajes ON disenios.fuselajes_id=cualidadesFuselajes.fuselajes_id


            ");


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_disenios");
    }
}
