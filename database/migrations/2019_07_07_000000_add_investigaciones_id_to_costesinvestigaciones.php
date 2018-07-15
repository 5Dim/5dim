<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvestigacionesIdToCostesinvestigaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costes_investigaciones', function (Blueprint $table) {
            $table->integer('investigaciones_id')->unsigned();
            $table->foreign('investigaciones_id')->references('id')->on('investigaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costes_investigaciones', function (Blueprint $table) {
            $table->dropforeign(['investigaciones_id']);
            $table->dropColumn('investigaciones_id');
        });
    }
}