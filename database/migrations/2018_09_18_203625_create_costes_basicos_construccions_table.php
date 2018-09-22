<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesBasicosConstruccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_basicos_construccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->decimal('mineral',6,2)->default(0);
            $table->decimal('cristal',6,2)->default(0);
            $table->decimal('gas',6,2)->default(0);
            $table->decimal('plastico',6,2)->default(0);
            $table->decimal('ceramica',6,2)->default(0);
            $table->decimal('liquido',6,2)->default(0);
            $table->decimal('micros',6,2)->default(0);

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_basicos_construccions');
    }
}