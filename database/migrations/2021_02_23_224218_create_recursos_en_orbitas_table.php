<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosEnOrbitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_en_orbitas', function (Blueprint $table) {
            $table->id();
            $table->decimal('personal', 13, 2)->default(0); //99.999.999.999
            $table->decimal('mineral', 13, 2)->default(0);
            $table->decimal('cristal', 13, 2)->default(0);
            $table->decimal('gas', 11, 2)->default(0);
            $table->decimal('plastico', 11, 2)->default(0);
            $table->decimal('ceramica', 11, 2)->default(0);
            $table->decimal('liquido', 11, 2)->default(0);
            $table->decimal('micros', 11, 2)->default(0);
            $table->decimal('fuel', 11, 2)->default(0);
            $table->decimal('ma', 11, 2)->default(0);
            $table->decimal('municion', 11, 2)->default(0);
            $table->decimal('creditos', 13, 2)->default(0);
            $table->unsignedBigInteger('enorbitas_id')->unsigned();
            $table->foreign('enorbitas_id')->references('id')->on('en_orbitas');
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
        Schema::dropIfExists('recursos_en_orbitas');
    }
}
