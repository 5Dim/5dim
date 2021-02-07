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
            $table->string('nombre')->index();
            $table->string('avatar')->default('http://5dim.es/imagenes/avatar.jpg');
            $table->unsignedMediumInteger('puntos_construccion')->default(0);
            $table->unsignedMediumInteger('puntos_investigacion')->default(0);
            $table->unsignedMediumInteger('puntos_flotas')->default(0);
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
