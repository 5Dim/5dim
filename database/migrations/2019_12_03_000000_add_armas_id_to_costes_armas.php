<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArmasIdToCostesArmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costes_armas', function (Blueprint $table) {
            $table->integer('armas_id')->unsigned();
            $table->foreign('armas_id')->references('id')->on('armas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costes_armas', function (Blueprint $table) {
            $table->dropforeign(['armas_id']);
            $table->dropColumn('armas_id');
        });
    }
}