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
            $table->decimal('personal', 12, 2);
            $table->decimal('mineral', 12, 2);
            $table->decimal('cristal', 12, 2);
            $table->decimal('gas', 12, 2);
            $table->decimal('plastico', 12, 2);
            $table->decimal('ceramica', 12, 2);
            $table->decimal('liquido', 12, 2);
            $table->decimal('micros', 12, 2);
            $table->decimal('fuel', 12, 2);
            $table->decimal('ma', 12, 2);
            $table->decimal('municion', 12, 2);
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