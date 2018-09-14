<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMejorasDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mejoras_diseños', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invPropQuimico')->default(0);
            $table->integer('invPropNuk')->default(0);
            $table->integer('invPropIon')->default(0);
            $table->integer('invPropPlasma')->default(0);
            $table->integer('invPropMa')->default(0);
            $table->integer('invPropHMA')->default(0);
            $table->integer('fuel')->default(0);
            $table->integer('ataque')->default(0);
            $table->integer('defensa')->default(0);
            $table->integer('mantenimiento')->default(0);
            $table->integer('tiempo')->default(0);
            $table->integer('carga')->default(0);
            $table->integer('hangarPequeño')->default(0);
            $table->integer('hangarMediano')->default(0);
            $table->integer('hangarGrande')->default(0);
            $table->integer('hangarEnorme')->default(0);
            $table->integer('hangarMega')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mejoras_diseños');
    }
}