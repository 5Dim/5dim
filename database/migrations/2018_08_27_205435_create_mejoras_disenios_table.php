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
            $table->unsignedInteger('invPropQuimico')->default(0);
            $table->unsignedInteger('invPropNuk')->default(0);
            $table->unsignedInteger('invPropIon')->default(0);
            $table->unsignedInteger('invPropPlasma')->default(0);
            $table->unsignedInteger('invPropMa')->default(0);
            $table->unsignedInteger('invPropHMA')->default(0);
            $table->unsignedInteger('invManiobraQuimico')->default(0);
            $table->unsignedInteger('invManiobraNuk')->default(0);
            $table->unsignedInteger('invManiobraIon')->default(0);
            $table->unsignedInteger('invManiobraPlasma')->default(0);
            $table->unsignedInteger('invManiobraMa')->default(0);
            $table->unsignedInteger('invManiobraHMA')->default(0);
            $table->unsignedInteger('municion')->default(0);
            $table->unsignedInteger('fuel')->default(0);
            $table->unsignedInteger('invTitanio')->default(0);
            $table->unsignedInteger('invReactivo')->default(0);
            $table->unsignedInteger('invResinas')->default(0);
            $table->unsignedInteger('invPlacas')->default(0);
            $table->unsignedInteger('invCarbonadio')->default(0);
            $table->unsignedInteger('mantenimiento')->default(0);
            $table->unsignedInteger('tiempo')->default(0);
            $table->unsignedBigInteger('masa')->default(0);
            $table->unsignedInteger('energia')->default(0);
            $table->unsignedInteger('carga')->default(0);
            $table->unsignedInteger('cargaPequenia')->default(0);
            $table->unsignedInteger('cargaMediana')->default(0);
            $table->unsignedInteger('cargaGrande')->default(0);
            $table->unsignedInteger('cargaEnorme')->default(0);
            $table->unsignedInteger('cargaMega')->default(0);
            $table->unsignedInteger('recolector')->default(0);
            $table->unsignedInteger('extractor')->default(0);
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
