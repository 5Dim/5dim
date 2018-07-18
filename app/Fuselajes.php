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
                $fuselaje->nombre="XG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";

                array_push($fuselajes, $fuselaje);


            foreach($fuselajes as $estefuselaje){
                $estefuselaje->save();
            }

        //return $result;
    }

}