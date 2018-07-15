<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constantes extends Model
{

    public $timestamps = false;

    public function  generarDatosConstantes($universo=0){

        $producciones=[];

        /// construcciones y produccion

                $constante =new Constantes(); //  /10
                $constante->universo_id=$universo;
                $constante->valor=1.6;
                $constante->minimo=1;
                $constante->maximo=3;
                $constante->codigo='avelprodminas';
                $constante->descripcion='produccion de recursos en minas';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=330;
                $constante->minimo=200;
                $constante->maximo=600;
                $constante->codigo='velocidadConst';
                $constante->descripcion='velocidad de construccion (mas a menos numero)';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=15;
                $constante->minimo=3;
                $constante->maximo=30;
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

            ////////  investigaciones  ////////////////////////////////////////////////////////////////

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=3;
                $constante->minimo=1;
                $constante->maximo=6;
                $constante->codigo='colaInvest';
                $constante->descripcion='investigaciones simultaneas';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=2;
                $constante->minimo=1;
                $constante->maximo=6;
                $constante->codigo='velInvest';
                $constante->descripcion='velocidad  investigaciones';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.5;
                $constante->maximo=1.5;
                $constante->codigo='investCorrector';
                $constante->descripcion='multiplicador del coste de investigacion';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.35;
                $constante->minimo=1.2;
                $constante->maximo=1.5;
                $constante->codigo='Ifactor';
                $constante->descripcion='lo que aumenta el costo de un nivel al siguiente';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.03;
                $constante->minimo=1;
                $constante->maximo=1.1;
                $constante->codigo='costoInvestArmas';
                $constante->descripcion='costo investigaciones armas es EXPONENCIAL aprox 1.1 aumenta el 100%';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.03;
                $constante->minimo=1;
                $constante->maximo=1.1;
                $constante->codigo='costoInvestMotores';
                $constante->descripcion='costo investigaciones motores es EXPONENCIAL aprox 1.1 aumenta el 100%';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.03;
                $constante->minimo=1;
                $constante->maximo=1.1;
                $constante->codigo='costoInvestIndustrias';
                $constante->descripcion='costo investigaciones industrias es EXPONENCIAL aprox 1.1 aumenta el 100%';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.03;
                $constante->minimo=1;
                $constante->maximo=1.1;
                $constante->codigo='costoInvestImperio';
                $constante->descripcion='costo investigaciones imperio es EXPONENCIAL aprox 1.1 aumenta el 100%';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.03;
                $constante->minimo=1;
                $constante->maximo=1.1;
                $constante->codigo='costoInvestDiseño';
                $constante->descripcion='costo investigaciones diseño es EXPONENCIAL aprox 1.1 aumenta el 100%';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);



            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}