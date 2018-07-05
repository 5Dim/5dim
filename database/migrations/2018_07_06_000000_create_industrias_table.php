<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industrias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('industria1'); // si esta activa la industria
            $table->boolean('industria2');
            $table->boolean('industria3');
            $table->boolean('industria4');
            $table->boolean('industria5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industrias');
    }
}