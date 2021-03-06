<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index(); // nombre privado, para ti unicamente
            $table->string('publico')->index(); // nombre publico, la que ven todos
            $table->unsignedBigInteger('ataqueReal')->nullable();
            $table->unsignedBigInteger('defensaReal')->nullable();
            $table->unsignedBigInteger('ataqueVisible')->nullable();
            $table->unsignedBigInteger('defensaVisible')->nullable();
            $table->unsignedInteger('creditos');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('jugadores_id');
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
        Schema::dropIfExists('en_vuelos');
    }
}
