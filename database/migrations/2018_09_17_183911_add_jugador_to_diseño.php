<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJugadorToDiseño extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diseños', function (Blueprint $table) {
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
        Schema::table('diseños', function (Blueprint $table) {
            $table->dropforeign(['jugadores_id']);
            $table->dropColumn('jugadores_id');
        });
    }
}