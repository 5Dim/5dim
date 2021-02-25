<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFuselajesToCualidadesFuselajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cualidades_fuselajes', function (Blueprint $table) {
            $table->unsignedBigInteger('fuselajes_id')->unsigned();
            $table->foreign('fuselajes_id')->references('id')->on('fuselajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cualidades_fuselajes', function (Blueprint $table) {
            $table->dropforeign(['fuselajes_id']);
            $table->dropColumn('fuselajes_id');
        });
    }
}
