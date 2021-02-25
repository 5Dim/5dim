<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridades', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('personal');
            $table->unsignedTinyInteger('mineral');
            $table->unsignedTinyInteger('cristal');
            $table->unsignedTinyInteger('gas');
            $table->unsignedTinyInteger('plastico');
            $table->unsignedTinyInteger('ceramica');
            $table->unsignedTinyInteger('liquido');
            $table->unsignedTinyInteger('micros');
            $table->unsignedTinyInteger('fuel');
            $table->unsignedTinyInteger('ma');
            $table->unsignedTinyInteger('municion');
            $table->unsignedTinyInteger('creditos');
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
        Schema::dropIfExists('prioridades');
    }
}
