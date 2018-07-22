<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('ranura');
            $table->integer('potencia');
            $table->integer('clase');
            $table->integer('niveltec');
            $table->integer('malcance');
            $table->integer('dispersion');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('armas');
    }
}