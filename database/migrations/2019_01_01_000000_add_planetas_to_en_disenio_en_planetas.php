<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanetasToEnDisenioEnPlanetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disenios_en_planetas', function (Blueprint $table) {
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
        Schema::table('disenios_en_planetas', function (Blueprint $table) {
            $table->dropforeign(['planetas_id']);
            $table->dropColumn('planetas_id');
        });
    }
}
