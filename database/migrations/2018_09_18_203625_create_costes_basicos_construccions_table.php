<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesBasicosConstruccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_basicos_construccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->double('mineral');
            $table->double('cristal');
            $table->double('gas');
            $table->double('plastico');
            $table->double('ceramica');
            $table->double('liquido');
            $table->double('micros');

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
        Schema::dropIfExists('costes_basicos_construccions');
    }
}