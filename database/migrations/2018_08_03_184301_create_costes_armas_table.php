<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_armas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('mineral');
            $table->unsignedMediumInteger('cristal');
            $table->unsignedMediumInteger('gas');
            $table->unsignedMediumInteger('plastico');
            $table->unsignedMediumInteger('ceramica');
            $table->unsignedMediumInteger('liquido');
            $table->unsignedMediumInteger('micros');
            $table->mediumInteger('fuel');
            $table->unsignedMediumInteger('ma');
            $table->mediumInteger('municion');
            $table->unsignedMediumInteger('personal');

            $table->mediumInteger('mantenimiento');
            $table->integer('masa');
            $table->integer('energia');
            $table->unsignedMediumInteger('defensa');
            $table->unsignedMediumInteger('ataque');
            $table->mediumInteger('tiempo');
            $table->unsignedMediumInteger('velocidad');
            $table->unsignedMediumInteger('maniobra')->default(0);
            $table->unsignedMediumInteger('carga');
            $table->unsignedMediumInteger('cargaPequenia');
            $table->unsignedMediumInteger('cargaMediana');
            $table->unsignedMediumInteger('cargaGrande');
            $table->unsignedMediumInteger('cargaEnorme');
            $table->unsignedMediumInteger('cargaMega');
            $table->unsignedMediumInteger('recolector')->default(0);
            $table->unsignedMediumInteger('extractor')->default(0);
            //$table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_armas');
    }
}
