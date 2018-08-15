<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTiendaToHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tienda_historials', function (Blueprint $table) {
            $table->integer('tiendas_id')->unsigned();
            $table->foreign('tiendas_id')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tienda_historials', function (Blueprint $table) {
            $table->dropforeign(['tiendas_id']);
            $table->dropColumn('tiendas_id');
        });
    }
}