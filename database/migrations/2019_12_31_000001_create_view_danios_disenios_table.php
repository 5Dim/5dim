<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewDaniosDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS view_danios_disenios");

        DB::statement("CREATE VIEW view_danios_disenios AS




  		select disenios_id,fila,
  		sum(distancia0) as distancia0,
  		sum(distancia1) as distancia1,
  		sum(distancia2) as distancia2,
  		sum(distancia3) as distancia3,
  		sum(distancia4) as distancia4,
  		sum(distancia5) as distancia5,
  		sum(distancia6) as distancia6,
  		sum(distancia7) as distancia7,
  		sum(distancia0)+sum(distancia1)+sum(distancia2)+sum(distancia3)+sum(distancia4)+sum(distancia5)+sum(distancia6)+sum(distancia7)  as total
  		from (
  			(select danios.disenios_id,danios.fila,jugadores.id as jugador,
				ROUND (danios.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia0,
				ROUND (danios.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia1,
				ROUND (danios.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia2,
				ROUND (danios.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia3,
				ROUND (danios.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia4,
				ROUND (danios.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia5,
				ROUND (danios.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia6,
				ROUND (danios.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia7
  			from danios_disenios as danios
  				INNER JOIN disenios_jugadores diseniosjugadores ON diseniosjugadores.id=danios.disenios_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseniosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invEnergia'
				where investigacion='invEnergia'
  			) union all
  			(select danios.disenios_id,danios.fila,jugadores.id as jugador,
				ROUND (danios.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia0,
				ROUND (danios.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia1,
				ROUND (danios.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia2,
				ROUND (danios.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia3,
				ROUND (danios.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia4,
				ROUND (danios.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia5,
				ROUND (danios.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia6,
				ROUND (danios.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia7
  			from danios_disenios as danios
  				INNER JOIN disenios_jugadores diseniosjugadores ON diseniosjugadores.id=danios.disenios_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseniosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invPlasma'
				where investigacion='invPlasma'
  			)union all
  			(select danios.disenios_id,danios.fila,jugadores.id as jugador,
				ROUND (danios.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia0,
				ROUND (danios.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia1,
				ROUND (danios.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia2,
				ROUND (danios.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia3,
				ROUND (danios.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia4,
				ROUND (danios.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia5,
				ROUND (danios.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia6,
				ROUND (danios.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia7
  			from danios_disenios as danios
  				INNER JOIN disenios_jugadores diseniosjugadores ON diseniosjugadores.id=danios.disenios_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseniosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invBalistica'
				where investigacion='invBalistica'
  			)union all
  			(select danios.disenios_id,danios.fila,jugadores.id as jugador,
				ROUND (danios.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia0,
				ROUND (danios.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia1,
				ROUND (danios.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia2,
				ROUND (danios.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia3,
				ROUND (danios.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia4,
				ROUND (danios.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia5,
				ROUND (danios.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia6,
				ROUND (danios.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia7
  			from danios_disenios as danios
  				INNER JOIN disenios_jugadores diseniosjugadores ON diseniosjugadores.id=danios.disenios_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseniosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invMa'
				where investigacion='invMa'
  			)

  		) inv

  		group by fila,disenios_id order by disenios_id,fila ASC



                        ");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_danios_disenios");
    }
}
