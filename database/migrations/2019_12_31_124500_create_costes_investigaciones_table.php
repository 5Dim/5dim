<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("DROP VIEW IF EXISTS costes_investigaciones");

        DB::statement("CREATE VIEW costes_investigaciones  AS


select
invest.id as investigaciones_id,
COALESCE((select max(cola.nivel) from en_investigaciones cola where cola.investigaciones_id=invest.id), invest.nivel) as colanivel,
    ROUND(
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select mineral from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Imineral from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0) as mineral,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select cristal from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Icristal from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as cristal,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select gas from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Igas from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as gas,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select plastico from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Iplastico from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as plastico,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select ceramica from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Iceramica from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as ceramica,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select liquido from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Iliquido from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as liquido,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select micros from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Imicros from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as micros,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select fuel from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Ifuel from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as fuel,
    GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select ma from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Ima from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as ma,
   	GREATEST((1-(((GREATEST( (select max(inv.nivel) from investigaciones as inv where inv.codigo=invest.codigo)-(select valor from constantes where codigo=(select descuentoM from costes_basicos_investigacions where codigo=invest.codigo)) ,invest.nivel))-invest.nivel)*(select valor from constantes where codigo=(select descuentoC from costes_basicos_investigacions where codigo=invest.codigo)))),0) *
    ((pow (invest.nivel  , ((select municion from costes_basicos_investigacions where codigo=invest.codigo) * (select valor from constantes where codigo='Ifactor')  * (select valor from constantes where codigo=(select constante from costes_basicos_investigacions where codigo=invest.codigo)  )))) * (select Imunicion from costes_basicos_investigacions where codigo=invest.codigo)) * (select valor from constantes where codigo='investCorrector')   ,0)  as municion,
   	invest.nivel as nivel,
   	invest.jugadores_id as jugador

from investigaciones as invest

            ");

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_investigaciones');
    }
}