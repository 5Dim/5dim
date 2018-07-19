<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuselajes extends Model
{
    public $timestamps = false;

    public function  generarDatosFuselajes(){

        $fuselajes=[];

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="xg";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->alianza="no";

                array_push($fuselajes, $fuselaje);


            foreach($fuselajes as $estefuselaje){
                $estefuselaje->save();
            }

        //return $result;
    }

}