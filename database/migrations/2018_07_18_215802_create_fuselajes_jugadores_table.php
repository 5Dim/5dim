<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuselajesJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuselajes_jugadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fuselajes_id')->unsigned();
            $table->foreign('fuselajes_id')->references('id')->on('fuselajes');
            $table->unsignedBigInteger('jugadores_id')->unsigned();
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuselajes_jugadores');
    }
}
