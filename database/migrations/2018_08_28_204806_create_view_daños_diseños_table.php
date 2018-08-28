<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDañosDiseñosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW view_daños_diseños");

        DB::statement("CREATE VIEW view_daños_diseños AS
                        SELECT *,
                      (  (
                            SELECT distancia0
                            FROM daños_diseños AS dd
                            WHERE dd.diseños_id = d.id and dd.investigacion='invPlasma'
                        ) +
                         (
                            SELECT distancia0
                            FROM daños_diseños AS dd
                            WHERE dd.diseños_id = d.id and dd.investigacion='invEnergia'
                        ) )
                        as distancia0

                        FROM diseños AS d");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_daños_diseños");
    }
}