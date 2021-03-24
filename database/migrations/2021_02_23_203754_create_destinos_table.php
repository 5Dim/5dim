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
            $table->id();
            $table->decimal('porcentVel', 5, 2, true);
            $table->string('mision');
            $table->unsignedMediumInteger('initestrella');
            $table->unsignedTinyInteger('initorbita');
            $table->unsignedMediumInteger('estrella');
            $table->unsignedTinyInteger('orbita');
            $table->unsignedDecimal('initcoordx', 8, 2, true);
            $table->unsignedDecimal('initcoordy', 8, 2, true);
            $table->unsignedDecimal('fincoordx', 8, 2, true);
            $table->unsignedDecimal('fincoordy', 8, 2, true);
            $table->unsignedTinyInteger('visitado')->default(0);
            //$table->decimal('vectorx', 8, 2);
            //$table->decimal('vectory', 8, 2);
            $table->timestamp('init');
            $table->timestamp('fin')->nullable();
            $table->unsignedBigInteger('envuelos_id')->unsigned();
            $table->foreign('envuelos_id')->references('id')->on('en_vuelos');
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
