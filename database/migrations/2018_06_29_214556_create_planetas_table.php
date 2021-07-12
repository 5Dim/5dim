<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('estrella')->index();
            $table->unsignedTinyInteger('orbita');
            $table->string('nombre')->nullable()->index();
            $table->integer('orden')->default(0);
            $table->integer('color')->default('#818181');
            $table->unsignedTinyInteger('imagen');
            $table->string('tipo');
            $table->unsignedInteger('creacion')->nullable();
            $table->unsignedMediumInteger('coordx')->nullable();
            $table->unsignedMediumInteger('coordy')->nullable();
            $table->unsignedBigInteger('jugadores_id')->unsigned()->nullable();
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
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
        Schema::dropIfExists('planetas');
    }
}
