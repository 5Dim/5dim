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
            $table->integer('armas_codigo')->unsigned();
            $table->foreign('armas_codigo')->references('codigo')->on('armas');
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
            $table->dropforeign(['armas_codigo']);
            $table->dropColumn('armas_codigo');
        });
    }
}