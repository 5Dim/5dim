<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_investigaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mineral');
            $table->integer('cristal');
            $table->integer('gas');
            $table->integer('plastico');
            $table->integer('ceramica');
            $table->integer('liquido');
            $table->integer('micros');
            $table->integer('fuel');
            $table->integer('ma');
            $table->integer('municion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_investigaciones');
    }
}