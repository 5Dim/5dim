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
            $table->id();
            $table->unsignedInteger('masa');
            $table->unsignedInteger('energia');
            $table->unsignedInteger('tiempo');
            $table->unsignedInteger('mantenimiento');
            $table->unsignedInteger('defensa');
            $table->unsignedSmallInteger('velocidad');
            $table->unsignedSmallInteger('maniobra');
            $table->unsignedInteger('velocidadMax');
            $table->unsignedInteger('gastoFuel');

            $table->unsignedTinyInteger('armasLigeras');
            $table->unsignedTinyInteger('armasMedias');
            $table->unsignedTinyInteger('armasPesadas');
            $table->unsignedTinyInteger('armasInsertadas');
            $table->unsignedTinyInteger('armasBombas');
            $table->unsignedTinyInteger('armasMisiles');

            $table->unsignedInteger('cargaPequenia');
            $table->unsignedInteger('cargaMedia');
            $table->unsignedInteger('cargaGrande');
            $table->unsignedInteger('cargaEnorme');
            $table->unsignedTinyInteger('cargaMega');

            $table->unsignedTinyInteger('mejoras');
            $table->unsignedSmallInteger('blindajes');
            $table->unsignedSmallInteger('motores');
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
