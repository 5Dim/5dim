<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->index();
            $table->decimal('valor', 12, 3);
            $table->decimal('minimo', 12, 3);
            $table->decimal('maximo', 12, 3);
            $table->boolean('votable')->default(true);
            $table->boolean('propuesta')->default(false);
            $table->tinyInteger('estado')->default(0);
            $table->string('accion')->nullable();
            $table->string('descripcion');
            $table->string('tipo')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constantes');
    }
}
