<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnRecursosEnDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_recursos_en_destinos', function (Blueprint $table) {
            $table->id();
            $table->decimal('personal', 13, 2); //99.999.999.999
            $table->decimal('mineral', 13, 2);
            $table->decimal('cristal', 13, 2);
            $table->decimal('gas', 11, 2);
            $table->decimal('plastico', 11, 2);
            $table->decimal('ceramica', 11, 2);
            $table->decimal('liquido', 11, 2);
            $table->decimal('micros', 11, 2);
            $table->decimal('fuel', 11, 2);
            $table->decimal('ma', 11, 2);
            $table->decimal('municion', 11, 2);
            $table->decimal('creditos', 13, 2);
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
        Schema::dropIfExists('en_recursos_en_destinos');
    }
}
