<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendaHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda_historials', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->unsignedMediumInteger('coste');
            $table->unsignedBigInteger('tiendas_id')->unsigned();
            $table->foreign('tiendas_id')->references('id')->on('tiendas');
            $table->unsignedBigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('tienda_historials');
    }
}
