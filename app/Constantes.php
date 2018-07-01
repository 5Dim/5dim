<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constantes extends Model
{

    public $timestamps = false;

    public function  generarDatosConstantes(){

        $producciones=[];


                $constante =new Constantes();
                $constante->valor=1.6;
                $constante->minimo=1;
                $constante->maximo=3;
                $constante->codigo='Avelprodminas';
                $constante->descripcion='produccion de recursos en minas';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->valor=3;
                $constante->minimo=1;
                $constante->maximo=6;
                $constante->codigo='InvestSimultaneas';
                $constante->descripcion='investigaciones simultaneas';
                array_push($producciones, $constante);



            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}