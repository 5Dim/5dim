<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Diseños extends Model
{
    public function jugadores ()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function daños ()
    {
        return $this->hasOne(DañosDiseños::class);
    }

    public function cualidades ()
    {
        return $this->hasOne(CualidadesDiseños::class);
    }

    public function costes ()
    {
        return $this->hasOne(CostesDiseños::class);
    }

    public function viewDiseños ()
    {
        return $this->hasOne(ViewDiseños::class);
    }

    public function viewDaños ()
    {
        return $this->hasOne(ViewDañosDiseños::class);
    }

    public function fuselajes ()
    {
        return $this->belongsTo(Fuselajes::class);
    }

    public function generarDatosDiseños(){

        $diseños=[];
        $costesDiseños=[];

        $diseño =new Diseños();
        $diseño->nombre='Recolector';
        $diseño->posicion=9;
        $diseño->descripcion="Podemos dejar esta nave en órbita de asteroides para recolectar y otra nave que traiga los recursos.";
        $diseño->fuselajes_id=69;
        $diseño->codigo="RECOLECTOR";
        $diseño->skin=1;
        array_push($diseños, $diseño);

        $diseño =new Diseños();
        $diseño->nombre='Remolcador';
        $diseño->posicion=9;
        $diseño->descripcion="Esta nave está diseñada para remolcar estaciones o mover planetoides colonizados.";
        $diseño->fuselajes_id=70;
        $diseño->codigo="REMOLCADOR";
        $diseño->skin=1;
        array_push($diseños, $diseño);



        foreach($diseños as $estediseño){
            $estediseño->save();
        }

            //return $result;
    }
}