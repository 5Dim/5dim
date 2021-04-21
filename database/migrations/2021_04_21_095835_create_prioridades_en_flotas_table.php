<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadesEnFlotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridades_en_flotas', function (Blueprint $table) {
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

            $table->unsignedBigInteger('destinos_id')->nullable();
            $table->foreign('destinos_id')->references('id')->on('destinos')->onDelete('cascade');

            $table->unsignedBigInteger('en_orbita_id')->nullable();
            $table->foreign('en_orbita_id')->references('id')->on('en_orbitas')->onDelete('cascade');

            $table->unsignedBigInteger('en_recoleccion_id')->nullable();
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
        Schema::dropIfExists('prioridades_en_flotas');
    }
}
