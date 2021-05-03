<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaniosDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danios_disenios', function (Blueprint $table) {
            $table->id();
            $table->string('investigacion');
            $table->string('fila');
            $table->unsignedInteger('distancia0')->default(0);
            $table->unsignedInteger('distancia1')->default(0);
            $table->unsignedInteger('distancia2')->default(0);
            $table->unsignedInteger('distancia3')->default(0);
            $table->unsignedInteger('distancia4')->default(0);
            $table->unsignedInteger('distancia5')->default(0);
            $table->unsignedInteger('distancia6')->default(0);
            $table->unsignedInteger('distancia7')->default(0);
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');

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
        Schema::dropIfExists('danios_disenios');
    }
}
