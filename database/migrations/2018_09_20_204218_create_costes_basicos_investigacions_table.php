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
            $table->string('constante');
            $table->string('descuentoM');
            $table->string('descuentoC');
            $table->decimal('mineral',6,2)->default(0);
            $table->decimal('cristal',6,2)->default(0);
            $table->decimal('gas',6,2)->default(0);
            $table->decimal('plastico',6,2)->default(0);
            $table->decimal('ceramica',6,2)->default(0);
            $table->decimal('liquido',6,2)->default(0);
            $table->decimal('micros',6,2)->default(0);
            $table->decimal('fuel',6,2)->default(0);
            $table->decimal('ma',6,2)->default(0);
            $table->decimal('municion',6,2)->default(0);

            $table->integer('Imineral')->default(0);
            $table->integer('Icristal')->default(0);
            $table->integer('Igas')->default(0);
            $table->integer('Iplastico')->default(0);
            $table->integer('Iceramica')->default(0);
            $table->integer('Iliquido')->default(0);
            $table->integer('Imicros')->default(0);
            $table->integer('Ifuel')->default(0);
            $table->integer('Ima')->default(0);
            $table->integer('Imunicion')->default(0);



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