<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlianzasToEnInvestigaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_investigaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('alianzas_id')->unsigned();
            $table->foreign('alianzas_id')->references('id')->on('alianzas');
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
            $table->dropforeign(['alianzas_id']);
            $table->dropColumn('alianzas_id');
        });
    }
}
