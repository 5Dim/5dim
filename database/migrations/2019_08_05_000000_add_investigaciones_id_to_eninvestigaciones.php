<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvestigacionesIdToEninvestigaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_investigaciones', function (Blueprint $table) {
            $table->integer('investigaciones_id')->unsigned();
            $table->foreign('investigaciones_id')->references('id')->on('investigaciones');

            $table->integer('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('en_investigaciones', function (Blueprint $table) {
            $table->dropforeign(['investigaciones_id']);
            $table->dropColumn('investigaciones_id');

            $table->dropforeign(['planetas_id']);
            $table->dropColumn('planetas_id');
        });
    }
}