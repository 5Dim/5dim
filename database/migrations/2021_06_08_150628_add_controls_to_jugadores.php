<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddControlsToJugadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->timestamp("ultima_actividad")->useCurrent();
            $table->string("navegador")->nullable()->default(null);
            $table->string("ip1")->nullable()->default(null);
            $table->string("ip2")->nullable()->default(null);
            $table->string("ip3")->nullable()->default(null);
            $table->string("ip4")->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropColumn('ultima_actividad');
            $table->dropColumn('navegador');
            $table->dropColumn('ip1');
            $table->dropColumn('ip2');
            $table->dropColumn('ip3');
            $table->dropColumn('ip4');
        });
    }
}
