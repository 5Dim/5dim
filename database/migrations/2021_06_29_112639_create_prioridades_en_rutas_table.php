<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadesEnRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridades_en_rutas', function (Blueprint $table) {
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

            $table->unsignedBigInteger('destinos_en_rutas_id')->nullable();
            $table->foreign('destinos_en_rutas_id')->references('id')->on('destinos_en_rutas')->onDelete('cascade');

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
        Schema::dropIfExists('prioridades_en_rutas');
    }
}
