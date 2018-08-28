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
        $mejoras->velocidad=0;
        $mejoras->carga=0;
        $mejoras->hangar=0;
        $mejoras->fuel=0;
        $mejoras->defensa=0;
        $mejoras->mantenimiento=0;
        $mejoras->tiempo=0;
        $mejoras->cazas=0;
        $mejoras->ligeras=0;
        $mejoras->medias=0;
        $mejoras->pesadas=0;
        $mejoras->defensas=0;
        $mejoras->diseños_id=$n;
        array_push($mejorasDiseños, $mejoras);
        $n++;

        $mejoras=new MjorasDiseños(); //remolcador
        $mejoras->velocidad=0;
        $mejoras->carga=0;
        $mejoras->hangar=0;
        $mejoras->fuel=0;
        $mejoras->defensa=0;
        $mejoras->mantenimiento=0;
        $mejoras->tiempo=0;
        $mejoras->cazas=0;
        $mejoras->ligeras=0;
        $mejoras->medias=0;
        $mejoras->pesadas=0;
        $mejoras->defensas=0;
        $mejoras->diseños_id=$n;
        array_push($mejorasDiseños, $mejoras);
        $n++;


        foreach($mejorasDiseños as $estemejoras){
            $estemejoras->save();
        }


    }
}