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
            $table->unsignedMediumInteger('estrella');
            $table->unsignedTinyInteger('orbita');

            $table->unsigneddecimal('initcoordx', 8, 2, true);
            $table->unsigneddecimal('initcoordy', 8, 2, true);
            $table->unsigneddecimal('fincoordx', 8, 2, true);
            $table->unsigneddecimal('fincoordy', 8, 2, true);
            $table->decimal('vectorx', 8, 2);
            $table->decimal('vectory', 8, 2);

            $table->timestamp('init');
            $table->timestamp('fin');
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
