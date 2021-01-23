<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiseniosToCostesDisenios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costes_disenios', function (Blueprint $table) {
            $table->integer('disenios_id')->unsigned();
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
        Schema::table('costes_disenios', function (Blueprint $table) {
            $table->dropforeign(['disenios_id']);
            $table->dropColumn('disenios_id');
        });
    }
}