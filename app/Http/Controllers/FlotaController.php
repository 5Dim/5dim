<?php

namespace App\Http\Controllers;

use App\Models\Alianzas;
use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Destinos;
use App\Models\Disenios;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\Prioridades;
use App\Models\Flotas;
use App\Models\ViewDaniosDisenios;
use App\Models\EnVuelo;
use App\Models\PrioridadesEnFlota;
use App\Models\DiseniosEnFlota;
use App\Models\PuntosEnFlota;
use App\Models\RecursosEnFlota;
use App\Models\Astrometria;
use App\Models\EnOrbita;
use App\Models\EnRecoleccion;
use App\Models\MensajesIntervinientes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\each;

class FlotaController extends Controller
{
    public function index($tab = 'envuelo-tab')
    {

        extract($this->flotaBase());

        return view('juego.flotas.flotas', compact(
            // Recursos
            'recursos',
            'recursosFlota',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'cantidadDestinos',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'constantes',
            'ViewDaniosDisenios',
            'destinos',
            'cargaDest',
            'prioridades',
            'flota',
            'flotasEnOrbitaPropias',
            'flotasEnRecoleccionPropias',
            'flotasEnOrbitaAlianza',
            'flotasEnRecoleccionAlianza',
            'destinosVacia',
            'cargaDestVacia',
            'prioridadesVacia',
            'tab',
        ));
    }

    public function astrometria($estrella = "", $orbita = "", $tab = 'enviar-tab')
    {
        extract($this->flotaBase($estrella, $orbita));

        return view('juego.flotas.flotas', compact(
            // Recursos
            'recursos',
            'recursosFlota',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'cantidadDestinos',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'constantes',
            'ViewDaniosDisenios',
            'destinos',
            'cargaDest',
            'prioridades',
            'flota',
            'flotasEnOrbitaPropias',
            'flotasEnRecoleccionPropias',
            'flotasEnOrbitaAlianza',
            'flotasEnRecoleccionAlianza',
            'destinosVacia',
            'cargaDestVacia',
            'prioridadesVacia',
            'tab',
        ));
    }

    public function editarFlota($nombreflota = "", $tipoflota = "envuelo", $tab = 'enviar-tab')
    {
        extract($this->flotaBase("", "", $nombreflota, $tipoflota));

        return view('juego.flotas.flotas', compact(
            // Recursos
            'recursos',
            'recursosFlota',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'cantidadDestinos',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'constantes',
            'ViewDaniosDisenios',
            'destinos',
            'cargaDest',
            'prioridades',
            'flota',
            'flotasEnOrbitaPropias',
            'flotasEnRecoleccionPropias',
            'flotasEnOrbitaAlianza',
            'flotasEnRecoleccionAlianza',
            'destinosVacia',
            'cargaDestVacia',
            'prioridadesVacia',
            'tab',
        ));
    }






    public function traerRecursos($estrella, $orbita)
    {
        Recursos::calcularRecursos(session()->get('planetas_id'));

        $tipoNombre = "planeta";
        if (strlen($estrella) > 6 || !is_numeric($estrella)) { //es flota
            $tipoNombre = "flota";
            $flotaDestino = EnRecoleccion::where("publico", $estrella)->orWhere("nombre", $estrella)->first();
            if ($flotaDestino == null) {
                $flotaDestino = EnOrbita::where("publico", $estrella)->orWhere("nombre", $estrella)->first();
            }
        }

        //Log::info("tipoNombre ".$tipoNombre);
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        if ($jugadorActual->alianzas != null) { //estoy en alianza
            $idJugadores = Alianzas::idMiembros($jugadorActual->alianzas->id);
            if ($tipoNombre == "flota") {  // es flota
                $flotaDestino = EnRecoleccion::where("publico", $estrella)->orWhere("nombre", $estrella)->whereIn('jugadores_id', $idJugadores)->first();
                if (empty($flotaDestino)) {
                    $flotaDestino = EnOrbita::where("publico", $estrella)->orWhere("nombre", $estrella)->whereIn('jugadores_id', $idJugadores)->first();
                }

                if (!empty($flotaDestino)) {
                    $recursos = $flotaDestino->recursosEnFlota;
                    $recursos["imagen"] = asset("/img/juego/skin0/flotas/Transferir.jpg");
                }
            } else {
                $planet = Planetas::where([['estrella', $estrella], ['orbita', $orbita]])->whereIn('jugadores_id', $idJugadores)->first();
                if (!empty($planet)) {
                    $recursos = $planet->recursos;
                    $recursos["imagen"] = asset('astrometria/img/sistema/planeta') . $planet->imagen . ".png";
                }
            }
        } else {  //estoy solo
            if ($tipoNombre == "flota") {  // es flota
                $flotaDestino = EnRecoleccion::where("publico", $estrella)->orWhere("nombre", $estrella)->first();
                if (empty($flotaDestino)) {
                    $flotaDestino = EnOrbita::where("publico", $estrella)->orWhere("nombre", $estrella)->first();
                }

                if (!empty($flotaDestino) && $flotaDestino->jugadores_id == $jugadorActual->id) {
                    $recursos = $flotaDestino->recursosEnFlota;
                    $recursos["imagen"] = asset("/img/juego/skin0/flotas/Transferir.jpg");
                }
            } else {
                //Log::info("message ".$estrella." ".$orbita." ".$jugadorActual->id);
                $planet = Planetas::where([['estrella', $estrella], ['orbita', $orbita]], ['jugadores_id', $jugadorActual->id])->first();
                if (!empty($planet)) {
                    $recursos = $planet->recursos;
                    $recursos["imagen"] = asset('astrometria/img/sistema/planeta') . $planet->imagen . ".png";
                }
            }
        }
        if ($tipoNombre == "planeta") {
            $recursos["estrella"] = $estrella;
            $recursos["orbita"] = $orbita;
        } else {
            $recursos["estrella"] = !empty($flotaDestino->planetas) ? $flotaDestino->planetas->estrella : $flotaDestino->estrella;
            $recursos["orbita"] = !empty($flotaDestino->planetas) ? $flotaDestino->planetas->orbita : $flotaDestino->orbita;
        }


        return compact('recursos');
    }

