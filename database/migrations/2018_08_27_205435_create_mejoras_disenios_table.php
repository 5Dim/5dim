<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMejorasDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mejoras_disenios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invPropQuimico')->default(0);
            $table->integer('invPropNuk')->default(0);
            $table->integer('invPropIon')->default(0);
            $table->integer('invPropPlasma')->default(0);
            $table->integer('invPropMa')->default(0);
            $table->integer('invPropHMA')->default(0);
            $table->integer('invManiobraQuimico')->default(0);
            $table->integer('invManiobraNuk')->default(0);
            $table->integer('invManiobraIon')->default(0);
            $table->integer('invManiobraPlasma')->default(0);
            $table->integer('invManiobraMa')->default(0);
            $table->integer('invManiobraHMA')->default(0);
            $table->integer('municion')->default(0);
            $table->integer('fuel')->default(0);
            $table->integer('invTitanio')->default(0);
            $table->integer('invReactivo')->default(0);
            $table->integer('invResinas')->default(0);
            $table->integer('invPlacas')->default(0);
            $table->integer('invCarbonadio')->default(0);
            $table->integer('mantenimiento')->default(0);
            $table->integer('tiempo')->default(0);
            $table->integer('carga')->default(0);
            $table->integer('cargaPequenia')->default(0);
            $table->integer('cargaMediana')->default(0);
            $table->integer('cargaGrande')->default(0);
            $table->integer('cargaEnorme')->default(0);
            $table->integer('cargaMega')->default(0);
            $table->integer('recolector')->default(0);
            $table->integer('extractor')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mejoras_disenios');
    }
}
