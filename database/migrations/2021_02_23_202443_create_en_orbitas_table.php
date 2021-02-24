<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnOrbitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_orbitas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index(); // nombre privado, para ti unicamente
            $table->string('publico')->index(); // nombre publico, la que ven todos
            $table->unsignedMediumInteger('coordxinit')->nullable();
            $table->unsignedMediumInteger('coordyinit')->nullable();
            $table->unsignedMediumInteger('coordx')->nullable();
            $table->unsignedMediumInteger('coordy')->nullable();
            $table->decimal('vectorx', 8, 2);
            $table->decimal('vectory', 8, 2);
            $table->unsignedBigInteger('ataqueReal')->nullable();
            $table->unsignedBigInteger('defensaReal')->nullable();
            $table->unsignedBigInteger('ataqueVisible')->nullable();
            $table->unsignedBigInteger('defensaVisible')->nullable();
            $table->unsignedInteger('creditos');
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
        Schema::dropIfExists('en_orbitas');
    }
}
