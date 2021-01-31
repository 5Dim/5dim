<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostesDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_disenios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mineral')->default(0);
            $table->integer('cristal')->default(0);
            $table->integer('gas')->default(0);
            $table->integer('plastico')->default(0);
            $table->integer('ceramica')->default(0);
            $table->integer('liquido')->default(0);
            $table->integer('micros')->default(0);
            $table->integer('personal')->default(0);
            $table->decimal( 'masa', 20, 2)->default(0);
            $table->integer('energia')->default(0);

            // $table->integer('fuel')->default(0);
            // $table->integer('ma')->default(0);
            // $table->integer('municion')->default(0);
            // $table->integer('mantenimiento');
            // $table->integer('defensa');
            // $table->integer('ataque');
            // $table->integer('tiempo');
            // $table->integer('velocidad');
            // $table->integer('carga');
            // $table->integer('cargaPequenia');
            // $table->integer('cargaMediana');
            // $table->integer('cargaGrande');
            // $table->integer('cargaEnorme');
            // $table->integer('cargaMega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_disenios');
    }
}
