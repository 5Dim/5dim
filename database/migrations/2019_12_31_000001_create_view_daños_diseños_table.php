<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDañosDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS view_daños_diseños");

        DB::statement("CREATE VIEW view_daños_diseños AS



  		select diseños_id,fila,
  		sum(distancia0) as distancia0,
  		sum(distancia1) as distancia1,
  		sum(distancia2) as distancia2,
  		sum(distancia3) as distancia3,
  		sum(distancia4) as distancia4,
  		sum(distancia5) as distancia5,
  		sum(distancia6) as distancia6,
  		sum(distancia7) as distancia7
  		from (
  			(select daños.diseños_id,daños.fila,jugadores.id as jugador,
				ROUND (daños.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia0,
				ROUND (daños.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia1,
				ROUND (daños.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia2,
				ROUND (daños.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia3,
				ROUND (daños.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia4,
				ROUND (daños.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia5,
				ROUND (daños.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia6,
				ROUND (daños.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvEnergia') ,0) distancia7
  			from daños_diseños as daños
  				INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=daños.diseños_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invEnergia'
				where investigacion='invEnergia'
  			) union all
  			(select daños.diseños_id,daños.fila,jugadores.id as jugador,
				ROUND (daños.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia0,
				ROUND (daños.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia1,
				ROUND (daños.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia2,
				ROUND (daños.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia3,
				ROUND (daños.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia4,
				ROUND (daños.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia5,
				ROUND (daños.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia6,
				ROUND (daños.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvPlasma') ,0) distancia7
  			from daños_diseños as daños
  				INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=daños.diseños_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invPlasma'
				where investigacion='invPlasma'
  			)union all
  			(select daños.diseños_id,daños.fila,jugadores.id as jugador,
				ROUND (daños.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia0,
				ROUND (daños.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia1,
				ROUND (daños.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia2,
				ROUND (daños.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia3,
				ROUND (daños.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia4,
				ROUND (daños.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia5,
				ROUND (daños.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia6,
				ROUND (daños.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvBalistica') ,0) distancia7
  			from daños_diseños as daños
  				INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=daños.diseños_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invBalistica'
				where investigacion='invBalistica'
  			)union all
  			(select daños.diseños_id,daños.fila,jugadores.id as jugador,
				ROUND (daños.distancia0 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia0,
				ROUND (daños.distancia1 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia1,
				ROUND (daños.distancia2 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia2,
				ROUND (daños.distancia3 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia3,
				ROUND (daños.distancia4 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia4,
				ROUND (daños.distancia5 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia5,
				ROUND (daños.distancia6 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia6,
				ROUND (daños.distancia7 * investigaciones.nivel * (select valor from constantes where codigo='mejorainvMa') ,0) distancia7
  			from daños_diseños as daños
  				INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=daños.diseños_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id and investigaciones.codigo='invMa'
				where investigacion='invMa'
  			)

  		) inv

  		group by fila,diseños_id order by diseños_id,fila ASC



                        ");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_daños_diseños");
    }
}