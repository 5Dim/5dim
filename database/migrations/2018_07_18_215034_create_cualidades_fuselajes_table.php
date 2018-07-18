<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCualidadesFuselajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cualidades_fuselajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masa');
            $table->integer('energia');
            $table->integer('tiempo');
            $table->integer('mantenimiento');
            $table->integer('defensa');
            $table->integer('ataque');
            $table->integer('velocidad');
            $table->integer('velocidadMax');

            $table->integer('armasLigera');
            $table->integer('armasMedia');
            $table->integer('armasPesadas');
            $table->integer('armasInsertada');
            $table->integer('armasDefensas');
            $table->integer('armasBombas');
            $table->integer('armasMisiles');

            $table->integer('cargaPequeña');
            $table->integer('cargaMedia');
            $table->integer('cargaGrande');

            $table->integer('mejoras');
            $table->integer('blindajes');
            $table->integer('motores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cualidades_fuselajes');
    }
}