<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposNavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_naves', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('coordx')->default(0);
            $table->unsignedMediumInteger('coordy')->default(0);
            $table->string('nombre');
            $table->string('actitud')->default("huida");
            $table->string('objetivo')->default("dhago");
            $table->string('relacion')->nullable()->default(null);
            $table->boolean('pordefecto')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('jugadores_id');
            $table->foreign('jugadores_id')->references('id')->on('jugadores');
            $table->unsignedBigInteger('disenios_id')->unsigned()->nullable();
            $table->foreign('disenios_id')->references('id')->on('disenios');
            $table->unsignedBigInteger('grupos_naves_id')->nullable();
            $table->foreign('grupos_naves_id')->references('id')->on('grupos_naves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_naves');
    }
}
