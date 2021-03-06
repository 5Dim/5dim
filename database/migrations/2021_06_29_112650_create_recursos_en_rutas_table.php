<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosEnRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_en_rutas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal')->default(0);
            $table->unsignedBigInteger('mineral')->default(0);
            $table->unsignedBigInteger('cristal')->default(0);
            $table->unsignedBigInteger('gas')->default(0);
            $table->unsignedBigInteger('plastico')->default(0);
            $table->unsignedBigInteger('ceramica')->default(0);
            $table->unsignedBigInteger('liquido')->default(0);
            $table->unsignedBigInteger('micros')->default(0);
            $table->unsignedBigInteger('fuel')->default(0);
            $table->unsignedBigInteger('ma')->default(0);
            $table->unsignedBigInteger('municion')->default(0);
            $table->unsignedBigInteger('creditos')->default(0);

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
        Schema::dropIfExists('recursos_en_rutas');
    }
}
