<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCualidadesPlanetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cualidades_planetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('mineral');
            $table->unsignedTinyInteger('cristal');
            $table->unsignedTinyInteger('gas');
            $table->unsignedTinyInteger('plastico');
            $table->unsignedTinyInteger('ceramica');
            $table->unsignedMediumInteger('eje_x');
            $table->unsignedMediumInteger('eje_y');
            $table->unsignedTinyInteger('enfriamiento');
            $table->unsignedBigInteger('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
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
        Schema::dropIfExists('cualidades_planetas');
    }
}
