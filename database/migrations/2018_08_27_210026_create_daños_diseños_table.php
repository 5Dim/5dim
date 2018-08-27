<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDañosDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daños_diseños', function (Blueprint $table) {
            $table->increments('id');
            $table->string('investigacion');
            $table->string('fila');
            $table->integer('distancia0');
            $table->integer('distancia1');
            $table->integer('distancia2');
            $table->integer('distancia3');
            $table->integer('distancia4');
            $table->integer('distancia5');
            $table->integer('distancia6');
            $table->integer('distancia7');

        // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daños_diseños');
    }
}