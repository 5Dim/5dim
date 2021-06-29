<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasPredefinidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_predefinidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
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
        Schema::dropIfExists('rutas_predefinidas');
    }
}
