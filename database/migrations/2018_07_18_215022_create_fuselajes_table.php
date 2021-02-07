<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuselajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuselajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->index();
            $table->string('tamanio');
            $table->string('tipo');
            $table->unsignedTinyInteger('tnave');
            $table->unsignedTinyInteger('coste');
            $table->string('categoria')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuselajes');
    }
}
