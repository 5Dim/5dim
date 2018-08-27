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
            $table->decimal('personal', 14, 2);
            $table->decimal('mineral', 14, 2);
            $table->decimal('cristal', 14, 2);
            $table->decimal('gas', 14, 2);
            $table->decimal('plastico', 14, 2);
            $table->decimal('ceramica', 14, 2);
            $table->decimal('liquido', 14, 2);
            $table->decimal('micros', 14, 2);
            $table->decimal('fuel', 14, 2);
            $table->decimal('ma', 14, 2);
            $table->decimal('municion', 14, 2);
            $table->decimal('creditos', 14, 2);
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