<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Astrometria extends Model
{
    use HasFactory;

    // Generar radares para el usuario
    public static function radares()
    {
        $radares = [];
        $misRadares = [];
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $constanteRadar = Constantes::where('codigo', 'factorexpansionradar')->first()->valor;
        if (!empty($jugadorActual->alianzas) && !empty($jugadorActual->alianzas->miembros)) {
            foreach ($jugadorActual->alianzas->miembros as $miembro) {
                $nivelObservacion = $miembro->investigaciones->where('codigo', 'invObservacion')->first()->nivel;
                foreach ($miembro->planetas as $planeta) {
                    $observatorio = $planeta->construcciones->where('codigo', 'observacion')->first();
                    if ($observatorio != null && $observatorio->nivel > 0) {
                        $nivelObservatorio = $observatorio->nivel;
                        $radar = new Radares();
                        $radar->estrella = $planeta->estrella;
                        $radar->circulo = Astrometria::radioRadar(($nivelObservatorio + $nivelObservacion) * $constanteRadar);
                        if ($planeta->jugadores_id == session()->get('jugadores_id')) {
                            $radar->color = 1;
                            array_push($misRadares, $radar);
                        } else {
                            $radar->color = 2;
                            array_push($radares, $radar);
                        }
                    }
                }
                $flotasOrbitando = EnOrbita::where('jugadores_id', session()->get('jugadores_id'))->get();
                $cantidadFlotas = count($flotasOrbitando);
                foreach ($flotasOrbitando as $flota) {
                    $radar = new Radares();
                    $radar->estrella = $flota->estrella;
                    $radar->circulo = Astrometria::radioRadar(($nivelObservacion * $constanteRadar) / $cantidadFlotas);
                    if ($planeta->jugadores_id == session()->get('jugadores_id')) {
                        $radar->color = 1;
                        array_push($misRadares, $radar);
                    } else {
                        $radar->color = 2;
                        array_push($radares, $radar);
                    }
                }
            }
        } else {
            $nivelObservacion = $jugadorActual->investigaciones->where('codigo', 'invObservacion')->first()->nivel;
            foreach ($jugadorActual->planetas as $planeta) {
                $observatorio = $planeta->construcciones->where('codigo', 'observacion')->first();
                if ($observatorio != null && $observatorio->nivel > 0) {
                    $nivelObservatorio = $observatorio->nivel;
                    $radar = new Radares();
                    $radar->estrella = $planeta->estrella;
                    $radar->circulo = Astrometria::radioRadar(($nivelObservatorio + $nivelObservacion) * $constanteRadar);
                    $radar->color = 1;
                    array_push($misRadares, $radar);
                }
            }
            $flotasOrbitando = EnOrbita::where('jugadores_id', session()->get('jugadores_id'))->get();
            $cantidadFlotas = count($flotasOrbitando);
            foreach ($flotasOrbitando as $flota) {
                $radar = new Radares();
                $radar->estrella = $flota->estrella;
                $radar->circulo = Astrometria::radioRadar(($nivelObservacion * $constanteRadar) / $cantidadFlotas);
                $radar->color = 1;
                array_push($misRadares, $radar);
            }
        }

        $result = array_merge($radares, $misRadares);

        return $result;
    }

    // Generar influencia propia
    public static function miInfluencia()
    {
        $miInfluencia = [];
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (!empty($jugadorActual->alianzas) && !empty($jugadorActual->alianzas->miembros)) {
            foreach ($jugadorActual->alianzas->miembros as $miembro) {
                foreach ($miembro->planetas as $planeta) {
                    $radar = new Radares();
                    $radar->estrella = $planeta->estrella;
                    $radar->circulo = Astrometria::radioInfluencia(((time() - $planeta->creacion) / (3600 * 24 * 30)));
                    $radar->color = 2;
                    array_push($miInfluencia, $radar);
                }
            }
        } else {
            foreach ($jugadorActual->planetas as $planeta) {
                $radar = new Radares();
                $radar->estrella = $planeta->estrella;
                $radar->circulo = Astrometria::radioInfluencia((((time() - $planeta->creacion)) / (3600 * 24 * 30)));
                $radar->color = 1;
                array_push($miInfluencia, $radar);
            }
        }

        return $miInfluencia;
    }

    // Generar influencia general
    public static function influenciaGeneral()
    {
        $influencia = [];
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (empty($jugadorActual->alianzas)) {
            $restoJugadores = Jugadores::where('nombre', "!=", $jugadorActual->nombre)->get();
        } else {
            $restoJugadores = Jugadores::where('alianzas_id', "!=", $jugadorActual->alianzas_id)->orWhereNull('alianzas_id')->get();
        }
        // dd($restoJugadores);
        foreach ($restoJugadores as $jugador) {
            foreach ($jugador->planetas as $planeta) {
                $radar = new Radares();
                $radar->estrella = $planeta->estrella;
                $radar->circulo = Astrometria::radioInfluencia(((time() - $planeta->creacion) / (3600 * 24 * 30)));
                $radar->color = 3;
                array_push($influencia, $radar);
            }
        }

        return $influencia;
    }

    // multiplicar por las constantes factorexpansionradar y factorexpansionzonainfluencia $value para obtener valores adecuados a cada uso
    public static function radioRadar($value)
    {
        return round((pow($value, 0.92)), 2);
    }

    // multiplicar por las constantes factorexpansionradar y factorexpansionzonainfluencia $value para obtener valores adecuados a cada uso
    public static function radioInfluencia($value)
    {
        $constanteInfluencia = Constantes::where('codigo', 'factorexpansionzonainfluencia')->first()->valor;
        return round($constanteInfluencia * $value * (pow(1 / $value, 0.5)), 2);
    }

    // dado un sistema te determina si esta en observacion
    public static function sistemaEnRadares($sistema)
    {
        $radares = Astrometria::radares();
        $seve = false;

        $constantesU = Constantes::where('tipo', 'universo')->get();
        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;

        $coordOrigen = Flotas::coordenadasBySistema($sistema, $anchoUniverso, $luzdemallauniverso);

        foreach ($radares as $radar) {
            //Log::info($radar);
            $coordDestino = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
            $dist =  (pow(($coordDestino['x'] - $coordOrigen['x']) * ($coordDestino['x'] - $coordOrigen['x']) + ($coordDestino['y'] - $coordOrigen['y']) * ($coordDestino['y'] - $coordOrigen['y']), 1 / 2)) / $luzdemallauniverso;

            //Log::info($dist);
            if ($dist < $radar['circulo']) {
                $seve = true;
                break;
            }
        }

        return $seve;
    }

    //determina que flotas son visibles envuelo
    public static function flotasVisibles()
    {

        //Log::info("flotas visibles");
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;
        $jugadoresAlianzas = [];
        $jugadoresPropios = [];

        $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Log::info($jugadorActual);
        array_push($jugadoresPropios, $jugadorActual->id);
        if ($jugadorActual['alianzas_id'] != null) {
            $jugadoresAlianzas = Alianzas::idMiembros($jugadorActual['alianzas_id']); //Log::info($jugadoresAlianzas);

            //saco flotas aliadas
            $jugadorAlianzaSinMi = Alianzas::idMiembrosSinMi($jugadorActual['alianzas_id'], $jugadorActual->id);
            $flotasVisiblesAliadas = EnVuelo::whereIn('jugadores_id', $jugadorAlianzaSinMi)->get();
            array_push($jugadoresPropios, Alianzas::jugadorAlianza($jugadorActual['alianzas_id'])->id);
        } else {
            array_push($jugadoresAlianzas, $jugadorActual->id);
        }

        //Log::info('jugadoresAlianzas: '.$jugadoresAlianzas);

        //determina caja de visibilidad
        $minCoordx = 9999999;
        $maxCoordx = -1;
        $minCoordy = 99999999;
        $maxCoordy = -1;
        $ahora = date("Y-m-d H:i:s");

        $ajusteMapaBase = 35; //ajuste 0,0 con mapa
        $ajusteMapaFactor = 7; //ajuste escala mapa

        //se borran los ptos viejos
        PuntosEnFlota::where('fin', '<', $ahora)->delete();

        $radares = Astrometria::radares();

        foreach ($radares as $radar) {
            // Log::info($radar);
            $coordBase = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
            //Log::info("coordBase: ".$coordBase['x'].",".$coordBase['y']);
            $minCoordx = min($minCoordx, $ajusteMapaFactor * $coordBase['x'] + $ajusteMapaBase - $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $maxCoordx = max($maxCoordx, $ajusteMapaFactor * $coordBase['x'] + $ajusteMapaBase + $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $minCoordy = min($minCoordy, $ajusteMapaFactor * $coordBase['y'] + $ajusteMapaBase - $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $maxCoordy = max($maxCoordy, $ajusteMapaFactor * $coordBase['y'] + $ajusteMapaBase + $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            //Log::info("radar: ".$ajusteMapaFactor * $radar['circulo']." ".$minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
        }

        // arrays de flotas con formato de astrometría
        // $flotasVisiblesAjenasF = [];
        //$flotasVisiblesPropiasF = [];
        // $flotasVisiblesAliadasF = [];
        $flotas = [];

        //Log::info("busca ptos flota: SELECT * FROM en_puntos_en_flota WHERE fin>'".$ahora."' and `jugadores_id` not in ( ) order by `fin` asc");
        $puntosFlota = PuntosEnFlota::where('fin', '>', $ahora)
            ->whereNotIn('jugadores_id', $jugadoresAlianzas)
            ->orderBy('fin', 'asc')
            ->get()->unique('en_vuelo_id');

        $enZona = $puntosFlota->where('coordx', '>=', $minCoordx)
            ->where('coordx', '<=', $maxCoordx)
            ->where('coordy', '>=', $minCoordy)
            ->where('coordy', '<=', $maxCoordy);

        //Log::info($ahora." puntos flota: ".$puntosFlota);
        //Log::info($minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
        //Log::info("enzona: ".$enZona);

        //$flotasVisiblesIds=[];

        //me aseguro que esta en el circulo de radares
        foreach ($enZona as $ptoFlota) {
            foreach ($radares as $radar) {

                //Log::info($radar);
                $coordDestino = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
                $coordDestx = $ajusteMapaFactor * $coordDestino['x'] + $ajusteMapaBase;
                $coordDesty = $ajusteMapaFactor * $coordDestino['y'] + $ajusteMapaBase;

                $dist =  (pow(($coordDestx - $ptoFlota['coordx']) * ($coordDestx - $ptoFlota['coordx']) + ($coordDesty - $ptoFlota['coordy']) * ($coordDesty - $ptoFlota['coordy']), 1 / 2)); ///  /$luzdemallauniverso
                //Log::info("dist ".$dist);
                if ($dist < $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']) {
                    //Log::info($ptoFlota);
                    $flotasVisiblesAjena = EnVuelo::where('id', $ptoFlota['en_vuelo_id'])->first();
                    //Log::info($flotasVisiblesAjena);
                    $estaflota = Astrometria::flotaValoresVisibles($radares, $flotasVisiblesAjena, $ptoFlota, $anchoUniverso, $luzdemallauniverso, "ajena");
                    if ($estaflota != null) {
                        array_push($flotas, $estaflota);
                    }
                    break 1;
                }
            }
        }

        //saco flotas aliadas
        if ($jugadorActual['alianzas_id'] != null) {
            foreach ($flotasVisiblesAliadas as $flotaV) {
                $ptoFlota = PuntosEnFlota::where('en_vuelo_id', $flotaV->id)
                    ->orderBy('fin', 'asc')
                    ->first();
                if ($ptoFlota === null) {
                    //no hay punto, la flota debe haber llegado
                } else {
                    $estaflota = Astrometria::flotaValoresVisibles($radares, $flotaV, $ptoFlota, $anchoUniverso, $luzdemallauniverso, "aliada");
                    if ($estaflota != null) {
                        array_push($flotas, $estaflota);
                    }
                }
            }
        }

        //saco flotas propias
        $flotasVisiblesPropias = EnVuelo::whereIn('jugadores_id', $jugadoresPropios)->get();
        //Log::info("flotas visibles propias: ".$flotasVisiblesPropias);
        foreach ($flotasVisiblesPropias as $flotaV) {
            //Log::info($flotaV);
            $ptoFlota = PuntosEnFlota::where('en_vuelo_id', $flotaV->id)
                ->orderBy('fin', 'asc')
                ->first();
            //Log::info("pto en flota: ".$ptoFlota);
            if ($ptoFlota === null) {
                //no hay punto, la flota debe haber llegado
            } else {
                $estaflota = Astrometria::flotaValoresVisibles($radares, $flotaV, $ptoFlota, $anchoUniverso, $luzdemallauniverso, "propia");
                if ($estaflota != null) {
                    array_push($flotas, $estaflota);
                }
            }
        }

        //Log::info($flotasVisiblesPropias);

        $data = [
            'flotas' => $flotas
        ];

        return $data;
    }

    /// parametro de las flotas visibles
    public static function flotaValoresVisibles($radares, $flotaVisible, $ptoFlota, $anchoUniverso, $luzdemallauniverso, $tipo, $estado = "envuelo")
    {

        $ahora = date("Y-m-d H:i:s");
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        //Log::info("pto en flota: ".$ptoFlota);
        //Log::info($flotaVisible);

        if ($ptoFlota != null) {
            $destinoActual = Destinos::where('flota_id', $flotaVisible['id'])
                ->where('init', '<', $ahora)
                ->where('fin', '>=', $ahora)
                ->first();

            //Log::info($destinoActual);
            if ($destinoActual == null) {
                return;
            }
        }


        //$esteJugon=Jugadores::find($flotaVisible['jugadores_id'])->first();
        //Log::info($esteJugon);
        $ajusteMapaBase = 35; //ajuste 0,0 con mapa
        $ajusteMapaFactor = 7; //ajuste escala mapa

        $flota = new \stdClass();
        $flota->numeroflota = $flotaVisible->publico;
        $flota->nombre = $flotaVisible->publico;
        $flota->nick = $flotaVisible->jugadores['nombre'];
        $flota->ataque = $flotaVisible->ataqueVisible;
        $flota->defensa = $flotaVisible->defensaVisible;
        $flota->origen = "?";
        $flota->destino = "?";
        $flota->coordix = null;
        $flota->coordiy = null;
        $flota->coordfx = null;
        $flota->coordfy = null;
        $flota->trestante = null;
        $flota->tregreso = null;
        $flota->mision = "?";
        $flota->tipo = $tipo;
        $flota->fecha = null;

        if ($ptoFlota != null) {
            $tiempovuelo = strtotime($destinoActual['fin']) - strtotime($destinoActual['init']);
            $trestante = strtotime($destinoActual['fin']) - strtotime($ahora);
            $tregreso = strtotime($ahora) - strtotime($destinoActual['init']);
        } else {
            $tiempovuelo = "";
            $trestante = "";
            $tregreso = "";
        }

        if ($tipo == "ajena") {
            //calculo de si veo origen y destino
            $seveOrigen = false;
            $seveDestino = false;

            if ($estado == "envuelo") {
                foreach ($radares as $radar) {
                    $coordDestino = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
                    $coordDestx = $ajusteMapaFactor  * $coordDestino['x'] + $ajusteMapaBase;
                    $coordDesty = $ajusteMapaFactor  * $coordDestino['y'] + $ajusteMapaBase;

                    $inicioActualx = $destinoActual->initcoordx;
                    $inicioActualy = $destinoActual->initcoordy;

                    $destinoActualx = $destinoActual->fincoordx;
                    $destinoActualy = $destinoActual->fincoordy;

                    $radarRango = $luzdemallauniverso * $radar['circulo'] * $ajusteMapaFactor;

                    $dist =  (pow(($inicioActualx - $coordDestx) * ($inicioActualx - $coordDestx) + ($inicioActualy - $coordDesty) * ($inicioActualy - $coordDesty), 1 / 2)); //  /$luzdemallauniverso;
                    if ( $dist < $radarRango) {
                        $flota->origen = Astrometria::nombreDestino($destinoActual);
                        $flota->coordix = $inicioActualx;
                        $flota->coordiy = $inicioActualy;
                        $seveOrigen = true;
                    }

                    $dist =  (pow(($destinoActualx - $coordDestx) * ($destinoActualx - $coordDestx) + ($destinoActualy - $coordDesty) * ($destinoActualy - $coordDesty), 1 / 2)); // /$luzdemallauniverso;
                    if ($dist < $radarRango) {
                        $flota->destino = Astrometria::nombreDestino($destinoActual,true);
                        $flota->coordfx = $destinoActualx;
                        $flota->coordfy = $destinoActualy;
                        $seveDestino = true;
                    }

                    if ($seveOrigen && $seveDestino) {
                        $flota->tvuelo = $tiempovuelo;
                        $flota->trestante = $trestante;
                        $flota->tregreso = $tregreso;
                        break;
                    }
                }
            } else if ($estado == "enrecoleccion" || $estado == "enextraccion") {
                $seveOrigen = Astrometria::sistemaEnRadares($flotaVisible->planetas->estrella);
            } else if ($estado == "enorbita") {
                if ($flotaVisible->planetas->tipo == "asteroide") {
                    $seveOrigen = Astrometria::sistemaEnRadares($flotaVisible->planetas->estrella);
                } else {
                    $seveOrigen = false;
                }
            }


            if ($ptoFlota != null && $estado == "envuelo") {
                if (!$seveOrigen) {
                    $flota->coordix = $ptoFlota->coordx;
                    $flota->coordiy = $ptoFlota->coordy;
                } else {
                    $flota->origen = Astrometria::nombreDestino($destinoActual);
                    $flota->tregreso = $tregreso;
                }
                if (!$seveDestino) {
                    $flota->coordfx = $ptoFlota->coordx;
                    $flota->coordfy = $ptoFlota->coordy;
                } else {
                    $flota->destino = Astrometria::nombreDestino($destinoActual,true);
                    $flota->trestante = $trestante;
                }
            } else if ($estado == "enrecoleccion" && $seveOrigen) {
                $flota->mision = "Recolectando";
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            } else if ($estado == "enextraccion" && $seveOrigen) {
                $flota->mision = "Extrayendo";
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            } else if ($estado == "enorbita" && $seveOrigen) {
                $flota->mision = "Orbitando";
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            }

            $flota->color = 3;
        } else if ($tipo == "aliado") {
            if ($ptoFlota != null || $estado == "envuelo") {
                $flota->origen = Astrometria::nombreDestino($destinoActual);
                $flota->coordix = $destinoActual->initcoordx;
                $flota->coordiy = $destinoActual->initcoordy;
                $flota->coordfx = $destinoActual->fincoordx;
                $flota->coordfy = $destinoActual->fincoordy;
                $flota->mision = $destinoActual['mision'];
                $flota->misionregreso = $destinoActual['mision_regreso'];
                $flota->fecha = $destinoActual['fin'];
                $flota->destino = Astrometria::nombreDestino($destinoActual,true);
            } else if ($estado == "enrecoleccion") {
                $flota->mision = "Recolectando";
                $flota->recoleccion = $flotaVisible->recoleccion;
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
                $flota->recursos = RecursosEnFlota::where('en_recoleccion_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
            } else if ($estado == "enextraccion") {
                $flota->mision = "Extrayendo";
                $flota->recoleccion = $flotaVisible->extraccion;
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
                $flota->recursos = RecursosEnFlota::where('en_recoleccion_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
            } else if ($estado == "enorbita") {
                $flota->mision = "Orbitando";
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
                $flota->recursos = RecursosEnFlota::where('en_recoleccion_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
            }


            $flota->color = 2;

            $flota->tvuelo = $tiempovuelo;
            $flota->trestante = $trestante;
            $flota->tregreso = $tregreso;
        } else { //propio
            //Log::info($destinoActual);
            if ($ptoFlota != null || $estado == "envuelo") {
                $flota->origen = Astrometria::nombreDestino($destinoActual);
                $flota->coordix = $destinoActual->initcoordx;
                $flota->coordiy = $destinoActual->initcoordy;
                $flota->coordfx = $destinoActual->fincoordx;
                $flota->coordfy = $destinoActual->fincoordy;
                $flota->destino = Astrometria::nombreDestino($destinoActual,true);
                $flota->mision = $destinoActual['mision'];
                $flota->misionregreso = $destinoActual['mision_regreso'];
                $flota->fecha = $destinoActual['fin'];
                $flota->recursos = RecursosEnFlota::where('en_vuelo_id', $flotaVisible['id'])->first();
            } else if ($estado == "enrecoleccion") {
                Flotas::recolectarAsteroide($flotaVisible->planetas, $flotaVisible);
                $flota->recursos = RecursosEnFlota::where('en_recoleccion_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
                $flota->mision = "Recolectando";
                $flota->recoleccion = $flotaVisible->recoleccion;
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            } else if ($estado == "enextraccion") {
                $flota->recursos = RecursosEnFlota::where('en_recoleccion_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
                $flota->mision = "Extrayendo";
                $flota->recoleccion = $flotaVisible->extraccion;
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            } else if ($estado == "enorbita") {
                $flota->recursos = RecursosEnFlota::where('en_orbita_id', $flotaVisible['id'])->first();
                $cargaT = 0;
                foreach ($recursosArray as $recurso) {
                    $cargaT += $flota->recursos[$recurso];
                }
                $flota->cargaT = $cargaT;
                $flota->mision = "Orbitando";
                $flota->origen = $flotaVisible->planetas->estrella . "x" . $flotaVisible->planetas->orbita;
                $flota->destino = "";
            }

            $flota->nombre = $flotaVisible->nombre;
            $flota->color = 1;

            $flota->tvuelo = $tiempovuelo;
            $flota->trestante = $trestante;
            $flota->tregreso = $tregreso;
            $flota->estado = $estado;
        }
        if ($ptoFlota != null) {
            $flota->coordx = $ptoFlota->coordx;
            $flota->coordy = $ptoFlota->coordy;
        }
        $flota->abreen = "ppal";

        if ($ptoFlota != null) {
            $vectorx = $destinoActual->fincoordx - $destinoActual->initcoordx;
            $vectory = $destinoActual->fincoordy - $destinoActual->initcoordy;
            $angle = atan2($vectory, $vectorx) + 3.141579 / 2;
            $flota->angulo = $angle;
        }

        //Log::info(" flota visible: ".$flota->nombre);
        //Log::info($flotaVisible->nombre." ".$flota->coordfx." ".$flota->coordix." ademas ".$flota->coordfy." ".$flota->coordiy);
        //Log::info($vectorx."  ".$vectory." = ".$angle.", grados= ".(180*$angle/3.141579));
        //Log::info($flotaVisible->nombre." mision: ".$flota->mision." id destino: ".$destinoActual['id']);

        return $flota;
    }

    // que se ve flotas en recoleccion
    public static function flotasVisiblesEnRecoleccionOrbita($estado)
    {

        //Log::info("flotas visibles");
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;
        $jugadoresAlianzas = [];
        $jugadoresPropios = [];

        $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Log::info($jugadorActual);
        array_push($jugadoresPropios, $jugadorActual->id);
        if ($jugadorActual['alianzas_id'] != null) {
            $jugadoresAlianzas = Alianzas::idMiembros($jugadorActual['alianzas_id']); //Log::info($jugadoresAlianzas);

            //saco flotas aliadas
            $jugadorAlianzaSinMi = Alianzas::idMiembrosSinMi($jugadorActual['alianzas_id'], $jugadorActual->id);
            if ($estado == "enrecoleccion") {
                $flotasVisiblesAliadas = EnRecoleccion::whereIn('jugadores_id', $jugadorAlianzaSinMi)->get();
            } else {
                $flotasVisiblesAliadas = EnOrbita::whereIn('jugadores_id', $jugadorAlianzaSinMi)->get();
            }

            array_push($jugadoresPropios, Alianzas::jugadorAlianza($jugadorActual['alianzas_id'])->id);
        } else {
            array_push($jugadoresAlianzas, $jugadorActual->id);
        }

        //Log::info($jugadoresPropios);
        //Log::info('jugadoresAlianzas: '.$jugadoresAlianzas);

        //determina caja de visibilidad
        $minCoordx = 9999999;
        $maxCoordx = -1;
        $minCoordy = 99999999;
        $maxCoordy = -1;
        $ahora = date("Y-m-d H:i:s");

        $ajusteMapaBase = 35; //ajuste 0,0 con mapa
        $ajusteMapaFactor = 7; //ajuste escala mapa

        $radares = Astrometria::radares();

        foreach ($radares as $radar) {
            // Log::info($radar);
            $coordBase = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
            //Log::info("coordBase: ".$coordBase['x'].",".$coordBase['y']);
            $minCoordx = min($minCoordx, $ajusteMapaFactor * $coordBase['x'] + $ajusteMapaBase - $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $maxCoordx = max($maxCoordx, $ajusteMapaFactor * $coordBase['x'] + $ajusteMapaBase + $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $minCoordy = min($minCoordy, $ajusteMapaFactor * $coordBase['y'] + $ajusteMapaBase - $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            $maxCoordy = max($maxCoordy, $ajusteMapaFactor * $coordBase['y'] + $ajusteMapaBase + $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']);
            //Log::info("radar: ".$ajusteMapaFactor * $radar['circulo']." ".$minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
        }

        // arrays de flotas con formato de astrometría
        // $flotasVisiblesAjenasF = [];
        //$flotasVisiblesPropiasF = [];
        // $flotasVisiblesAliadasF = [];
        $flotas = [];
        if ($estado == "enrecoleccion") {
            $enZona = EnRecoleccion::where('coordx', '>=', $minCoordx)
                ->where('coordx', '<=', $maxCoordx)
                ->where('coordy', '>=', $minCoordy)
                ->where('coordy', '<=', $maxCoordy)
                ->whereNotIn('jugadores_id', $jugadoresAlianzas)
                ->get();
        } else {
            $enZona = EnOrbita::where('coordx', '>=', $minCoordx)
                ->where('coordx', '<=', $maxCoordx)
                ->where('coordy', '>=', $minCoordy)
                ->where('coordy', '<=', $maxCoordy)
                ->whereNotIn('jugadores_id', $jugadoresAlianzas)
                ->get();
        }

        //Log::info($ahora." puntos flota: ".$puntosFlota);
        //Log::info($minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
        //Log::info("enzona: ".$enZona);

        //$flotasVisiblesIds=[];

        //me aseguro que esta en el circulo de radares
        foreach ($enZona as $flotaV) {
            foreach ($radares as $radar) {

                //Log::info($radar);
                $coordDestino = Flotas::coordenadasBySistema($radar['estrella'], $anchoUniverso, $luzdemallauniverso);
                $coordDestx = $ajusteMapaFactor * $coordDestino['x'] + $ajusteMapaBase;
                $coordDesty = $ajusteMapaFactor * $coordDestino['y'] + $ajusteMapaBase;

                $dist =  (pow(($coordDestx - $flotaV['coordx']) * ($coordDestx - $flotaV['coordx']) + ($coordDesty - $flotaV['coordy']) * ($coordDesty - $flotaV['coordy']), 1 / 2)); ///  /$luzdemallauniverso
                //Log::info("dist ".$dist);
                if ($dist < $ajusteMapaFactor * $luzdemallauniverso * $radar['circulo']) {
                    //Log::info($flotaV);
                    //$flotasVisiblesAjena=$flotaV;
                    //Log::info($flotasVisiblesAjena);
                    $estaflota = Astrometria::flotaValoresVisibles($radares, $flotaV, null, $anchoUniverso, $luzdemallauniverso, "ajena", $estado);
                    if ($estaflota != null) {
                        array_push($flotas, $estaflota);
                    }
                    break 1;
                }
            }
        }

        //saco flotas aliadas
        if ($jugadorActual['alianzas_id'] != null) {
            foreach ($flotasVisiblesAliadas as $flotaV) {
                $estaflota = Astrometria::flotaValoresVisibles($radares, $flotaV, null, $anchoUniverso, $luzdemallauniverso, "aliada", $estado);
                if ($estaflota != null) {
                    array_push($flotas, $estaflota);
                }
            }
        }

        //saco flotas propias
        if ($estado == "enrecoleccion") {
            $flotasVisiblesPropias = EnRecoleccion::whereIn('jugadores_id', $jugadoresPropios)->get();
        } else {
            $flotasVisiblesPropias = EnOrbita::whereIn('jugadores_id', $jugadoresPropios)->get();
        }
        // Log::info($jugadoresPropios);
        // Log::info("flotas visibles propias: ".$flotasVisiblesPropias);
        foreach ($flotasVisiblesPropias as $flotaV) {
            //Log::info($flotaV);
            $estaflota = Astrometria::flotaValoresVisibles($radares, $flotaV, null, $anchoUniverso, $luzdemallauniverso, "propia", $estado);
            if ($estaflota != null) {
                array_push($flotas, $estaflota);
            }
        }

        //Log::info($flotasVisiblesPropias);

        $data = [
            'flotas' => $flotas
        ];

        return $data;
    }

    public static function tipoDestino($destino)
    {

        //Log::info("destino ".$destino);
        $tipodestino = null;
        if ($destino->planetas_id != null && $destino->planetas->id != null) {
            $tipodestino = "planeta";
        } else if ($destino->en_orbita_id != null && $destino->enOrbita->id != null) {
            $tipodestino = "enorbita";
        } else if ($destino->en_recoleccion_id != null && $destino->enRecoleccion->id != null) {
            $tipodestino = "enrecoleccion";
        } else if ($destino->en_vuelo_id != null && $destino->enVuelo->id != null) {
            $tipodestino = "envuelo";
        }

        return $tipodestino;
    }

    public static function nombreDestino($destino,$anterior=false)
    {

        $tipodestino = Astrometria::tipoDestino($destino);
        $nombreDestino = "";
        switch ($tipodestino) {
            case "planeta":
                // Log::info("destino planeta ".$destino->planeta);
                if($anterior){
                    $nombreDestino =$destino->planetas->nombre." ".$destino->planetas->estrella . "x" . $destino->planetas->orbita;
                } else {
                    $planetaAnterior = Planetas::where([['estrella', $destino['initestrella']], ['orbita', $destino['initorbita']]])->first();
                    $nombreDestino =$planetaAnterior->nombre." ".$planetaAnterior->estrella . "x" . $planetaAnterior->orbita;
                }

                break;
            case "enrecoleccion":
                $nombreDestino = $destino->enRecoleccion["publico"];
                break;
            case "enorbita":
                $nombreDestino = $destino->enOrbita["publico"];
                break;
            case "envuelo":
                $nombreDestino = $destino->enVuelo["publico"];
                break;
        }


        return $nombreDestino;
    }

    public static function colonizarZonaPosible($planetaid)
    {
        return true;
    }
}




/*
https://paiza.io/projects/kMVLKwrlHqzGuSlA4PbKaQ

            $vectorx=18865-17255;
            $vectory=2695-3185;
            $angle=atan2($vectorx, $vectory);
            $degrees = 180*$angle/3.141579;
            echo($vectorx." ");
            echo($vectory." ");
            echo($degrees);

           */
