<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->decimal('personal', 14, 3); //99.999.999.999
            $table->decimal('mineral', 14, 3);
            $table->decimal('cristal', 14, 3);
            $table->decimal('gas', 12, 3);
            $table->decimal('plastico', 12, 3);
            $table->decimal('ceramica', 12, 3);
            $table->decimal('liquido', 12, 3);
            $table->decimal('micros', 12, 3);
            $table->decimal('fuel', 12, 3);
            $table->decimal('ma', 12, 3);
            $table->decimal('municion', 12, 3);
            $table->decimal('creditos', 14, 3);
            $table->unsignedBigInteger('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
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
        Schema::dropIfExists('recursos');
    }
}
