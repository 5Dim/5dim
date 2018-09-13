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
				daños.distancia0 as distancia0,
				daños.distancia1 as distancia1,
				daños.distancia2 as distancia2,
				daños.distancia3 as distancia3,
				daños.distancia4 as distancia4,
				daños.distancia5 as distancia5,
				daños.distancia6 as distancia6,
				daños.distancia7 as distancia7
  			from daños_diseños as daños

  				INNER JOIN diseños_jugadores diseñosjugadores ON diseñosjugadores.id=daños.diseños_id
				INNER JOIN jugadores jugadores ON jugadores.id= diseñosjugadores.jugadores_id
				INNER JOIN investigaciones investigaciones ON investigaciones.jugadores_id=jugadores.id
  			where investigacion='invPlasma'
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