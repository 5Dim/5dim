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
                $constante->descripcion='lo que te queda por cancelar construccion o naves';
                $constante->tipo='construccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.7;
                $constante->minimo=.3;
                $constante->maximo=1;
                $constante->codigo='perdidaReciclar';
                $constante->descripcion='lo que te queda por reciclar construccion o naves';
                $constante->tipo='construccion';
                array_push($producciones, $constante);


                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.5;
                $constante->maximo=2;
                $constante->codigo='monedaPorNivel';
                $constante->descripcion='multiplicador de moneda por nivel de edificio';
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
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=12;
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

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1.5;
                $constante->minimo=.5;
                $constante->maximo=4;
                $constante->codigo='adminImperioPuntos';
                $constante->descripcion='puntos de imperio por nivel';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvEnergia';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion Energia';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPlasma';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion Plasma';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvBalistica';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion Balistica';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvMa';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion MA';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropQuimico';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor quimico';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropNuk';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor nuclear';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropIon';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor Iones';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropPlasma';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor Plasma';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropMa';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor MA';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvPropHma';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion motor HMA';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvBlindaje';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion blindajes';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvCarga';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion carga y transporte';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvIa';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion IA';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.05;
                $constante->minimo=.01;
                $constante->maximo=.2;
                $constante->codigo='mejorainvIndustrias';
                $constante->descripcion='porcentaje que aumenta en diseño cada nivel investigacion mejoras industrias';
                $constante->tipo='investigacion';
                array_push($producciones, $constante);



                /////// FUSELAJES  ///////////////////////////////////////////////////
                //Naves//////////////////////////////////////////////////////////////////////////7

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=0;
                $constante->minimo=-20;
                $constante->maximo=20;
                $constante->codigo='fuselajenaveCostoPuntosTodas';
                $constante->descripcion='variación de puntos para todos los fuselajes de naves, es suma ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveConstruccionTiempoTodas';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveConstruccionTiempoligera';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveConstruccionTiempocaza';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveConstruccionTiempomedia';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='construccionfuselajenaveTiempopesada';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveConstruccionTiempoestacion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursosTodas';
                $constante->descripcion='variación de los costes de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursoscaza';
                $constante->descripcion='variación de los costes de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursosligera';
                $constante->descripcion='variación de los costes de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursosmedia';
                $constante->descripcion='variación de los costes de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursospesada';
                $constante->descripcion='variación de los costes de  fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveRecursosestacion';
                $constante->descripcion='variación de los costes de  fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensaTodas';
                $constante->descripcion='variación de los defensa de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensacaza';
                $constante->descripcion='variación de los defensa de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensaligera';
                $constante->descripcion='variación de los defensa de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensamedia';
                $constante->descripcion='variación de los defensa de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensapesada';
                $constante->descripcion='variación de los defensa de  fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajenaveDefensaestacion';
                $constante->descripcion='variación de los defensa de  fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergiaTodas';
                $constante->descripcion='variación de los Energia de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergiacaza';
                $constante->descripcion='variación de los Energia de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergialigera';
                $constante->descripcion='variación de los Energia de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergiamedia';
                $constante->descripcion='variación de los Energia de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergiapesada';
                $constante->descripcion='variación de los Energia de fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveEnergiaestacion';
                $constante->descripcion='variación de los Energia de fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustibleTodas';
                $constante->descripcion='variación de los Combustible de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaCombustibleTodas';
                $constante->descripcion='variación de los Combustible de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustiblecaza';
                $constante->descripcion='variación de los Combustible de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustibleligera';
                $constante->descripcion='variación de los Combustible de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustiblemedia';
                $constante->descripcion='variación de los Combustible de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustiblepesada';
                $constante->descripcion='variación de los Combustible de fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveCombustibleestacion';
                $constante->descripcion='variación de los Combustible de fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientoTodas';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientocaza';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientoligera';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientomedia';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientopesada';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveMantenimientoestacion';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadTodas';
                $constante->descripcion='variación de los Velocidad de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadcaza';
                $constante->descripcion='variación de los Velocidad de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadligera';
                $constante->descripcion='variación de los Velocidad de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadmedia';
                $constante->descripcion='variación de los Velocidad de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadpesada';
                $constante->descripcion='variación de los Velocidad de fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveVelocidadestacion';
                $constante->descripcion='variación de los Velocidad de fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempoTodas';
                $constante->descripcion='variación de los Tiempo de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempocaza';
                $constante->descripcion='variación de los Tiempo de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempoligera';
                $constante->descripcion='variación de los Tiempo de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempomedia';
                $constante->descripcion='variación de los Tiempo de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempopesada';
                $constante->descripcion='variación de los Tiempo de fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajenaveTiempoestacion';
                $constante->descripcion='variación de los Tiempo de fuselaje naves estacion';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);




                //Defensas ////////////////////////////////////////////////////////////////////////
                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=0;
                $constante->minimo=-20;
                $constante->maximo=20;
                $constante->codigo='fuselajedefensaCostoPuntosTodas';
                $constante->descripcion='variación de puntos para todos los fuselajes de naves, es suma ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaConstruccionTiempoTodas';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaConstruccionTiempodefensa';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaRecursosTodas';
                $constante->descripcion='variación de los costes de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaRecursosdefensa';
                $constante->descripcion='variación de los costes de  fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaDefensaTodas';
                $constante->descripcion='variación de los defensa de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajedefensaDefensadefensa';
                $constante->descripcion='variación de los defensa de  fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaEnergiaTodas';
                $constante->descripcion='variación de los Energia de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaEnergiadefensa';
                $constante->descripcion='variación de los Energia de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaCombustibleTodas';
                $constante->descripcion='variación de los Combustible de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaCombustibledefensa';
                $constante->descripcion='variación de los Combustible de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaMantenimientoTodas';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaMantenimientodefensa';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaVelocidadTodas';
                $constante->descripcion='variación de los Velocidad de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaVelocidaddefensa';
                $constante->descripcion='variación de los Velocidad de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaTiempoTodas';
                $constante->descripcion='variación de los Tiempo de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajedefensaTiempodefensa';
                $constante->descripcion='variación de los Tiempo de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);



                //Tropas ////////////////////////////////////////////////////////////////////////
                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=0;
                $constante->minimo=-20;
                $constante->maximo=20;
                $constante->codigo='fuselajetropaCostoPuntosTodas';
                $constante->descripcion='variación de puntos para todos los fuselajes de naves, es suma ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempoTodas';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempoinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempoavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempovehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempomech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaConstruccionTiempomegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosTodas';
                $constante->descripcion='variación de los costes de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosvehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosmech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaRecursosmegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensaTodas';
                $constante->descripcion='variación de los defensa de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensainfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensaavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensavehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensamech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaDefensamegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajetropaEnergiaTodas';
                $constante->descripcion='variación de los Energia de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaEnergiainfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaEnergiaavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaEnergiavehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaEnergiamech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaEnergiamegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajetropaCombustibleTodas';
                $constante->descripcion='variación de los Combustible de fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaCombustibleinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaCombustibleavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaCombustiblevehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaCombustiblemech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaCombustiblemegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajetropaMantenimientoTodas';
                $constante->descripcion='variación de los Mantenimiento de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaMantenimientoinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaMantenimientoavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaMantenimientovehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaMantenimientomech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaMantenimientomegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajetropaVelocidadTodas';
                $constante->descripcion='variación de los Velocidad de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaVelocidadinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaVelocidadavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaVelocidadvehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaVelocidadmech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaVelocidadmegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.2;
                $constante->maximo=5;
                $constante->codigo='fuselajetropaTiempoTodas';
                $constante->descripcion='variación de los Tiempo de fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaTiempoinfanteria';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaTiempoavion';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaTiempovehiculo';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaTiempomech';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.3;
                $constante->maximo=3;
                $constante->codigo='fuselajetropaTiempomegaBot';
                $constante->descripcion='variación de la velocidad de construccion fuselaje naves defensa';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);



                /////PRODUCCION

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=.5;
                $constante->maximo=2;
                $constante->codigo='ahorroXCantidad';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de naves fabricadas';
                $constante->tipo='produccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.7;
                $constante->minimo=.5;
                $constante->maximo=1;
                $constante->codigo='maximoAhorroXCantidad';
                $constante->descripcion='máximo ahorro por cantidad de naves fabricadas';
                $constante->tipo='produccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10000;
                $constante->minimo=5000;
                $constante->maximo=30000;
                $constante->codigo='AhorroXcazas';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de cazas';
                $constante->tipo='produccion';
                array_push($producciones, $constante);


                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=100;
                $constante->minimo=0;
                $constante->maximo=300;
                $constante->codigo='AhorroXligeras';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de ligeras';
                $constante->tipo='produccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=3;
                $constante->minimo=0;
                $constante->maximo=6;
                $constante->codigo='AhorroXmedias';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de medias';
                $constante->tipo='produccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=1;
                $constante->minimo=0;
                $constante->maximo=3;
                $constante->codigo='AhorroXpesadas';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de pesadas';
                $constante->tipo='produccion';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=.5;
                $constante->minimo=0;
                $constante->maximo=300;
                $constante->codigo='AhorroXestaciones';
                $constante->descripcion='factor de cuanto se ahorra por cantidad de estaciones';
                $constante->tipo='produccion';
                array_push($producciones, $constante);






            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}