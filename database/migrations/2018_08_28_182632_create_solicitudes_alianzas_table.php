<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesAlianzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_alianzas', function (Blueprint $table) {
            $table->id();
            $table->text('solicitud');
            $table->unsignedBigInteger('alianzas_id')->unsigned();
            $table->foreign('alianzas_id')->references('id')->on('alianzas');
            $table->unsignedBigInteger('jugadores_id')->unsigned();
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
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
        Schema::dropIfExists('solicitudes_alianzas');
    }
}
