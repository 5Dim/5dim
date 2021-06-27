<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constantes extends Model
{
    use HasFactory;


    public $timestamps = false;

    public static function generarDatosConstantes($universo = 0)
    {

        $producciones = [];

        /// construcciones y produccion

        $constante = new Constantes(); //  /10
        $constante->valor = 1.6;
        $constante->minimo = 1;
        $constante->maximo = 3;
        $constante->codigo = 'avelprodminas';
        $constante->descripcion = 'produccion de recursos en minas';
        $constante->tipo = 'construccion';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 330;
        $constante->minimo = 200;
        $constante->maximo = 600;
        $constante->codigo = 'velocidadConst';
        $constante->descripcion = 'velocidad de construccion (mas a menos numero)';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 8;
        $constante->minimo = 3;
        $constante->maximo = 15;
        $constante->codigo = 'costoLiquido';
        $constante->descripcion = 'costo en mineral de ind liqu';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 15;
        $constante->codigo = 'costoMicros';
        $constante->descripcion = 'costo en cristal de ind micros';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 15;
        $constante->codigo = 'costoFuel';
        $constante->descripcion = 'costo en gas de ind fuel';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 15;
        $constante->codigo = 'costoMa';
        $constante->descripcion = 'costo en plastico de ind MA';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 2;
        $constante->minimo = 1;
        $constante->maximo = 3;
        $constante->codigo = 'costoMunicion';
        $constante->descripcion = 'costo en ceramica de ind municion';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .75;
        $constante->minimo = .5;
        $constante->maximo = 1;
        $constante->codigo = 'perdidaCancelar';
        $constante->descripcion = 'lo que te queda por cancelar construccion o naves';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .7;
        $constante->minimo = .3;
        $constante->maximo = 1;
        $constante->codigo = 'perdidaReciclar';
        $constante->descripcion = 'lo que te queda por reciclar construccion o naves';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .5;
        $constante->maximo = 2;
        $constante->codigo = 'monedaPorNivel';
        $constante->descripcion = 'multiplicador de moneda por nivel de edificio';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 100;
        $constante->minimo = 50;
        $constante->maximo = 200;
        $constante->codigo = 'velocidadHangar';
        $constante->descripcion = 'velocidad de fabricación de naves por nivel de edificio en tanto por ciento';
        $constante->tipo = 'construccion';
        array_push($producciones, $constante);


        ////////  investigaciones  ////////////////////////////////////////////////////////////////

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 2;
        $constante->maximo = 12;
        $constante->codigo = 'velInvest';
        $constante->descripcion = 'velocidad de investigaciones';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .5;
        $constante->maximo = 1.5;
        $constante->codigo = 'investCorrector';
        $constante->descripcion = 'multiplicador del coste de investigacion';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.35;
        $constante->minimo = 1.2;
        $constante->maximo = 1.5;
        $constante->codigo = 'Ifactor';
        $constante->descripcion = 'lo que aumenta el costo de un nivel al siguiente';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.03;
        $constante->minimo = 1;
        $constante->maximo = 1.1;
        $constante->codigo = 'costoInvestArmas';
        $constante->descripcion = 'costo investigaciones armas es EXPONENCIAL aprox 1.1 aumenta el 100%';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.05;
        $constante->minimo = 1;
        $constante->maximo = 1.1;
        $constante->codigo = 'costoInvestMotores';
        $constante->descripcion = 'costo investigaciones motores es EXPONENCIAL aprox 1.1 aumenta el 100%';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.03;
        $constante->minimo = 1;
        $constante->maximo = 1.1;
        $constante->codigo = 'costoInvestIndustrias';
        $constante->descripcion = 'costo investigaciones industrias es EXPONENCIAL aprox 1.1 aumenta el 100%';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.1;
        $constante->minimo = 1.03;
        $constante->maximo = 1.2;
        $constante->codigo = 'costoInvestImperio';
        $constante->descripcion = 'costo investigaciones imperio es EXPONENCIAL aprox 1.1 aumenta el 100%';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1.03;
        $constante->minimo = 1;
        $constante->maximo = 1.1;
        $constante->codigo = 'costoInvestDisenio';
        $constante->descripcion = 'costo investigaciones disenio es EXPONENCIAL aprox 1.1 aumenta el 100%';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 10;
        $constante->maximo = 20;
        $constante->codigo = 'adminImperioPuntos';
        $constante->descripcion = 'puntos de imperio por nivel';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvEnergia';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion Energia';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPlasma';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion Plasma';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvBalistica';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion Balistica';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvMa';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion MA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropQuimico';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor quimico';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropNuk';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor nuclear';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropIon';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor Iones';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropPlasma';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor Plasma';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropMa';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor MA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvPropHma';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor HMA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraQuimico';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor quimico';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraNuk';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor nuclear';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraIon';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor Iones';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraPlasma';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor Plasma';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraMa';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor MA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvManiobraHma';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion motor HMA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvTitanio';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion blindajes';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvReactivo';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion blindajes';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvResinas';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion blindajes';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvPlacas';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion blindajes';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvCarbonadio';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion blindajes';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvCarga';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion carga y transporte';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvHangar';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion hangares de naves';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvRecoleccion';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel la recoleccion';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .03;
        $constante->minimo = .02;
        $constante->maximo = .04;
        $constante->codigo = 'mejorainvIa';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion IA';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .05;
        $constante->minimo = .01;
        $constante->maximo = .2;
        $constante->codigo = 'mejorainvIndustrias';
        $constante->descripcion = 'porcentaje que aumenta en disenio cada nivel investigacion mejoras industrias';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .5;
        $constante->maximo = 2;
        $constante->codigo = 'amplitudObservacion';
        $constante->descripcion = 'factor por lo que se multiplica la observacion para dar un radio de vision de flotas en curso, sobre el nivel de investigacion';
        $constante->tipo = 'investigacion';
        array_push($producciones, $constante);


        /////// FUSELAJES  ///////////////////////////////////////////////////

        //tiempo
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempoTodas';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempoligera';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempocaza';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempomedia';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempopesada';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveConstruccionTiempoestacion';
        $constante->descripcion = 'variación de la velocidad de construccion fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        //recursos
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursosTodas';
        $constante->descripcion = 'variación de los costes de  fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursoscaza';
        $constante->descripcion = 'variación de los costes de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursosligera';
        $constante->descripcion = 'variación de los costes de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursosmedia';
        $constante->descripcion = 'variación de los costes de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursospesada';
        $constante->descripcion = 'variación de los costes de  fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .3;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveRecursosestacion';
        $constante->descripcion = 'variación de los costes de  fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        //defensa
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensaTodas';
        $constante->descripcion = 'variación de los defensa de  fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensacaza';
        $constante->descripcion = 'variación de los defensa de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensaligera';
        $constante->descripcion = 'variación de los defensa de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensamedia';
        $constante->descripcion = 'variación de los defensa de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensapesada';
        $constante->descripcion = 'variación de los defensa de  fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 3;
        $constante->codigo = 'fuselajenaveDefensaestacion';
        $constante->descripcion = 'variación de los defensa de  fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        //energía
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergiaTodas';
        $constante->descripcion = 'variación de los Energia de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergiacaza';
        $constante->descripcion = 'variación de los Energia de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergialigera';
        $constante->descripcion = 'variación de los Energia de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergiamedia';
        $constante->descripcion = 'variación de los Energia de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergiapesada';
        $constante->descripcion = 'variación de los Energia de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveEnergiaestacion';
        $constante->descripcion = 'variación de los Energia de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        //combustible
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustibleTodas';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustiblecaza';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustibleligera';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustiblemedia';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustiblepesada';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveCombustibleestacion';
        $constante->descripcion = 'variación de los Combustible de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        //mantenimiento
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientoTodas';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientocaza';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientoligera';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientomedia';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientopesada';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveMantenimientoestacion';
        $constante->descripcion = 'variación de los Mantenimiento de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        /// velocidad
        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadTodas';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadcaza';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadligera';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadmedia';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadpesada';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveVelocidadestacion';
        $constante->descripcion = 'variación de los Velocidad de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempoTodas';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempocaza';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempoligera';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempomedia';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempopesada';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 5;
        $constante->codigo = 'fuselajenaveTiempoestacion';
        $constante->descripcion = 'variación de los Tiempo de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        /// velocidades maximas

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximaTodas';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximacaza';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximaligera';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximamedia';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximapesada';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveVelocidadMaximaestacion';
        $constante->descripcion = 'Velocidad Máxima de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);


        /// maniobrabilidades maximas

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximaTodas';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves ';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximacaza';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves caza';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximaligera';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves ligera';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximamedia';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves media';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximapesada';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves pesada';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 500;
        $constante->minimo = 200;
        $constante->maximo = 800;
        $constante->codigo = 'fuselajenaveManiobrabilidadMaximaestacion';
        $constante->descripcion = 'Maniobrabilidad Máxima de fuselaje naves estacion';
        $constante->tipo = 'fuselajes';
        array_push($producciones, $constante);

        ////// UNIVERSO ///

        $constante = new Constantes();
        $constante->valor = -10;
        $constante->minimo = -20;
        $constante->maximo = 0;
        $constante->codigo = 'piminimoscolonizar';
        $constante->descripcion = 'puntos de imperio mínimos para colonizar';
        $constante->tipo = 'universo';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 15;
        $constante->codigo = 'piporplaneta';
        $constante->descripcion = 'puntos de imperio por planeta colonizado';
        $constante->tipo = 'universo';
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 20;
        $constante->codigo = 'luzdemallauniverso';
        $constante->descripcion = 'distancia entre dos sistemas adyacentes';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 40;
        $constante->minimo = 30;
        $constante->maximo = 50;
        $constante->codigo = 'yacimientosIniciales';
        $constante->descripcion = 'Yacimientos del planeta de inicio';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 10;
        $constante->minimo = 5;
        $constante->maximo = 15;
        $constante->codigo = 'yacimientosInicialesAsteriode';
        $constante->descripcion = 'Yacimientos del asteroide de inicio';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 30;
        $constante->minimo = 25;
        $constante->maximo = 35;
        $constante->codigo = 'yacimientosMaximos';
        $constante->descripcion = 'Yacimientos maximos de un planeta';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 99;
        $constante->minimo = 90;
        $constante->maximo = 99;
        $constante->codigo = 'yacimientosMinimos';
        $constante->descripcion = 'Yacimientos minimos de un planeta';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = .5;
        $constante->minimo = .1;
        $constante->maximo = 2;
        $constante->codigo = 'fuelpordistancia';
        $constante->descripcion = 'factor de gasto de fuel por unidad de distancia';
        $constante->tipo = 'universo';
        $constante->votable = 1;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 0.4;
        $constante->minimo = 0;
        $constante->maximo = .7;
        $constante->codigo = 'fuelfactorreduccionpordistancia';
        $constante->descripcion = 'cuanto se rebaja el gasto de fuel al reducir la velocidad del vuelo';
        $constante->tipo = 'universo';
        $constante->votable = 1;
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 36000;
        $constante->minimo = 20000;
        $constante->maximo = 60000;
        $constante->codigo = 'factortiempoviaje';
        $constante->descripcion = 'factor de tiempo en recorer una distancia';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .5;
        $constante->maximo = 2;
        $constante->codigo = 'distanciaentresistemas';
        $constante->descripcion = 'factor de espacio entre dos sistemas adyacentes';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .5;
        $constante->maximo = 2;
        $constante->codigo = 'distanciaentreplanetas';
        $constante->descripcion = 'factor de espacio entre dos planetas adyacentes';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = .2;
        $constante->maximo = 1.5;
        $constante->codigo = 'distanciaorbita';
        $constante->descripcion = 'factor distancia de la orbita';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 0;
        $constante->minimo = 0;
        $constante->maximo = 10;
        $constante->codigo = 'yacimientosasteroidesminimo';
        $constante->descripcion = 'valor inicial minimo de los asteroides vacios';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 25;
        $constante->minimo = 10;
        $constante->maximo = 40;
        $constante->codigo = 'yacimientosasteroidesmaximo';
        $constante->descripcion = 'valor inicial maximo de los asteroides vacios';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 50;
        $constante->minimo = 20;
        $constante->maximo = 80;
        $constante->codigo = 'cantidadporplanetagusanos';
        $constante->descripcion = 'cantidad 1/x inicial de puertas de agujero de gusano';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 4;
        $constante->minimo = 3;
        $constante->maximo = 5;
        $constante->codigo = 'cantidadgruposgusanos';
        $constante->descripcion = 'cantidad de grupos de aguajeros de gusano';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 200000;
        $constante->minimo = 30000;
        $constante->maximo = 200000;
        $constante->codigo = 'cantidadrecursosinicio';
        $constante->descripcion = 'cantidad recurso mineral de planeta de inicio';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = 0.01;
        $constante->maximo = 2;
        $constante->codigo = 'factorexpansionradar';
        $constante->descripcion = 'factor para multiplicar el area del radar';
        $constante->tipo = 'universo';
        $constante->votable = 1;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 14;
        $constante->minimo = 10;
        $constante->maximo = 20;
        $constante->codigo = 'factorexpansionzonainfluencia';
        $constante->descripcion = 'factor para multiplicar el area de zona influencia';
        $constante->tipo = 'universo';
        $constante->votable = 1;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 3;
        $constante->minimo = 2;
        $constante->maximo = 5;
        $constante->codigo = 'cantidadDestinosFlotas';
        $constante->descripcion = 'cantidad de destinos para flotas';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 60*10;
        $constante->minimo = 60*5;
        $constante->maximo = 60*15;
        $constante->codigo = 'tiempoPuntosFlotas';
        $constante->descripcion = 'cada cuanto tiempo del viaje hay un punto de flota';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        //GENERACION UNIVERSO

        $constante = new Constantes();
        $constante->valor = 1800;
        $constante->minimo = 1000;
        $constante->maximo = 10000;
        $constante->codigo = 'cantidadestrellas';
        $constante->descripcion = 'Cantidad total de estrellas en el universo';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 699;
        $constante->minimo = 60;
        $constante->maximo = 80;
        $constante->codigo = 'cantidadplanetas';
        $constante->descripcion = 'cantidad planetas de inicio';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 200;
        $constante->minimo = 20;
        $constante->maximo = 80;
        $constante->codigo = 'cantidadporplanetaasteroides';
        $constante->descripcion = 'cantidad 1/x de asteroides por planeta';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 100;
        $constante->minimo = 20;
        $constante->maximo = 80;
        $constante->codigo = 'cantidadporplanetasoles';
        $constante->descripcion = 'cantidad 1/x de asteroides por planeta';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 1;
        $constante->minimo = 1;
        $constante->maximo = 5;
        $constante->codigo = 'cantidadplanetasenclave';
        $constante->descripcion = 'cantidad planetas de inicio';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 5;
        $constante->minimo = 0;
        $constante->maximo = 10;
        $constante->codigo = 'cantidadporplanetaruinas';
        $constante->descripcion = 'cantidad 1/x de ruinas por planeta';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 3;
        $constante->minimo = 1;
        $constante->maximo = 4;
        $constante->codigo = 'cantidadobjetossistema';
        $constante->descripcion = 'cantidad de objetos por estrella';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 100;
        $constante->minimo = 100;
        $constante->maximo = 600;
        $constante->codigo = 'anchouniverso';
        $constante->descripcion = 'ancho del universo';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 9999;
        $constante->minimo = 1000;
        $constante->maximo = 100000;
        $constante->codigo = 'estrellamaxima';
        $constante->descripcion = 'ultima estrella universo';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 0;
        $constante->minimo = 0;
        $constante->maximo = 1;
        $constante->codigo = 'jugadoralianza';
        $constante->descripcion = 'Se genera jugador de la alianza';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);


        $constante = new Constantes();
        $constante->valor = 200;
        $constante->minimo = 100;
        $constante->maximo = 400;
        $constante->codigo = 'tamagruponaves';
        $constante->descripcion = 'tamaño del grupo de naves, determina proporcion espacial de combate';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 20;
        $constante->minimo = 10;
        $constante->maximo = 40;
        $constante->codigo = 'anchodespliegue';
        $constante->descripcion = 'ancho de la zona de despliegue de grupos en combate medido en radios de grupo';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);

        $constante = new Constantes();
        $constante->valor = 6;
        $constante->minimo = 2;
        $constante->maximo = 20;
        $constante->codigo = 'altodespliegue';
        $constante->descripcion = 'alto de la zona de despliegue de grupos en combate medido en radios de grupo';
        $constante->tipo = 'universo';
        $constante->votable = 0;
        array_push($producciones, $constante);


        foreach ($producciones as $estaproduccion) {
            $estaproduccion->save();
        }
    }
}
