<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MejorasDiseños extends Model
{
    public $timestamps = false;

    public function  generarDatosMejorasDiseños(){


        $mejorasDiseños=[];
        $n=1;

        $mejoras=new MejorasDiseños(); //recolector
        $mejoras->invPropPlasma=10000;
        $mejoras->fuel=0;
        $mejoras->ataque=0;
        $mejoras->defensa=0;
        $mejoras->mantenimiento=0;
        $mejoras->tiempo=0;
        $mejoras->carga=40000;
        $mejoras->diseños_id=$n;
        array_push($mejorasDiseños, $mejoras);
        $n++;

        $mejoras=new MejorasDiseños(); //remolcador
        $mejoras->invPropPlasma=100000;
        $mejoras->fuel=0;
        $mejoras->ataque=0;
        $mejoras->defensa=0;
        $mejoras->mantenimiento=0;
        $mejoras->tiempo=0;
        $mejoras->carga=100000;
        $mejoras->cargaMega=1;
        $mejoras->diseños_id=$n;
        array_push($mejorasDiseños, $mejoras);
        $n++;


        foreach($mejorasDiseños as $estemejoras){
            $estemejoras->save();
        }


    }
}