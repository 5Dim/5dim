<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostesConstruccionesIdToConstrucciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costes_construcciones', function (Blueprint $table) {
            $table->integer('codigo')->unsigned();
            $table->foreign('codigo')->references('id')->on('construcciones');
            $table->integer('nivel')->unsigned();
            $table->foreign('nivel')->references('id')->on('construcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costes_construcciones', function (Blueprint $table) {
            $table->dropforeign(['codigo']);
            $table->dropColumn('codigo');
            $table->dropforeign(['nivel']);
            $table->dropColumn('nivel');
        });
    }
}