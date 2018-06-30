<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnConstruccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_construcciones', function (Blueprint $table) {
            $table->increments('id');             
            $table->integer('personal');            
            $table->integer('nivel');  
           // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));       
           // $table->timestamp('finished_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->date('created_at') ;      
           $table->date('finished_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_construcciones');
    }
}
