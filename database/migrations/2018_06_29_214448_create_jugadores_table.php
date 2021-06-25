<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->string('avatar')->default('http://5dim.es/imagenes/avatar.jpg');
            $table->unsignedMediumInteger('puntos_construccion')->default(0);
            $table->unsignedMediumInteger('puntos_investigacion')->default(0);
            $table->unsignedMediumInteger('puntos_flotas')->default(0);
            $table->unsignedTinyInteger('movimientos')->default(0);
            $table->string('baliza')->unique();
            $table->timestamp('premiun_at')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp("ultima_actividad")->useCurrent();
            $table->string("navegador")->nullable()->default(null);
            $table->string("ip1")->nullable()->default(null);
            $table->string("ip2")->nullable()->default(null);
            $table->string("ip3")->nullable()->default(null);
            $table->string("ip4")->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
