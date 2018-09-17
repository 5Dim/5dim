<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesDiseños extends Model
{
    public $timestamps = false;

    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }

    public function  generarDatosCostesDiseños(){


        $costesDiseños=[];
        $n=1;

        $costes=new CostesDiseños(); //recolector
        $costes->mineral=50000;
        $costes->cristal=40000;
        $costes->gas=4000;
        $costes->plastico=4000;
        $costes->ceramica=6000;
        $costes->liquido=1500;
        $costes->micros=9000;
        $costes->personal=4;
        $costes->masa=100000;
        $costes->energia=0;
        $costes->diseños_id=$n;
        array_push($costesDiseños, $costes);
        $n++;

        $costes=new CostesDiseños(); //remolcador
        $costes->mineral=2000000;
        $costes->cristal=1000000;
        $costes->gas=150000;
        $costes->plastico=100000;
        $costes->ceramica=50000;
        $costes->liquido=40000;
        $costes->micros=30000;
        $costes->personal=400;
        $costes->masa=10000000;
        $costes->energia=0;
        $costes->diseños_id=$n;
        array_push($costesDiseños, $costes);
        $n++;


        foreach($costesDiseños as $estecosto){
            $estecosto->save();
        }


    }
}