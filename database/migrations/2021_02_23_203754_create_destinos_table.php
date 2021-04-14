<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinos', function (Blueprint $table) { // Relacionado con planeta y flotas
            $table->id();
            $table->decimal('porcentVel', 5, 2, true);
            $table->string('mision');
            $table->string('mision_regreso')->nullable()->default(null);
            $table->unsignedMediumInteger('initestrella');
            $table->unsignedTinyInteger('initorbita');
            $table->unsignedMediumInteger('estrella');
            $table->unsignedTinyInteger('orbita');
            $table->unsignedDecimal('initcoordx', 8, 2, true);
            $table->unsignedDecimal('initcoordy', 8, 2, true);
            $table->unsignedDecimal('fincoordx', 8, 2, true);
            $table->unsignedDecimal('fincoordy', 8, 2, true);
            $table->unsignedTinyInteger('visitado')->default(0);
            $table->timestamp('init');
            $table->timestamp('fin')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
            $table->unsignedBigInteger('en_vuelo_id')->unsigned();
            $table->foreign('en_vuelo_id')->references('id')->on('en_vuelos');
            $table->unsignedBigInteger('flota_id')->unsigned();
            $table->foreign('flota_id')->references('id')->on('en_vuelos');
            $table->unsignedBigInteger('en_recoleccion_id')->unsigned();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions');
            $table->unsignedBigInteger('en_orbita_id')->unsigned();
            $table->foreign('en_orbita_id')->references('id')->on('en_orbitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinos');
    }
}
