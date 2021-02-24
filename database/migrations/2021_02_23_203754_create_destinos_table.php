<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinos', function (Blueprint $table) { // Relacionado con planeta y flotas
            $table->increments('id');
            $table->decimal('porcentVel', 5, 2, true);
            $table->string('mision');
            $table->decimal('coordx', 8, 2, true);
            $table->decimal('coordy', 8, 2, true);
            $table->unsignedMediumInteger('estrella');
            $table->unsignedTinyInteger('orbita');
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
        Schema::dropIfExists('destinos');
    }
}
