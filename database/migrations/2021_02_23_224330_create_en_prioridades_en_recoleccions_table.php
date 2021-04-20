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
            $table->tinyInteger('personal')->default(0);
            $table->tinyInteger('mineral')->default(0);
            $table->tinyInteger('cristal')->default(0);
            $table->tinyInteger('gas')->default(0);
            $table->tinyInteger('plastico')->default(0);
            $table->tinyInteger('ceramica')->default(0);
            $table->tinyInteger('liquido')->default(0);
            $table->tinyInteger('micros')->default(0);
            $table->tinyInteger('fuel')->default(0);
            $table->tinyInteger('ma')->default(0);
            $table->tinyInteger('municion')->default(0);
            $table->tinyInteger('creditos')->default(0);
            $table->unsignedBigInteger('en_recoleccion_id')->unsigned();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions')->onDelete('cascade');
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
