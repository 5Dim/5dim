<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Diseños extends Model
{
    public function jugadores ()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function generarDatosDiseños(){

        $diseños=[];
        $costesDiseños=[];

        $diseño =new Diseños();
        $diseño->nombre='Recolector';
        $diseño->posicion=9;
        $diseño->descripcion="Podemos dejar esta nave en órbita de asteroides para recolectar y otra nave que traiga los recursos.";
        //$diseño->jugadores_id=1;
        $diseño->codigo="RECOLECTOR";
        array_push($diseños, $diseño);

        $diseño =new Diseños();
        $diseño->nombre='Remolcador';
        $diseño->posicion=9;
        $diseño->descripcion="Esta nave está diseñada para remolcar estaciones o mover planetoides colonizados.";
        //$diseño->jugadores_id=1;
        $diseño->codigo="REMOLCADOR";
        array_push($diseños, $diseño);



        foreach($diseños as $estediseño){
            $estediseño->save();
        }

            //return $result;
    }
}