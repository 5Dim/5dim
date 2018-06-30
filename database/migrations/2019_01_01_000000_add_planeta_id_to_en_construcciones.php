<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanetaIdToEnConstrucciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_construcciones', function (Blueprint $table) {
            $table->integer('construcciones_id')->unsigned();
            $table->foreign('construcciones_id')->references('id')->on('construcciones');
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
            $table->dropforeign(['construcciones_id']);
            $table->dropColumn('construcciones_id');
        });
    }
}
