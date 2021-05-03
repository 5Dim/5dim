<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->index();
            $table->string('categoria')->nullable();
            $table->unsignedTinyInteger('nivel')->default(0);
            $table->unsignedBigInteger('jugadores_id')->unsigned();
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigaciones');
    }
}
