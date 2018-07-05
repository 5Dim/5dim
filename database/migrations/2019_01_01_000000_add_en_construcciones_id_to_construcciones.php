<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnConstruccionesIdToConstrucciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_construcciones', function (Blueprint $table) {
            $table->integer('codigo')->unsigned();
            $table->foreign('codigo')->references('id')->on('construcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('en_construcciones', function (Blueprint $table) {
            $table->dropforeign(['codigo']);
            $table->dropColumn('codigo');
        });
    }
}