<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlianzasToSolicitudesAlianza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_alianzas', function (Blueprint $table) {
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
        Schema::table('solicitudes_alianzas', function (Blueprint $table) {
            $table->dropforeign(['alianzas_id']);
            $table->dropColumn('alianzas_id');
        });
    }
}
