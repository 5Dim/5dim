<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnRecursosEnDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_recursos_en_destinos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal')->default(0);
            $table->bigInteger('mineral')->default(0);
            $table->bigInteger('cristal')->default(0);
            $table->bigInteger('gas')->default(0);
            $table->bigInteger('plastico')->default(0);
            $table->bigInteger('ceramica')->default(0);
            $table->bigInteger('liquido')->default(0);
            $table->bigInteger('micros')->default(0);
            $table->bigInteger('fuel')->default(0);
            $table->bigInteger('ma')->default(0);
            $table->bigInteger('municion')->default(0);
            $table->bigInteger('creditos')->default(0);
            $table->unsignedBigInteger('destinos_id')->unsigned();
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
        Schema::dropIfExists('en_recursos_en_destinos');
    }
}
