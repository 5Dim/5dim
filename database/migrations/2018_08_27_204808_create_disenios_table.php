<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('posicion')->default(9);
            $table->string('codigo');
            $table->string('publico');
            $table->string('privado');
            $table->unsignedTinyInteger('skin')->default(1);
            $table->unsignedBigInteger('jugadores_id')->unsigned();
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
            $table->unsignedBigInteger('fuselajes_id')->unsigned();
            $table->foreign('fuselajes_id')->references('id')->on('fuselajes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disenios');
    }
}
