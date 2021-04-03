<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnPrioridadesEnRecoleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_prioridades_en_recoleccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('personal')->default(0);
            $table->unsignedTinyInteger('mineral')->default(0);
            $table->unsignedTinyInteger('cristal')->default(0);
            $table->unsignedTinyInteger('gas')->default(0);
            $table->unsignedTinyInteger('plastico')->default(0);
            $table->unsignedTinyInteger('ceramica')->default(0);
            $table->unsignedTinyInteger('liquido')->default(0);
            $table->unsignedTinyInteger('micros')->default(0);
            $table->unsignedTinyInteger('fuel')->default(0);
            $table->unsignedTinyInteger('ma')->default(0);
            $table->unsignedTinyInteger('municion')->default(0);
            $table->unsignedTinyInteger('creditos')->default(0);
            $table->unsignedBigInteger('en_recoleccion_id')->unsigned();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions');
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
        Schema::dropIfExists('en_prioridades_en_recoleccions');
    }
}
