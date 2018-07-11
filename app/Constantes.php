<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constantes extends Model
{

    public $timestamps = false;

    public function  generarDatosConstantes($universo=0){

        $producciones=[];


                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.6;
                $constante->minimo=1;
                $constante->maximo=3;
                $constante->codigo='Avelprodminas';
                $constante->descripcion='produccion de recursos en minas';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=335;
                $constante->minimo=200;
                $constante->maximo=600;
                $constante->codigo='velocidadConst';
                $constante->descripcion='velocidad de construccion (mas a menos numero)';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=6;
                $constante->minimo=3;
                $constante->maximo=15;
                $constante->codigo='colaConstruccion';
                $constante->descripcion='construcciones simultaneas';
                $constante->tipo='construccion';
                array_push($producciones, $constante);


                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=8;
                $constante->minimo=3;
                $constante->maximo=15;
                $constante->codigo='costoLiquido';
                $constante->descripcion='costo en mineral de ind liqu';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=5;
                $constante->maximo=15;
                $constante->codigo='costoMicros';
                $constante->descripcion='costo en cristal de ind micros';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=5;
                $constante->maximo=15;
                $constante->codigo='costoFuel';
                $constante->descripcion='costo en gas de ind fuel';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=5;
                $constante->maximo=15;
                $constante->codigo='costoMa';
                $constante->descripcion='costo en plastico de ind MA';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=2;
                $constante->minimo=1;
                $constante->maximo=3;
                $constante->codigo='costoMunicion';
                $constante->descripcion='costo en ceramica de ind municion';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.75;
                $constante->minimo=.5;
                $constante->maximo=1;
                $constante->codigo='perdidaCancelar';
                $constante->descripcion='lo que te queda por cancelar construccion';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.7;
                $constante->minimo=.3;
                $constante->maximo=1;
                $constante->codigo='perdidaReciclar';
                $constante->descripcion='lo que te queda por reciclar construccion';
                $constante->tipo='construccion';
                array_push($producciones, $constante);



                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=3;
                $constante->minimo=1;
                $constante->maximo=6;
                $constante->codigo='colaInvest';
                $constante->descripcion='investigaciones simultaneas';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);



            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}