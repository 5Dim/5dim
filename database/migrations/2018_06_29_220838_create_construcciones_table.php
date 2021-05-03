<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstruccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construcciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->index();
            $table->string('categoria');
            $table->unsignedTinyInteger('nivel')->default(0);
            $table->unsignedBigInteger('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('construcciones');
    }
}
