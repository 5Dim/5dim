<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeletesToEnConstrucciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_construcciones', function (Blueprint $table) {
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
        Schema::table('en_construcciones', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('motivo_delete');
        });
    }
}
