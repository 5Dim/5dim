<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstruccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mineral');
            $table->integer('cristal');
            $table->integer('gas');
            $table->integer('plastico');
            $table->integer('ceramica');
            $table->integer('liquido');
            $table->integer('micros');
            $table->integer('fuel');
            $table->integer('ma');
            $table->integer('municion');
            $table->integer('personal');
            $table->integer('almacen_mineral');
            $table->integer('almacen_cristal');
            $table->integer('almacen_gas');
            $table->integer('almacen_plastico');
            $table->integer('almacen_ceramica');
            $table->integer('almacen_liquido');
            $table->integer('almacen_micros');
            $table->integer('almacen_fuel');
            $table->integer('almacen_ma');
            $table->integer('almacen_municion');
            $table->integer('laboratorio');
            $table->integer('fabrica_naves');
            $table->integer('fabrica_tropas');
            $table->integer('fabrica_defensas');
            $table->integer('centro_observacion');
            $table->integer('refugio');
            $table->integer('banco');
            $table->integer('estacion_comercio');
            $table->integer('escudo');
            $table->integer('impulsor');
            $table->integer('modulo_estructural');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('construcciones');
    }
}
