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


                /////// FUSELAJES  ///////////////////////////////////////////////////

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
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
                $constante->codigo='fuselajenaveDefensaTodas';
                $constante->descripcion='variación de los defensa de  fuselaje naves ';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);


                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
                $constante->codigo='fuselajenaveDefensacaza';
                $constante->descripcion='variación de los defensa de fuselaje naves caza';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
                $constante->codigo='fuselajenaveDefensaligera';
                $constante->descripcion='variación de los defensa de fuselaje naves ligera';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
                $constante->codigo='fuselajenaveDefensamedia';
                $constante->descripcion='variación de los defensa de fuselaje naves media';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
                $constante->codigo='fuselajenaveDefensapesada';
                $constante->descripcion='variación de los defensa de  fuselaje naves pesada';
                $constante->tipo='fuselajes';
                array_push($producciones, $constante);

                $constante =new Constantes();
                $constante->universo_id=$universo;
                $constante->valor=10;
                $constante->minimo=2;
                $constante->maximo=40;
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





            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}