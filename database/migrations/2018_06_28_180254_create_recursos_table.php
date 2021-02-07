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
            $table->increments('id');
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
        Schema::dropIfExists('recursos');
    }
}
