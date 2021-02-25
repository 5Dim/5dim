<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMensajeIdToIntervinientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensajes_intervinientes', function (Blueprint $table) {
            $table->unsignedBigInteger('mensajes_id')->unsigned();
            $table->foreign('mensajes_id')->references('id')->on('mensajes');
            $table->unsignedBigInteger('receptor')->unsigned();
            $table->foreign('receptor')->references('id')->on('jugadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensajes_intervinientes', function (Blueprint $table) {
            $table->dropforeign(['mensajes_id']);
            $table->dropColumn('mensajes_id');
            $table->dropforeign(['receptor']);
            $table->dropColumn('receptor');
        });
    }
}
