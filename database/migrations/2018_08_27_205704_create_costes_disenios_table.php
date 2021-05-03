<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostesDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_disenios', function (Blueprint $table) {
            $table->id();
            $table->decimal('mineral', 12, 0)->default(0);
            $table->decimal('cristal', 12, 0)->default(0);
            $table->unsignedInteger('gas')->default(0);
            $table->unsignedInteger('plastico')->default(0);
            $table->unsignedInteger('ceramica')->default(0);
            $table->unsignedInteger('liquido')->default(0);
            $table->unsignedInteger('micros')->default(0);
            $table->unsignedInteger('personal')->default(0);
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_disenios');
    }
}
