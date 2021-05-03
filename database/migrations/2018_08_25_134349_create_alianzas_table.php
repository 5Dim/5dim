<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlianzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alianzas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('tag')->unique();
            $table->string('estandarte')->default("");
            $table->string('logo')->default("");
            $table->text('interno')->default("");
            $table->text('portada')->default("");
            $table->unsignedBigInteger('jugadores_id')->unsigned();
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
        Schema::dropIfExists('alianzas');
    }
}
