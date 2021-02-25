<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('nivel');
            $table->unsignedMediumInteger('personal');
            $table->unsignedMediumInteger('mineral');
            $table->unsignedMediumInteger('cristal');
            $table->unsignedMediumInteger('gas');
            $table->unsignedMediumInteger('plastico');
            $table->unsignedMediumInteger('ceramica');
            $table->unsignedMediumInteger('liquido');
            $table->unsignedMediumInteger('micros');
            $table->unsignedMediumInteger('fuel');
            $table->unsignedMediumInteger('ma');
            $table->unsignedMediumInteger('municion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producciones');
    }
}
