<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_armas', function (Blueprint $table) {
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
            $table->integer('mantenimiento');
            $table->integer('masa');
            $table->integer('energia');
            $table->integer('defensa');
            $table->integer('ataque');
            $table->integer('tiempo');
            $table->integer('velocidad');
            $table->integer('carga');
            $table->integer('cargaPequeña');
            $table->integer('cargaMediana');
            $table->integer('cargaGrande');
            $table->integer('cargaEnorme');
            $table->integer('cargaMega');
            //$table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_armas');
    }
}