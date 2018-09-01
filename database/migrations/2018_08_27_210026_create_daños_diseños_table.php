<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDañosDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daños_diseños', function (Blueprint $table) {
            $table->increments('id');
            $table->string('investigacion');
            $table->string('fila');
            $table->integer('distancia0')->default(0);
            $table->integer('distancia1')->default(0);
            $table->integer('distancia2')->default(0);
            $table->integer('distancia3')->default(0);
            $table->integer('distancia4')->default(0);
            $table->integer('distancia5')->default(0);
            $table->integer('distancia6')->default(0);
            $table->integer('distancia7')->default(0);

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
        Schema::dropIfExists('daños_diseños');
    }
}