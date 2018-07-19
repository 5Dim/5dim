<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFuselajesToFuselajesJugadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuselajes_jugadores', function (Blueprint $table) {
            $table->integer('fuselajes_id')->unsigned();
            $table->foreign('fuselajes_id')->references('id')->on('fuselajes');
            $table->integer('jugadores_id')->unsigned();
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
        Schema::table('fuselajes_jugadores', function (Blueprint $table) {
            $table->dropforeign(['fuselajes_id']);
            $table->dropColumn('fuselajes_id');
            $table->dropforeign(['jugadores_id']);
            $table->dropColumn('jugadores_id');
        });
    }
}