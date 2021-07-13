<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_investigaciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('personal', 13, 2);
            $table->unsignedTinyInteger('nivel');
            $table->string('accion');
            $table->string('codigo');
            $table->unsignedBigInteger('investigaciones_id')->unsigned();
            $table->foreign('investigaciones_id')->references('id')->on('investigaciones');
            $table->unsignedBigInteger('planetas_id')->unsigned();
            $table->foreign('planetas_id')->references('id')->on('planetas');
            $table->timestamps();
            $table->timestamp('finished_at')->nullable();
            $table->softDeletes();
            $table->string("motivo_delete")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_investigaciones');
    }
}
