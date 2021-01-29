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
            $table->decimal('masa', 8, 2);
            $table->integer('energia');
            $table->integer('tiempo');
            $table->integer('mantenimiento');
            $table->integer('defensa');
            $table->decimal('velocidad', 8, 2);
            $table->decimal('maniobra', 8, 2);
            $table->integer('velocidadMax');
            $table->integer('gastoFuel');

            $table->integer('armasLigeras');
            $table->integer('armasMedias');
            $table->integer('armasPesadas');
            $table->integer('armasInsertadas');
            $table->integer('armasBombas');
            $table->integer('armasMisiles');

            $table->integer('cargaPequenia');
            $table->integer('cargaMedia');
            $table->integer('cargaGrande');
            $table->integer('cargaEnorme');
            $table->integer('cargaMega');

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
