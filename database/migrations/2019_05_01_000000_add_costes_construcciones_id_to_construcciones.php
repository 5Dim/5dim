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
        Schema::table('construcciones', function (Blueprint $table) {
            $table->string('codigo');
          //  $table->foreign('codigo')->references('codigo')->on('costes_construcciones');
            $table->integer('nivel');
          //  $table->foreign('nivel')->references('nivel')->on('costes_construcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('construcciones', function (Blueprint $table) {
            $table->dropforeign(['codigo']);
            $table->dropColumn('codigo');
            $table->dropforeign(['nivel']);
            $table->dropColumn('nivel');
        });
    }
}