<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosEnFlotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_en_flotas', function (Blueprint $table) {
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

            $table->unsignedBigInteger('en_vuelo_id')->nullable();
            $table->foreign('en_vuelo_id')->references('id')->on('en_vuelos')->onDelete('cascade');

            $table->unsignedBigInteger('en_orbita_id')->nullable();
            $table->foreign('en_orbita_id')->references('id')->on('en_orbitas')->onDelete('cascade');

            $table->unsignedBigInteger('en_recoleccion_id')->nullable();
            $table->foreign('en_recoleccion_id')->references('id')->on('en_recoleccions')->onDelete('cascade');

            $table->unsignedBigInteger('destinos_id')->nullable();
            $table->foreign('destinos_id')->references('id')->on('destinos')->onDelete('cascade');

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
        Schema::dropIfExists('recursos_en_flotas');
    }
}
