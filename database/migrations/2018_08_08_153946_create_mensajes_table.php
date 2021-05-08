<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->mediumText('mensaje');
            $table->string('categoria')->index();
            $table->unsignedBigInteger('emisor')->nullable()->default(null);
            $table->foreign('emisor')->references('id')->on('jugadores');
            $table->string('emisor_sys')->nullable()->default(null);
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
        Schema::dropIfExists('mensajes');
    }
}
