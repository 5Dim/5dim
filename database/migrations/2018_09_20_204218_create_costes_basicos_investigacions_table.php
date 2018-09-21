<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostesBasicosInvestigacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costes_basicos_investigacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->double('mineral')->default(0);
            $table->double('cristal')->default(0);
            $table->double('gas')->default(0);
            $table->double('plastico')->default(0);
            $table->double('ceramica')->default(0);
            $table->double('liquido')->default(0);
            $table->double('micros')->default(0);
            $table->double('fuel')->default(0);
            $table->double('ma')->default(0);
            $table->double('municion')->default(0);

            $table->double('Imineral')->default(0);
            $table->double('Icristal')->default(0);
            $table->double('Igas')->default(0);
            $table->double('Iplastico')->default(0);
            $table->double('Iceramica')->default(0);
            $table->double('Iliquido')->default(0);
            $table->double('Imicros')->default(0);
            $table->double('Ifuel')->default(0);
            $table->double('Ima')->default(0);
            $table->double('Imunicion')->default(0);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costes_basicos_investigacions');
    }
}