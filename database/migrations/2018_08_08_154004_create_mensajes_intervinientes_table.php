<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesIntervinientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_intervinientes', function (Blueprint $table) {
            $table->id();
            $table->boolean('leido');
            $table->unsignedBigInteger('mensajes_id')->unsigned();
            $table->foreign('mensajes_id')->references('id')->on('mensajes');
            $table->unsignedBigInteger('receptor')->unsigned();
            $table->foreign('receptor')->references('id')->on('jugadores');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes_intervinientes');
    }
}
