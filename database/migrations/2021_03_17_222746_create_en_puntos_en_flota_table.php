<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnPuntosEnFlotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_puntos_en_flota', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedDecimal('coordx', 8, 2, true);
            $table->unsignedDecimal('coordy', 8, 2, true);
            $table->timestamp('fin')->nullable();
            $table->unsignedBigInteger('en_vuelo_id')->unsigned();
            $table->foreign('en_vuelo_id')->references('id')->on('en_vuelos')->onDelete('cascade');
            $table->unsignedBigInteger('jugadores_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_puntos_en_flota');
    }
}
