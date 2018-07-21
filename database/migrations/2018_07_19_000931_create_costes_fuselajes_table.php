<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesFuselajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_fuselajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mineral');
            $table->integer('cristal');
            $table->integer('gas');
            $table->integer('plastico');
            $table->integer('ceramica');
            $table->integer('liquido');
            $table->integer('micros');
            $table->integer('personal');
            $table->integer('puntos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_fuselajes');
    }
}