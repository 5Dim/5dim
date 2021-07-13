<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnConstruccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_construcciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('personal', 13, 2);
            $table->unsignedTinyInteger('nivel');
            $table->string('accion');
            $table->unsignedBigInteger('construcciones_id')->unsigned();
            $table->foreign('construcciones_id')->references('id')->on('construcciones');
            $table->timestamps();
            $table->timestamp('finished_at')->nullable();
            $table->softDeletes();
            $table->string("motivo_delete")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_construcciones');
    }
}
