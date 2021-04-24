<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseniosEnFlotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenios_en_flotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('enFlota')->default(0);
            $table->unsignedMediumInteger('enHangar')->default(0);
            $table->unsignedMediumInteger('cantidad')->default(0);
            $table->string('tipo')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');

            $table->unsignedBigInteger('en_vuelo_id')->nullable();
            $table->foreign('en_vuelo_id')->references('id')->on('en_vuelos')->onDelete('cascade');

            $table->unsignedBigInteger('en_orbita_id')->nullable();
            $table->foreign('en_orbita_id')->references('id')->on('en_orbitas')->onDelete('cascade');

            $table->unsignedBigInteger('en_recoleccion_id')->nullable();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions')->onDelete('cascade');

            $table->unsignedBigInteger('planetas_id')->nullable()->default(null);
            $table->foreign('planetas_id')->references('id')->on('planetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disenios_en_flotas');
    }
}
