<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMejorasDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mejoras_diseños', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('velocidad');
            $table->integer('carga');
            $table->integer('hangar');
            $table->integer('fuel');
            $table->integer('defensa');
            $table->integer('mantenimiento');
            $table->integer('tiempo');
            $table->integer('cazas');
            $table->integer('ligeras');
            $table->integer('medias');
            $table->integer('pesadas');
            $table->integer('defensas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mejoras_diseños');
    }
}