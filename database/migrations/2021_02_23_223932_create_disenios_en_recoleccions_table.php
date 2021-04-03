<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseniosEnRecoleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenios_en_recoleccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('enFlota')->default(0);
            $table->unsignedMediumInteger('enHangar')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');
            $table->unsignedBigInteger('en_recoleccion_id')->unsigned();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disenios_en_recoleccions');
    }
}
