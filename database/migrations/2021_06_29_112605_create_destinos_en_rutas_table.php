<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinosEnRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinos_en_rutas', function (Blueprint $table) {
            $table->id();
            $table->decimal('porcentVel', 5, 2, true);
            $table->string('mision');
            $table->unsignedMediumInteger('estrella');
            $table->unsignedTinyInteger('orbita');
            $table->timestamps();

            $table->unsignedBigInteger('rutas_predefinidas_id')->nullable();
            $table->foreign('rutas_predefinidas_id')->references('id')->on('rutas_predefinidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinos_en_rutas');
    }
}
