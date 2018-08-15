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
            $table->increments('id');
            $table->string('nombre');
            $table->string('avatar')->default('http://5dim.es/imagenes/avatar.jpg');
            $table->integer('puntos_construccion')->default(0);
            $table->integer('puntos_investigacion')->default(0);
            $table->integer('puntos_flotas')->default(0);
            $table->integer('universo_id');
            $table->timestamp('premiun_at')->nullable();
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