    public static function existeSistema($estrella)
    {
        return Flotas::existeSistema($estrella);
    }

    /*
    Fallos:
    debe haber un gasto minimo de fuel de 1 (no puede ser 0 nunca)
    puedes poner mision y no destino y enviar
    Cuando te llevas todas las naves deja a 0 cantidad en planeta
    prioridades destino 1 si vas a recolectar
    */

    public function enviarFlota(Request $request, $id = false) //$id es de la flota en orbita de la que salimos
    {

        $turboAtaque = 0; //trampas gordas, tiempo de llegar al destino

        $navesEstacionadas = $request->input('navesEstacionadas');
        $cargaDest = $request->input('cargaDest');
        $prioridades = $request->input('prioridades');
        $flota = $request->input('flota');
        $destinos = $request->input('destinos');

        // Log::info("navesEstacionadas");Log::info($navesEstacionadas);
        //Log::info("cargaDest");Log::info($cargaDest);
        // Log::info("prioridades");Log::info($prioridades);
        // Log::info("flota");Log::info($flota);
        // Log::info("destinos");Log::info($destinos);

        $destinoSalida = new destinos();

        $errores = "";

        //// valores de las naves en planeta
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        //Log::info(isset($flota['id'])." ".$flota['id']);
        $flotaid = null;
        if (isset($flota['id']) && $flota['id'] != null) { //salimos de uns flota
            $tipoflota = $flota['tipoflota'];
            $flotaid = $flota['id'];

            $jugadoryAlianza = [];
            $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

            if ($jugadorActual['alianzas_id'] != null) {
                array_push($jugadoryAlianza, Alianzas::jugadorAlianza($jugadorActual->alianzas_id)->id);
            }
            array_push($jugadoryAlianza, $jugadorActual->id);

            //Log::info(" datos v ".$flotaid." ".$tipoflota);

            if ($tipoflota == "envuelo") {
                $errores = "Una flota en vuelo no puede separarse";
            } else if ($tipoflota == "enrecoleccion") {
                $flotaOrigen = EnRecoleccion::whereIn('jugadores_id', $jugadoryAlianza)
                    ->where([['id', $flotaid]])
                    ->first();
                $destinoSalida->en_recoleccion_id = $flotaid;
            } else if ($tipoflota == "enorbita") {
                $flotaOrigen = EnOrbita::whereIn('jugadores_id', $jugadoryAlianza)
                    ->where([['id', $flotaid]])
                    ->first();
                $destinoSalida->en_orbita_id = $flotaid;
            }

            if ($flota == null && empty($flota)) {
                $errores = "No se encuentra la flota a modificar";
            }
            $navesEnPlaneta = $flotaOrigen->diseniosEnFlota;

            $recursos = $flotaOrigen->recursosEnFlota;
            $jugadorEnviador = $flotaOrigen->jugadores;
        } else {
            $navesEnPlaneta = $planetaActual->estacionadas;
            $destinoSalida->planetas_id = $planetaActual->id;
            $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
            $jugadorEnviador = $planetaActual->jugadores;
        }
        //Log::info("flotaOrigen ".$flotaOrigen);
        //Log::info("navesEnPlaneta ".$navesEnPlaneta);

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $diseniosJugador = $jugadorActual->disenios;
        $diseniosJugador = [];
        foreach ($navesEstacionadas as $nave) {
            $nave = DiseniosEnFlota::find($nave["id"]);
            $nave->disenios->mejoras;
            $nave->disenios->tamanio = $nave->disenios->fuselajes->tamanio;
            array_push($diseniosJugador, $nave->disenios);
        }

        $result = Flotas::ValoresDiseniosFlota($navesEstacionadas, $diseniosJugador, $navesEnPlaneta, $flotaid);
        $errores = $result[0];
        $disenios = $result[1];

        //Log::info($disenios);
        //Log::info("errores: ".$errores);
        if (strlen($errores) < 1) {

            $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
            //$tamaniosNaveAcarga = array( 'caza'=> "cargaPequenia", 'ligera'=> "cargaMediana", 'media'=> "cargaGrande", 'pesada'=> "cargaEnorme", 'estacion'=> "cargaMega" );
            $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");

            $fueraH = [];
            $dentroH = [];
            $capacidadH = [];
            $tablaHangares = [];
            $tablaHangares['fueraH'] = $fueraH;
            $tablaHangares['dentroH'] = $dentroH;
            $tablaHangares['capacidadH'] = $capacidadH;

            foreach ($tamaniosArray as $tamanio) {
                $tablaHangares['capacidadH'][$tamanio] = 0;
                $tablaHangares['fueraH'][$tamanio] = 0;
                $tablaHangares['dentroH'][$tamanio] = 0;
            };


            $valFlotaT = [];
            //reinicio valores
            $valFlotaT['carga'] = 0;
            $valFlotaT['municion'] = 0;
            $valFlotaT['fuel'] = 0;
            $valFlotaT['velocidad'] = 999;
            $valFlotaT['maniobra'] = 999;
            $valFlotaT['ataqueR'] = 0;
            $valFlotaT['defensaR'] = 0;
            $valFlotaT['ataqueV'] = 0;
            $valFlotaT['defensaV'] = 0;
            $valFlotaT['extraccion'] = 0;
            $valFlotaT['recoleccion'] = 0;
            $valFlotaT['fuelDestT'] = 0;
            $valFlotaT['atotal'] = 0;
            $valFlotaT['mantenimiento'] = 0;

            $disenios = Disenios::calculaMejoras($disenios);
            //Log::info(" a flota llega ".$disenios[1]->datos->cargaPequenia);
            //formatear misiones

            //añado tamaños
            foreach ($disenios as $disenio) {
                $disenio->tamanio = $disenio->fuselajes->tamanio;
            }

            $result = Flotas::calculoFlota($disenios, $valFlotaT, $destinos, $tablaHangares);
            $valFlotaT = $result[0];
            $destinos = $result[1];
            $tablaHangares = $result[2];

            //Log::info($valFlotaT);
            //Log::info($cargaDest);

            $constantesU = Constantes::where('tipo', 'universo')->get();
            $cantidadDestinos = $constantesU->where('codigo', 'cantidadDestinosFlotas')->first()->valor;
            $tiempoPuntosFlotas = $constantesU->where('codigo', 'tiempoPuntosFlotas')->first()->valor;

            $valoresValidos = Flotas::valoresValidos($cantidadDestinos, $cargaDest, $prioridades);
            $cargaDest = $valoresValidos[0];
            $prioridades = $valoresValidos[1];


            $resultValidar = Flotas::validacionesFlota($destinos, $valFlotaT, $errores, $tablaHangares, $recursos, $cargaDest, $cantidadDestinos, $flotaid);

            //Log::info($resultValidar);

            if (!empty($resultValidar)) {
                $errores = $resultValidar;
            }
        }

        //se envia la flota  ////////////////////
        if (strlen($errores) < 3) {

            $ajusteMapaBase = 35; //ajuste 0,0 con mapa
            $ajusteMapaFactor = 7; //ajuste escala mapa

            try {

                //construyendo flota

                //$jugadorEnviador = Jugadores::find(session()->get('jugadores_id'));

                $nombreJugon = substr($jugadorEnviador['nombre'], 4);
                $timestamp = (int) round(now()->format('Uu') / pow(10, 6 - 3));
                $publico = substr($nombreJugon, 0, 3) . substr($timestamp, 5);
                if (strlen($flota['nombre']) < 1) {
                    $flota['nombre'] = $publico;
                }
                DB::beginTransaction();
                //Log::info("Jugador ID= ".$jugadorEnviador->id);
                $flotax = new EnVuelo;
                $flotax->nombre = $flota['nombre'];;
                $flotax->publico = $publico;
                $flotax->ataqueReal = $valFlotaT['ataqueR'];
                $flotax->defensaReal = $valFlotaT['defensaR'];
                $flotax->ataqueVisible = $valFlotaT['ataqueV'];
                $flotax->defensaVisible = $valFlotaT['defensaV'];
                $flotax->creditos = $valFlotaT['mantenimiento'];
                $flotax->jugadores_id = $jugadorEnviador->id;
                //Log::info($flotax);
                $flotax->save();

                //Log::info($flota);

                /// destino 0 de salida
                $dest = 0;
                $destino = $destinoSalida;

                $destino->porcentVel = 100;
                $destino->mision = 'Salida';
                $destino->visitado = true;
                if ($flotaid != null) {
                    $destino->initflota = $flota["publico"];
                }

                //$result = Flotas::destinoTipoId($destino, $destinos[0]);
                //$destino = $result[0];

                $destino->initestrella = 1 * $destinos[0]['estrella'];
                $destino->initorbita = 1 * $destinos[0]['orbita'];
                $destino->estrella = 1 * $destinos[0]['estrella'];
                $destino->orbita = 1 * $destinos[0]['orbita'];

                $destino->initcoordx = 0;
                $destino->initcoordy = 0;
                $destino->fincoordx = 0;
                $destino->fincoordy = 0;

                $destino->init = date("Y-m-d H:i:s");
                $destino->fin = date("Y-m-d H:i:s");
                $destino->flota_id = $flotax->id;
                $destino->save();

                $recursosDestino = new RecursosEnFlota();
                $recursosDestino->personal = $cargaDest[$dest]['personal'];
                $recursosDestino->mineral = $cargaDest[$dest]['mineral'];
                $recursosDestino->cristal = $cargaDest[$dest]['cristal'];
                $recursosDestino->gas = $cargaDest[$dest]['gas'];
                $recursosDestino->plastico = $cargaDest[$dest]['plastico'];
                $recursosDestino->ceramica = $cargaDest[$dest]['ceramica'];
                $recursosDestino->liquido = $cargaDest[$dest]['liquido'];
                $recursosDestino->micros = $cargaDest[$dest]['micros'];
                $recursosDestino->fuel = $cargaDest[$dest]['fuel'];
                $recursosDestino->ma = $cargaDest[$dest]['ma'];
                $recursosDestino->municion = $cargaDest[$dest]['municion'];
                $recursosDestino->creditos = $cargaDest[$dest]['creditos'];
                $recursosDestino->destinos_id = $destino->id;
                $recursosDestino->save();

                $prioridadex = new PrioridadesEnFlota();
                $prioridadex->personal = 0;
                $prioridadex->mineral = 0;
                $prioridadex->cristal = 0;
                $prioridadex->gas = 0;
                $prioridadex->plastico = 0;
                $prioridadex->ceramica = 0;
                $prioridadex->liquido = 0;
                $prioridadex->micros = 0;
                $prioridadex->fuel = 0;
                $prioridadex->ma = 0;
                $prioridadex->municion = 0;
                $prioridadex->creditos = 0;
                $prioridadex->destinos_id = $destino->id;
                $prioridadex->save();

                //Log::info(" destino 0 creado ");

                //construyendo destinos
                $Tinit = date("Y-m-d H:i:s");
                for ($dest = 1; $dest < count($destinos); $dest++) {

                    //Log::info($Tinit);
                    $destAnt = $dest - 1;
                    $duracion = 1 * $destinos[$dest]['tiempoDest'];
                    if ($turboAtaque > 0) {
                        $duracion = $turboAtaque;
                    }
                    $add_time = strtotime($Tinit) + $duracion;
                    $Tfin = date('Y-m-d H:i:s', $add_time);

                    //Log::info($Tfin);

                    //Log::info($destinos[$destAnt]);
                    //Log::info($destinos[$dest]);

                    if ($destinos[$dest]['viable'] == true) {
                        $destino = new destinos();
                        $destino->porcentVel = $destinos[$dest]['porcentVel'];
                        $destino->mision = ucfirst($destinos[$dest]['mision']);

                        if ($id == false &&  $dest == 1) {
                            $destino->mision_regreso = ucfirst("Transferir");
                        } else {
                            $destino->mision_regreso = ucfirst("Orbitar");
                        }

                        $result = Flotas::destinoTipoId($destino, $destinos[$dest]);
                        $destino = $result[0];
                        $errores = $result[1];
                        //Log::info("destino");
                        //Log::info($destinos[$dest]);
                        //Log::info($destino);
                        //Log::info($destinos[$destAnt]);
                        if (isset($destinos[$destAnt]["initflota"])) {
                            $destino->initflota = $destinos[$destAnt]["initflota"];
                        }

                        $destinos[$dest]['estrella'] = $destino->estrella;
                        $destinos[$dest]['orbita'] = $destino->orbita;

                        if (strlen($errores) > 3) {
                            throw new \Exception($errores);
                        }
                        //Log::info("destinoANT ".$destinos[$destAnt]['estrella']);

                        $destino->initestrella = 1 * $destinos[$destAnt]['estrella'];
                        $destino->initorbita = 1 * $destinos[$destAnt]['orbita'];

                        $destino->initcoordx = $ajusteMapaFactor * $destinos[$destAnt]['fincoordx'] + $ajusteMapaBase;
                        $destino->initcoordy = $ajusteMapaFactor * $destinos[$destAnt]['fincoordy'] + $ajusteMapaBase;
                        $destino->fincoordx = $ajusteMapaFactor * $destinos[$dest]['fincoordx'] + $ajusteMapaBase;
                        $destino->fincoordy = $ajusteMapaFactor * $destinos[$dest]['fincoordy'] + $ajusteMapaBase;
                        $destino->init = $Tinit;
                        $destino->fin = $Tfin;
                        $destino->flota_id = $flotax->id;
                        $destino->save(); //Log::info("coso".$dest." ".$flotax->id);

                        //Log::info("destino ".$dest." ".$destino);

                        $vectorx = (1 * $destinos[$dest]['fincoordx'] - 1 * $destinos[$destAnt]['fincoordx']) / $duracion;
                        $vectory = (1 * $destinos[$dest]['fincoordy'] - 1 * $destinos[$destAnt]['fincoordy']) / $duracion;

                        for ($tiempoPto = 0; $tiempoPto < $duracion / $tiempoPuntosFlotas; $tiempoPto++) {
                            $add_time = strtotime($Tinit) + ($tiempoPto * $tiempoPuntosFlotas);
                            $TfinPto = date('Y-m-d H:i:s', $add_time);

                            $puntoFlota = new PuntosEnFlota();
                            $puntoFlota->coordx = $ajusteMapaFactor * ($destinos[$destAnt]['fincoordx'] + $vectorx * ($tiempoPto * $tiempoPuntosFlotas)) + $ajusteMapaBase;
                            $puntoFlota->coordy = $ajusteMapaFactor * ($destinos[$destAnt]['fincoordy'] + $vectory * ($tiempoPto * $tiempoPuntosFlotas)) + $ajusteMapaBase;
                            $puntoFlota->fin = $TfinPto;
                            $puntoFlota->en_vuelo_id = $flotax->id;
                            $puntoFlota->jugadores_id = $flotax->jugadores_id;
                            //Log::info("puntoflota".$puntoFlota);
                            $puntoFlota->save();
                        }
                        //ultimo punto siempre va
                        $puntoFlota = new PuntosEnFlota();
                        $puntoFlota->coordx = $ajusteMapaFactor * ($destinos[$dest]['fincoordx']) + $ajusteMapaBase;
                        $puntoFlota->coordy = $ajusteMapaFactor * ($destinos[$dest]['fincoordy']) + $ajusteMapaBase;
                        $puntoFlota->fin = $Tfin;
                        $puntoFlota->en_vuelo_id = $flotax->id;
                        $puntoFlota->jugadores_id = $flotax->jugadores_id;
                        $puntoFlota->save();

                        //Log::info($destino);
                        $Tinit = $Tfin;

                        //Log::info($cargaDest[$dest]);

                        $recursosDestino = new RecursosEnFlota();
                        $recursosDestino->personal = $cargaDest[$dest]['personal'];
                        $recursosDestino->mineral = $cargaDest[$dest]['mineral'];
                        $recursosDestino->cristal = $cargaDest[$dest]['cristal'];
                        $recursosDestino->gas = $cargaDest[$dest]['gas'];
                        $recursosDestino->plastico = $cargaDest[$dest]['plastico'];
                        $recursosDestino->ceramica = $cargaDest[$dest]['ceramica'];
                        $recursosDestino->liquido = $cargaDest[$dest]['liquido'];
                        $recursosDestino->micros = $cargaDest[$dest]['micros'];
                        $recursosDestino->fuel = $cargaDest[$dest]['fuel'];
                        $recursosDestino->ma = $cargaDest[$dest]['ma'];
                        $recursosDestino->municion = $cargaDest[$dest]['municion'];
                        $recursosDestino->creditos = $cargaDest[$dest]['creditos'];
                        $recursosDestino->destinos_id = $destino->id;
                        $recursosDestino->save();

                        $prioridadex = new PrioridadesEnFlota();
                        $prioridadex->personal = $prioridades[$dest]['personal'];
                        $prioridadex->mineral = $prioridades[$dest]['mineral'];
                        $prioridadex->cristal = $prioridades[$dest]['cristal'];
                        $prioridadex->gas = $prioridades[$dest]['gas'];
                        $prioridadex->plastico = $prioridades[$dest]['plastico'];
                        $prioridadex->ceramica = $prioridades[$dest]['ceramica'];
                        $prioridadex->liquido = $prioridades[$dest]['liquido'];
                        $prioridadex->micros = $prioridades[$dest]['micros'];
                        $prioridadex->fuel = $prioridades[$dest]['fuel'];
                        $prioridadex->ma = $prioridades[$dest]['ma'];
                        $prioridadex->municion = $prioridades[$dest]['municion'];
                        $prioridadex->creditos = $prioridades[$dest]['creditos'];
                        $prioridadex->destinos_id = $destino->id;
                        $prioridadex->save();

                        //Log::info("prioridadex " . $prioridadex . " prioridades ");
                        //Log::info($prioridades[$dest]);
                        // Log::info("hecho destino ".$dest );
                    }
                }

                // Log::info("todos los destinos done");

                // naves a flota

                foreach ($disenios as $navex) {

                    //Log::info($navex);

                    $naveSale = new DiseniosEnFlota();
                    $naveSale->enFlota = $navex['enflota'];
                    $naveSale->enHangar = $navex['enhangar'];
                    $naveSale->disenios_id = $navex['id'];
                    $naveSale->en_vuelo_id = $flotax->id;
                    $naveSale->tipo = "nave";
                    $naveSale->save();

                    $naveP = $navesEnPlaneta->firstWhere('disenios_id', $navex['id']);
                    if ($flotaid == null) { //restar del planeta
                        $naveP->cantidad -= $navex['enflota'] + $navex['enhangar'];
                        if ($naveP->cantidad < 1) {
                            $naveP->delete();
                        } else {
                            $naveP->save();
                        }
                    } else { //restar de la flota
                        if ($navex['enflota'] < 0) {
                            $navex['enflota'] = 0;
                        }
                        if ($navex['enhangar'] < 0) {
                            $navex['enhangar'] = 0;
                        }

                        $restarAFlota = $navex['enflota'];
                        $restarAHangar = $navex['enhangar'];
                        //Log::info("messageI ".$restarAFlota." ".$restarAHangar);

                        if ($naveP->enFlota < $navex['enflota']) { //tengo menos en flota de las que me llevo
                            $restarAHangar += -$naveP->enFlota + $navex['enflota'];
                        }

                        if ($naveP->enhangar < $navex['enhangar']) { //tengo menos  en hangar de las que me llevo
                            $restarAFlota += -$naveP->enHangar + $navex['enhangar'];
                        }

                        if ($naveP->enFlota - $restarAFlota < 0) { // la cantidad que queda no puede ser negativa
                            $restarAHangar += -1 * ($naveP->enFlota - $restarAFlota);
                            $restarAFlota = $naveP->enFlota;
                        }
                        if ($naveP->enHangar - $restarAHangar < 0) { // la cantidad que queda no puede ser negativa
                            $restarAFlota = -1 * ($naveP->enHangar - $restarAHangar);
                            $restarAHangar = $naveP->enHangar;
                        }
                        if ($naveP->enFlota - $restarAFlota < 0) { // (segunda vuelta necesaria) la cantidad que queda no puede ser negativa
                            $restarAHangar += -1 * ($naveP->enFlota - $restarAFlota);
                            $restarAFlota = $naveP->enFlota;
                        }

                        $naveP->enFlota -= $restarAFlota;
                        $naveP->enHangar -= $restarAHangar;
                        //Log::info($naveP);
                        //Log::info("messageR ".$restarAFlota." ".$restarAHangar);
                        if ($naveP->enFlota + $naveP->enHangar < 1) {
                            $naveP->delete();
                        } else {
                            $naveP->save();
                        }
                    }
                }

                // restando recursos de origen
                //origen es un planeta:
                $dest = 0;
                //Log::info($cargaDest[$dest]);
                if ($flotaid == null) { //restar del planeta
                    $recursos = Planetas::where('id', session()->get('planetas_id'))->first()->recursos;
                } else {
                    $recursos = $flotaOrigen->recursosEnFlota;
                    if ($recursos->fuel < $valFlotaT['fuelDestT']) { //no puedo gastar mas de lo que tengo (se ha quitado omitido en validaciones por la siguiente condición)
                        $errores = "Fuel insuficiente";
                        throw new \Exception($errores);
                    }
                    if ($recursos->fuel < $cargaDest[$dest]['fuel'] + $valFlotaT['fuelDestT']) { //si me llevo mas fuel del que tengo, resto de lo que me llevo
                        //$resd=-$valFlotaT['fuelDestT'] + $recursos->fuel ;Log::info("fuel me llevo= ".$cargaDest[$dest]['fuel']." fuel llevo: ".$recursos->fuel ." fuel gasto: ".$valFlotaT['fuelDestT']." result= ".$resd);
                        $cargaDest[$dest]['fuel'] = -$valFlotaT['fuelDestT'] + $recursos->fuel;
                    }
                }

                //Log::info($recursos);
                // restando origen
                $recursos->personal -= $cargaDest[$dest]['personal'];
                $recursos->mineral -= $cargaDest[$dest]['mineral'];
                $recursos->cristal -= $cargaDest[$dest]['cristal'];
                $recursos->gas -= $cargaDest[$dest]['gas'];
                $recursos->plastico -= $cargaDest[$dest]['plastico'];
                $recursos->ceramica -= $cargaDest[$dest]['ceramica'];
                $recursos->liquido -= $cargaDest[$dest]['liquido'];
                $recursos->micros -= $cargaDest[$dest]['micros'];
                $recursos->fuel -= $cargaDest[$dest]['fuel'] + $valFlotaT['fuelDestT'];
                $recursos->ma -= $cargaDest[$dest]['ma'];
                $recursos->municion -= $cargaDest[$dest]['municion'];
                $recursos->creditos -= $cargaDest[$dest]['creditos'];
                $recursos->save();

                //a la flota
                $recursosEnFlota = new RecursosEnFlota();
                $recursosEnFlota->personal = $cargaDest[$dest]['personal'];
                $recursosEnFlota->mineral = $cargaDest[$dest]['mineral'];
                $recursosEnFlota->cristal = $cargaDest[$dest]['cristal'];
                $recursosEnFlota->gas = $cargaDest[$dest]['gas'];
                $recursosEnFlota->plastico = $cargaDest[$dest]['plastico'];
                $recursosEnFlota->ceramica = $cargaDest[$dest]['ceramica'];
                $recursosEnFlota->liquido = $cargaDest[$dest]['liquido'];
                $recursosEnFlota->micros = $cargaDest[$dest]['micros'];
                $recursosEnFlota->fuel = $cargaDest[$dest]['fuel'];
                $recursosEnFlota->ma = $cargaDest[$dest]['ma'];
                $recursosEnFlota->municion = $cargaDest[$dest]['municion'];
                $recursosEnFlota->creditos = $cargaDest[$dest]['creditos'];
                $recursosEnFlota->en_vuelo_id = $flotax->id;
                $recursosEnFlota->save();
                //Log::info($recursosEnFlota);

                if ($flotaid != null) { //recalculo flota que quede

                    //verifico si borro la flota
                    $cargaQueda = 0;
                    foreach ($recursosArray as $recurso) {
                        $cargaQueda += $recursos[$recurso];
                        if ($cargaQueda > 0) {
                            break;
                        }
                    }
                    $totalNaves = 0;
                    foreach ($navesEnPlaneta as $nave) {
                        $totalNaves += $nave["enFlota"] + $nave["enHangar"];
                        if ($totalNaves > 0) {
                            break;
                        }
                    }

                    //Log::info("cargaQueda ".$cargaQueda." naves quedan: ");Log::info($navesEnPlaneta);
                    if ($cargaQueda < 1 && $totalNaves < 1) { //borramos la flota enterita
                        $flotaOrigen->delete();
                    } else { //recalculamos el resto
                        $valFlotaT = [];
                        //reinicio valores
                        $valFlotaT['carga'] = 0;
                        $valFlotaT['municion'] = 0;
                        $valFlotaT['fuel'] = 0;
                        $valFlotaT['velocidad'] = 999;
                        $valFlotaT['maniobra'] = 999;
                        $valFlotaT['ataqueR'] = 0;
                        $valFlotaT['defensaR'] = 0;
                        $valFlotaT['ataqueV'] = 0;
                        $valFlotaT['defensaV'] = 0;
                        $valFlotaT['extraccion'] = 0;
                        $valFlotaT['recoleccion'] = 0;
                        $valFlotaT['fuelDestT'] = 0;
                        $valFlotaT['atotal'] = 0;
                        $valFlotaT['mantenimiento'] = 0;

                        //Log::info("navesEnPlaneta ");Log::info($navesEnPlaneta);
                        $result = Flotas::ValoresDiseniosFlota((array)$navesEnPlaneta, $diseniosJugador, $navesEnPlaneta, $flotaid); //recalculo las naves enflota y hangar que me quedaron
                        $errores = $result[0];
                        $disenios = $result[1];

                        $result = Flotas::calculoFlota($disenios, $valFlotaT, null, $tablaHangares);
                        $valFlotaT = $result[0];

                        $flotaOrigen->ataqueReal = $valFlotaT['ataqueR'];
                        $flotaOrigen->defensaReal = $valFlotaT['defensaR'];
                        $flotaOrigen->ataqueVisible = $valFlotaT['ataqueV'];
                        $flotaOrigen->defensaVisible = $valFlotaT['defensaV'];
                        $flotaOrigen->creditos = $valFlotaT['mantenimiento'];
                        $flotaOrigen->save();
                    }

                    //borrar la flota si queda vacia del todo

                }

                DB::commit();
                //Log::info("Enviada");
                //try {
            } catch (Exception $e) {
                DB::rollBack();
                $errores = "Error en Commit de envio de flotas " . $e->getLine() . " " . $e->getFile() . $errores; //.$e;
                Log::info($errores . " " . $e);
            }
            //return redirect('/juego/flota');
        } else {
            //Log::info("errores al enviar: ".$errores);
            $errores = "errores al enviar: " . $errores;
        }
        //Log::info($errores);
        return compact('errores');
    }


