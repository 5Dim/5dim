<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->string('avatar')->default('http://5dim.es/imagenes/avatar.jpg');
            $table->boolean('mensajes_flota')->default(true);
            $table->unsignedBigInteger('puntos_construccion')->default(0);
            $table->unsignedBigInteger('puntos_investigacion')->default(0);
            $table->unsignedBigInteger('puntos_flotas')->default(0);
            $table->unsignedBigInteger('puntos_victoria')->default(0);
            $table->unsignedTinyInteger('movimientos')->default(0);
            $table->unsignedTinyInteger('propuestas')->default(1);
            $table->timestamp('premiun_at')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('constantes_id')->unsigned()->nullable();
            $table->foreign('constantes_id')->references('id')->on('constantes');
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
        Schema::dropIfExists('jugadores');
    }
}
