<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseniosEnVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenios_en_vuelos', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('enFlota')->default(0);
            $table->unsignedMediumInteger('enHangar')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');
            $table->unsignedBigInteger('envuelos_id')->unsigned();
            $table->foreign('envuelos_id')->references('id')->on('en_vuelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disenios_en_vuelos');
    }
}