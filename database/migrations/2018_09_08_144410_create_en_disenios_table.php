<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnDiseniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_disenios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('accion');
            $table->unsignedMediumInteger('cantidad');
            $table->unsignedInteger('tiempo');
            $table->timestamps();
            $table->timestamp('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_disenios');
    }
}
