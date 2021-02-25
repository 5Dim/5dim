<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiseniosToEnDisenioEnPlanetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disenios_en_planetas', function (Blueprint $table) {
            $table->unsignedBigInteger('disenios_id')->unsigned();
            $table->foreign('disenios_id')->references('id')->on('disenios');
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
            $table->dropforeign(['disenios_id']);
            $table->dropColumn('disenios_id');
        });
    }
}
