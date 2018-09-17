<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiseñosToEnDiseñoEnPlanetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diseños_en_planetas', function (Blueprint $table) {
            $table->integer('diseños_id')->unsigned();
            $table->foreign('diseños_id')->references('id')->on('diseños');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diseños_en_planetas', function (Blueprint $table) {
            $table->dropforeign(['diseños_id']);
            $table->dropColumn('diseños_id');
        });
    }
}