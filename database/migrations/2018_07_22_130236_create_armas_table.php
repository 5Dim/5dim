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
            $table->id();
            $table->unsignedTinyInteger('codigo')->unique();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('ranura');
            $table->unsignedMediumInteger('potencia');
            $table->string('clase');
            $table->unsignedTinyInteger('niveltec');
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