    public function verFlotasEnVuelo()
    {
        $flotas = Astrometria::flotasVisibles();
        return $flotas;
    }

    public function verFlotasEnRecoleccion()
    {
        $flotas = Astrometria::flotasVisiblesEnRecoleccionOrbita("enrecoleccion");
        return $flotas;
    }

    public function verFlotasEnOrbita()
    {
        $flotas = Astrometria::flotasVisiblesEnRecoleccionOrbita("enorbita");
        return $flotas;
    }


    public function regresarFlota(Request $request, $id = null)
    {
        $result = Flotas::regresarFlota($id);
        return $result;
    }

    public function modificarFlota(Request $request, $id = false) //$id es de la flota en orbita de la que salimos
    {
        //$navesEstacionadasResult = $request->input('navesEstacionadas');
        $cargaDest = $request->input('cargaDest');
        $prioridadesResult = $request->input('prioridades');
        $flotaResult = $request->input('flota');
        //$destinosResult = $request->input('destinos');

        //Log::info("id: ".$id);
        //Log::info("navesEstacionadas");Log::info($navesEstacionadasResult);
        // Log::info("cargaDest");Log::info($cargaDest);
        //Log::info("prioridades");Log::info($prioridadesResult);
        //Log::info("flota");Log::info($flotaResult);
        //Log::info("destinos");Log::info($destinosResult);


        $errores = "";

        if ($flotaResult == null || empty($flotaResult)) {
            $errores = "Error en la asignación de flota";
        } else if ($prioridadesResult == null || empty($prioridadesResult)) {
            $errores = "Error en asignación de prioridades";
        }


        if (strlen($errores) < 1) {
            $tipoflota = $flotaResult['tipoflota'];
            $flotaid = $flotaResult['id'];
            //Log::info("flota datos ".$flotaid." ".$flotaResult['publico']);

            $jugadoryAlianza = [];
            $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
            if ($jugadorActual['alianzas_id'] != null) {
                array_push($jugadoryAlianza, Alianzas::jugadorAlianza($jugadorActual->alianzas_id)->id);
            }
            array_push($jugadoryAlianza, $jugadorActual->id);

            //Log::info($jugadoryAlianza);

            if ($tipoflota == "envuelo") {
                $flota = EnVuelo::whereIn('jugadores_id', $jugadoryAlianza)
                    ->where([['id', $flotaid], ['publico', $flotaResult['publico']]])
                    ->first();
            } else if ($tipoflota == "enrecoleccion") {
                $flota = EnRecoleccion::whereIn('jugadores_id', $jugadoryAlianza)
                    ->where([['id', $flotaid], ['publico', $flotaResult['publico']]])
                    ->first();
            } else if ($tipoflota == "enorbita") {
                $flota = EnOrbita::whereIn('jugadores_id', $jugadoryAlianza)
                    ->where([['id', $flotaid], ['publico', $flotaResult['publico']]])
                    ->first();
            }

            if ($flota == null && empty($flota)) {
                $errores = "No se encuentra la flota a modificar";
            }

            foreach ($prioridadesResult as $prioridad) {
                if (is_numeric($prioridad)) {
                    if ($prioridad < 0) {
                        $prioridad = 0;
                    } else if ($prioridad > 20) {
                        $prioridad = 20;
                    }
                } else {
                    $prioridad = 0;
                }
            }
        }


        //se modifica la flota  ////////////////////
        if (strlen($errores) < 3) {


            DB::beginTransaction();
            //Log::info(" ID= ".$flotaid);

            if ($tipoflota == "envuelo") {
                EnVuelo::updateOrCreate([
                    'id'   => $flotaid
                ], [
                    'nombre'   => $flotaResult['nombre']
                ]);
            } else if ($tipoflota == "enorbita") {
                EnOrbita::updateOrCreate([
                    'id'   => $flotaid
                ], [
                    'nombre'   => $flotaResult['nombre']
                ]);
            } else if ($tipoflota == "enrecoleccion") {
                EnRecoleccion::updateOrCreate([
                    'id'   => $flotaid,
                ], [
                    'nombre'   => $flotaResult['nombre']
                ]);
            }

            //cambio de destinos
            if ($tipoflota == "envuelo") {
                if ($cargaDest == null || empty($cargaDest)) {
                    $errores = "Error en asignación de cargas";
                    return compact('errores');
                }
                $dest = -1;
                foreach ($flota->destinos as $destino) {
                    $dest++;
                    if ($destino['visitado'] == 0) {

                        RecursosEnFlota::updateOrCreate([
                            'destinos_id'   => $destino->id
                        ], [
                            'personal' => $cargaDest[$dest]['personal'],
                            'mineral' => $cargaDest[$dest]['mineral'],
                            'cristal' => $cargaDest[$dest]['cristal'],
                            'gas' => $cargaDest[$dest]['gas'],
                            'plastico' => $cargaDest[$dest]['plastico'],
                            'ceramica' => $cargaDest[$dest]['ceramica'],
                            'liquido' => $cargaDest[$dest]['liquido'],
                            'micros' => $cargaDest[$dest]['micros'],
                            'fuel' => $cargaDest[$dest]['fuel'],
                            'ma' => $cargaDest[$dest]['ma'],
                            'municion' => $cargaDest[$dest]['municion'],
                            'creditos' => $cargaDest[$dest]['creditos'],
                        ]);

                        PrioridadesEnFlota::updateOrCreate([
                            'destinos_id'   => $destino->id
                        ], [
                            'personal' => $prioridadesResult[$dest]['personal'],
                            'mineral' => $prioridadesResult[$dest]['mineral'],
                            'cristal' => $prioridadesResult[$dest]['cristal'],
                            'gas' => $prioridadesResult[$dest]['gas'],
                            'plastico' => $prioridadesResult[$dest]['plastico'],
                            'ceramica' => $prioridadesResult[$dest]['ceramica'],
                            'liquido' => $prioridadesResult[$dest]['liquido'],
                            'micros' => $prioridadesResult[$dest]['micros'],
                            'fuel' => $prioridadesResult[$dest]['fuel'],
                            'ma' => $prioridadesResult[$dest]['ma'],
                            'municion' => $prioridadesResult[$dest]['municion'],
                            'creditos' => $prioridadesResult[$dest]['creditos'],
                        ]);
                    }
                }
            } else if ($tipoflota == "enorbita") {
                $dest = 0;
                PrioridadesEnFlota::updateOrCreate([
                    'en_orbita_id'   => $flotaid
                ], [
                    'personal' => $prioridadesResult[$dest]['personal'],
                    'mineral' => $prioridadesResult[$dest]['mineral'],
                    'cristal' => $prioridadesResult[$dest]['cristal'],
                    'gas' => $prioridadesResult[$dest]['gas'],
                    'plastico' => $prioridadesResult[$dest]['plastico'],
                    'ceramica' => $prioridadesResult[$dest]['ceramica'],
                    'liquido' => $prioridadesResult[$dest]['liquido'],
                    'micros' => $prioridadesResult[$dest]['micros'],
                    'fuel' => $prioridadesResult[$dest]['fuel'],
                    'ma' => $prioridadesResult[$dest]['ma'],
                    'municion' => $prioridadesResult[$dest]['municion'],
                    'creditos' => $prioridadesResult[$dest]['creditos'],
                ]);
            } else if ($tipoflota == "enrecoleccion") {
                $dest = 0;
                PrioridadesEnFlota::updateOrCreate([
                    'en_recoleccion_id'   => $flotaid
                ], [
                    'personal' => $prioridadesResult[$dest]['personal'],
                    'mineral' => $prioridadesResult[$dest]['mineral'],
                    'cristal' => $prioridadesResult[$dest]['cristal'],
                    'gas' => $prioridadesResult[$dest]['gas'],
                    'plastico' => $prioridadesResult[$dest]['plastico'],
                    'ceramica' => $prioridadesResult[$dest]['ceramica'],
                    'liquido' => $prioridadesResult[$dest]['liquido'],
                    'micros' => $prioridadesResult[$dest]['micros'],
                    'fuel' => $prioridadesResult[$dest]['fuel'],
                    'ma' => $prioridadesResult[$dest]['ma'],
                    'municion' => $prioridadesResult[$dest]['municion'],
                    'creditos' => $prioridadesResult[$dest]['creditos'],
                ]);
            }
            DB::commit();
            Log::info("Modificada");
            try {
            } catch (Exception $e) {
                DB::rollBack();
                $errores = "Error en Commit de modificacion de flotas " . $e->getFile() . " " . $e->getLine() . $errores; //.$e;
                Log::info($errores . " " . $e);
            }
            //return redirect('/juego/flota');
        } else {
            //Log::info("errores al enviar: ".$errores);
            $errores = "errores al modificar: " . $errores;
        }
        //Log::info($errores);
        return compact('errores');
    }
}
