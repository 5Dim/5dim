<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesConstruccionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS costes_construcciones");

        DB::statement("CREATE VIEW costes_construcciones  AS

select
cons.codigo,
COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel) as nivel,
  ROUND((select mineral from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
		COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
		, .7))*((37*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
		COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
		, 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as mineral,
  ROUND((select cristal from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((27*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as cristal,
  ROUND((select gas from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((25*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as gas,
  ROUND((select plastico from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((20*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as plastico,
  ROUND((select ceramica from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((30*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as ceramica,
  ROUND((select liquido from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((19*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as liquido,
  ROUND((select micros from costes_basicos_construccions where codigo=cons.codigo) * ((pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , .7))*((19*1.7*(select valor from constantes where codigo='avelprodminas') * pow (
        COALESCE((select max(cola.nivel) from en_construcciones cola where cola.construcciones_id=cons.id), cons.nivel)
         , 2.2)))*(5/(select valor from constantes where codigo='avelprodminas'))),0) as micros,
  cons.id as construcciones_id,

  planetas_id


from construcciones as cons

            ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_construcciones');
    }
}