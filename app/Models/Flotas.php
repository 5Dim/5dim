<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use LengthException;

use function PHPUnit\Framework\isEmpty;

class Flotas extends Model
{

    public static function calculoFlota($disenios, $valFlotaT, $destinos, $tablaHangares) // calcula los valores de una flota
    {

        //  Log::info($disenios);

        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
        $tamaniosNaveAcarga = array('caza' => "cargaPequenia", 'ligera' => "cargaMediana", 'media' => "cargaGrande", 'pesada' => "cargaEnorme", 'estacion' => "cargaMega");
        //$recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");


        //bucle por nave
        foreach ($disenios as $disenio) {

            $aflota = $disenio['enflota'];
            $ahangar = $disenio['enhangar'];
            $atotal = $aflota + $ahangar;
            // $valFlotaT['extraccion'] += $disenios['extraccion']* $atotal;
            // $valFlotaT['recoleccion'] += $disenios['recoleccion']* $atotal;
            //Log::info("a total ".$atotal);

            $valFlotaT['carga'] += $disenio['datos']['carga'] * $atotal;
            $valFlotaT['fuel'] += $disenio['datos']['fuel'] * $aflota;
            $valFlotaT['ataqueR'] += $disenio['datos']['ataque'] * $atotal;
            $valFlotaT['defensaR'] += $disenio['datos']['defensa'] * $atotal;
            $valFlotaT['ataqueV'] += $disenio['datos']['ataque'] * $aflota;
            $valFlotaT['defensaV'] += $disenio['datos']['defensa'] * $aflota;

            $valFlotaT['municion'] += $disenio['datos']['municion'] * $atotal;
            $valFlotaT['mantenimiento'] += $disenio['datos']['mantenimiento'] * $atotal;

            //Log::info($valFlotaT['carga'] ."+=". $disenio['carga'] ."*". $atotal);

            if ($aflota > 0) {
                $valFlotaT['velocidad'] = min($disenio['datos']['velocidad'], $valFlotaT['velocidad']);
                $valFlotaT['maniobra'] = min($disenio['datos']['maniobra'], $valFlotaT['maniobra']);
            }

            //hangares

            foreach ($tamaniosArray as $tamaniod) {
                //Log::info($disenio['datos'][$tamaniod]. " de ".$tamaniod." del diseño ".$disenio);
                $tablaHangares['capacidadH'][$tamaniod] += $atotal * $disenio['datos'][$tamaniod];
            };
            //Log::info($disenio);
            $tcarga = $tamaniosNaveAcarga[$disenio['tamanio']];
            $tablaHangares['dentroH'][$tcarga] += $ahangar;
            $tablaHangares['fueraH'][$tcarga] += $aflota;

            $tablaHangares['capacidadH']['cargaMega'] = 0; //siempre

            $valFlotaT['atotal'] += $atotal;
        }

        //Log::info("calculo flota");
        //Log::info($valFlotaT);
        //Log::info($tablaHangares);
        if ($destinos != null) {
            $result = Flotas::calculoespaciotiempo($destinos, $valFlotaT);
            return [$result[1], $result[0], $tablaHangares];
        }

        return [$valFlotaT, null, $tablaHangares];
    }

    public static function valoresValidos($cantidadDestinos, $cargaDest, $prioridades)
    {
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        //Log::info($cantidadDestinos);

        for ($dest = 1; $dest < $cantidadDestinos; $dest++) {
            //Log::info($cargaDest[$dest]);
            foreach ($recursosArray as $recurso) {

                if (!is_numeric($cargaDest[$dest][$recurso])) {
                    $cargaDest[$dest][$recurso] = 0;
                }

                $prioridad = $prioridades[$dest][$recurso];
                if (is_numeric($prioridad)) {
                    if ($prioridad < 0) {
                        $prioridades[$dest][$recurso] = 0;
                    } else if ($prioridad > 20) {
                        $prioridades[$dest][$recurso] = 20;
                    }
                } else {
                    $prioridades[$dest][$recurso] = 0;
                }
            }
        }

        return [$cargaDest, $prioridades];
    }

    public static function validacionesFlota($destinos, $valFlotaT, $errores, $tablaHangares, $recursos, $cargaDest, $cantidadDestinos, $flotaid) // calcula los valores de una flota
    {

        // destinos
        $destinosViables = 0;
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        $cargaDestT = 0;

        $dest = 0;
        /// Carga en origen
        //Log::info($cargaDest[$dest]);
        //Log::info($recursos->personal." ".$cargaDest[$dest]['personal']);
        if ($flotaid == null) { //salimos de planeta
            $personalOcupado = Recursos::calcularRecursos($recursos->planetas_id); //recalculamos el planeta, por si acaso
            //Log::info($recursos->personal-$personalOcupado." ".$cargaDest[$dest]['personal']);
            if ($recursos->personal - $personalOcupado < $cargaDest[$dest]['personal']) {
                $errores = " No hay tanta cantidad en origen: personal ";
            }
        } else {
            if ($recursos->personal < $cargaDest[$dest]['personal']) {
                $errores = " No hay tanta cantidad en origen: personal ";
            }
        }
        if ($recursos->mineral < $cargaDest[$dest]['mineral']) {
            $errores = " No hay tanta cantidad en origen: mineral ";
        }
        if ($recursos->cristal < $cargaDest[$dest]['cristal']) {
            $errores = " No hay tanta cantidad en origen: cristal ";
        }
        if ($recursos->gas < $cargaDest[$dest]['gas']) {
            $errores = " No hay tanta cantidad en origen: gas ";
        }
        if ($recursos->plastico < $cargaDest[$dest]['plastico']) {
            $errores = " No hay tanta cantidad en origen: plastico ";
        }
        if ($recursos->ceramica < $cargaDest[$dest]['ceramica']) {
            $errores = " No hay tanta cantidad en origen: ceramica ";
        }
        if ($recursos->liquido < $cargaDest[$dest]['liquido']) {
            $errores = " No hay tanta cantidad en origen: liquido ";
        }
        if ($recursos->micros < $cargaDest[$dest]['micros']) {
            $errores = " No hay tanta cantidad en origen: micros ";
        }
        if ($flotaid == null) { //salimos de planeta
            if ($recursos->fuel < $cargaDest[$dest]['fuel'] + $valFlotaT['fuelDestT']) { //$valFlotaT['fuel']
                $requiere = $cargaDest[$dest]['fuel'] + $valFlotaT['fuelDestT'];
                $errores = " No hay tanto fuel " . " (" . $requiere . ")";
            }
        }

        if ($recursos->ma < $cargaDest[$dest]['ma']) {
            $errores = " No hay tanta cantidad en origen: ma ";
        }
        if ($recursos->municion < $cargaDest[$dest]['municion']) {
            $errores = " No hay tanta cantidad en origen: municion";
        }
        if ($recursos->creditos < $cargaDest[$dest]['creditos']) {
            $errores = " No hay tanta cantidad en origen: creditos";
        }


        for ($dest = 1; $dest < $cantidadDestinos; $dest++) {
            //destino viable
            //Log::info($destinos[$dest]['viable']);
            // if (!$destinos[$dest]['viable']){
            //     $errores=" Destino no viable= ".$dest;
            // }
            //misiones
            $destAnt = $dest - 1;
            $destPost = $dest + 1;

            //Log::info($destinos[$dest]);
            if (isset($destinos[$dest]['mision']) && strlen($errores) < 1) {

                $destinosViables++;
                $orden = $destinos[$dest]['mision'];

                if ($orden != "") {

                    $ordenAnt = $destinos[$destAnt]['mision'];
                    $ordenPost = $destinos[$destPost]['mision'];
                    // no se puede llegar

                    if ($ordenAnt == "" || $ordenAnt == "Transferir" || $ordenAnt == "Recolectar" || $ordenAnt == "Orbitar" || $ordenAnt == "Extraer") {
                        $errores = " No se alcanzará destino " . $dest . " con la orden " . $ordenAnt;
                    }

                    // soy la ultima y debe ser de cierre
                    if ($ordenPost == "" && $orden != "Transferir" && $orden != "Recolectar" && $orden != "Orbitar" && $orden != "Extraer") {
                        $errores = " la misión del último destino no es Transferir, Orbitar,Extraer o Recolectar";
                    }

                    if ($cantidadDestinos == $dest) {
                        if ($ordenPost != "Transferir" && $ordenPost != "Recolectar" && $ordenPost != "Orbitar" && $ordenPost != "Extraer") {
                            $errores = " la misión del último destino no es Transferir, Orbitar,Extraer o Recolectar. ";
                        }
                    }

                    foreach ($recursosArray as $recurso) {
                        $cargaDestT += 1 * $cargaDest[$dest][$recurso];
                    }
                    if ($destinos[$dest]['fuelDest'] == 0) { //viajes cortos y una navecilla
                        $destinos[$dest]['fuelDest'] = 1;
                    }
                    //Log::info(" dest es:".$destinos[$dest]['tiempoDest']." fuel dest ".$destinos[$dest]['fuelDest'] );
                    if ($destinos[$dest]['tiempoDest'] < 1 || $destinos[$dest]['fuelDest'] < 1) {
                        $errores = " tiempo o fuel no puede ser 0 a destino " . $dest;
                    }

                    if ($destinos[$dest]['porcentVel'] < 0 ||  $destinos[$dest]['porcentVel'] > 100) {
                        $errores = " porcentaje de velocidad fuera de rango en destino " . $dest;
                    }

                    //los destinos existen
                    //sistemas
                    if (Flotas::existeSistema($destinos[$dest]['estrella']) == false) {
                        $errores .= " Sistema " . $destinos[$dest]['estrella'] . " no existe ";
                    }
                    //flotas
                }
            }


            // Carga total
            // Log::info("carga " . $cargaDestT . " " . $valFlotaT['carga']);
            if (strlen($errores) < 1 && $cargaDestT > 1 * $valFlotaT['carga']) {
                $errores = " Seleccionada mas carga de la capacidad disponible";
            }
        }

        if (strlen($errores) < 1 && $destinosViables < 1) {
            $errores = " No hay destinos con misiones viables";
        }

        //log::info($errores);

        /// hangares
        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");

        foreach ($tamaniosArray as $tamanio) {
            //Log::info($tablaHangares['dentroH'][$tamanio] .' > '.$tablaHangares['capacidadH'][$tamanio]);
            if ($tablaHangares['dentroH'][$tamanio] > $tablaHangares['capacidadH'][$tamanio]) {
                $errores = "  Capacidad de hangar insuficiente";
            };
        }


        //Log::info($errores);
        return $errores;
    }

    public static function calculoespaciotiempo($destinos, $valFlotaT)
    {
        $fuelDestT = 0;
        $constantesU = Constantes::where('tipo', 'universo')->get(); //Log::info($constantesU);
        $fueldistancia = $constantesU->where('codigo', 'fuelpordistancia')->first()->valor;
        $factortiempoviaje = $constantesU->where('codigo', 'factortiempoviaje')->first()->valor;
        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;
        $fuelfactorreduccionpordistancia = $constantesU->where('codigo', 'fuelfactorreduccionpordistancia')->first()->valor;

        $dest = 0;
        //Log::info("destinos ");Log::info($destinos);
        $coordDestino = Flotas::coordenadasBySistema($destinos[$dest]['estrella'], $anchoUniverso, $luzdemallauniverso);
        $destinos[$dest]['fincoordx'] = $coordDestino['x'];
        $destinos[$dest]['fincoordy'] = $coordDestino['y'];
        //Log::info(" coord x ".$destinos[$dest]['fincoordx']." y ".$destinos[$dest]['fincoordy'] = $coordDestino['y'] );

        for ($dest = 1; $dest < count($destinos); $dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            $destAnt = $dest - 1;
            $destinos[$dest]['viable'] = false;
            $tiempoDest = 0;
            $fuelDest = 0;

            if (isset($destinos[$dest]['mision']) &&  $destinos[$dest]['mision'] != "") {
                $destinos[$dest]['viable'] = true;
                //Log::info($destinos[$destAnt]); Log::info($destinos[$dest]);Log::info(" ya ");
                $result = Flotas::distanciaUniverso($destinos[$destAnt], $destinos[$dest], $constantesU);
                $distancia = $result[0];
                $destinos[$dest] = $result[1];
                //Log::info($result);

                if ($distancia == 0 || $destinos[$dest]['estrella'] == "") {
                    $destinos[$dest]['viable'] = false;
                } else {
                    $porcentVel = $destinos[$dest]['porcentVel'] / 100;
                    $fuelDest = Flotas::gastoFuel($distancia, $valFlotaT['fuel'], $fueldistancia, $porcentVel, $fuelfactorreduccionpordistancia);
                    if ($distancia < 10) {
                        if ($valFlotaT['maniobra'] < 1) {
                            $destinos[$dest]['viable'] = false;
                        } else {
                            $tiempoDest = Flotas::tiempoLLegada($distancia, $valFlotaT['maniobra'] * $porcentVel, $factortiempoviaje);
                        }
                    } else {
                        if ($valFlotaT['velocidad'] < 1) {
                            $destinos[$dest]['viable'] = false;
                        } else {
                            $tiempoDest = Flotas::tiempoLLegada($distancia, $valFlotaT['velocidad'] * $porcentVel, $factortiempoviaje);
                        }
                    }
                }
            }
            $destinos[$dest]['tiempoDest'] = $tiempoDest;
            $destinos[$dest]['fuelDest'] = $fuelDest;
            $fuelDestT += $fuelDest;
        }
        $valFlotaT['fuelDestT'] = $fuelDestT;
        //Log::info($destinos[1]['viable']);

        return [$destinos, $valFlotaT];
    }

    public static function distanciaUniverso($origen, $destino, $constantesU)
    {
        $coordOrigen = [];
        $coordOrigen['x'] = 0;
        $coordOrigen['y'] = 0;
        $coordDestino = [];
        $coordDestino['x'] = 0;
        $coordDestino['y'] = 0;
        $factordistancia = 1;
        $oriestrella = $origen['estrella'];
        $oriorbita = $origen['orbita'];
        $destiestrella = $destino['estrella'];
        if (isset($destino['orbita'])) {
            $destiorbita = $destino['orbita'];
        } else {
            $destiorbita = null;;
        }


        $destino['planetas_id'] = null;
        $destino['en_vuelo_id'] = null;
        $destino['en_recoleccion_id'] = null;
        $destino['en_orbita_id'] = null;
        $destino["initflota"] = null;


        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;

        $dist = 0;

        if (strlen($oriestrella) > 6 || !is_numeric($oriestrella)) {  // origen es flota
            $flotaDestino = EnRecoleccion::where("publico", $oriestrella)->orWhere("nombre", $oriestrella)->first();
            if ($flotaDestino == null) {
                $flotaDestino = EnOrbita::where("publico", $oriestrella)->orWhere("nombre", $oriestrella)->first();
            }
            $oriestrella = $flotaDestino->planetas['estrella'];
            $oriorbita = $flotaDestino->planetas['orbita'];
            $origen['estrella'] = $oriestrella;
            $origen['orbita'] = $oriorbita;
        }

        if (strlen($destiestrella) > 6 || !is_numeric($destiestrella)) {  //destino es flota
            $flotaDestino = EnRecoleccion::where("publico", $destiestrella)->orWhere("nombre", $destiestrella)->first();
            if ($flotaDestino == null) {
                $flotaDestino = EnOrbita::where("publico", $destiestrella)->orWhere("nombre", $destiestrella)->first();
                $destino['en_orbita_id'] = $flotaDestino->id;
            } else {
                $destino['en_recoleccion_id'] = $flotaDestino->id;
            }
            $destiestrella = $flotaDestino->planetas['estrella'];
            $destiorbita = $flotaDestino->planetas['orbita'];
            $destino['estrella'] = $destiestrella;
            $destino['orbita'] = $destiorbita;
            $destino["initflota"] = $flotaDestino->publico; //para pasarlo al destino posterior
        }

        // calculos
        if ($oriestrella != "0" && $destiestrella != "0" && $oriorbita != "0" && $destiorbita != "0") {
            if ($oriestrella == $destiestrella && $oriorbita == $destiorbita) {
                //Orbitar
                $factordistancia = $constantesU->where('codigo', 'distanciaorbita')->first()->valor;
                $coordDestino['x'] = 0.5;
            } else if ($oriestrella == $destiestrella) {
                //mismo sistema
                $factordistancia = $constantesU->where('codigo', 'distanciaentreplanetas')->first()->valor;
                $coordOrigen['x'] = $oriorbita;
                $coordDestino['x'] = $destiorbita;
            } else {
                //entre sistemas
                $factordistancia = $constantesU->where('codigo', 'distanciaentresistemas')->first()->valor;

                $coordOrigen = Flotas::coordenadasBySistema($oriestrella, $anchoUniverso, $luzdemallauniverso);
                $coordDestino = Flotas::coordenadasBySistema($destiestrella, $anchoUniverso, $luzdemallauniverso);
            }
            //calculo coords para distancia
            $dist = $factordistancia * pow(($coordDestino['x'] - $coordOrigen['x']) * ($coordDestino['x'] - $coordOrigen['x']) + ($coordDestino['y'] - $coordOrigen['y']) * ($coordDestino['y'] - $coordOrigen['y']), 1 / 2);
        }

        //guardando coord para representar
        $coordDestino = Flotas::coordenadasBySistema($destiestrella, $anchoUniverso, $luzdemallauniverso);
        $destino['fincoordx'] = $coordDestino['x'];
        $destino['fincoordy'] = $coordDestino['y'];


        return [round($dist * 100) / 100, $destino];
    }

    public static function gastoFuel($distancia, $fuelbase, $fueldistancia, $porcentVel, $fuelfactorreduccionpordistancia)
    {
        return round($fueldistancia * $distancia * $fuelbase * pow($porcentVel, $fuelfactorreduccionpordistancia));
    }

    public static function tiempoLLegada($distancia, $velocidad, $factortiempoviaje)
    {
        if ($velocidad > 0) {
            return (round($distancia / $velocidad * $factortiempoviaje)); //en segundos
        }
        return 0;
    }

    public static function coordenadasBySistema($nsistema, $anchoUniverso, $luzdemallauniverso)
    {
        $coord = [];
        if (strlen($nsistema) > 6 || !is_numeric($nsistema)) {  //destino es flota
            $flotaDestino = EnRecoleccion::where("publico", $nsistema)->orWhere("nombre", $nsistema)->first();
            if ($flotaDestino == null) {
                $flotaDestino = EnOrbita::where("publico", $nsistema)->orWhere("nombre", $nsistema)->first();
            }
            $nsistema = $flotaDestino->planetas["estrella"];
        }

        $coord['y'] = floor($nsistema / $anchoUniverso) * 10;
        $coord['x'] = ($nsistema - floor($nsistema / $anchoUniverso) * $anchoUniverso) * $luzdemallauniverso;

        return $coord;
    }

    public static function existeSistema($estrella)
    {
        if (strlen($estrella) < 7  && is_numeric($estrella)) { //destino es planeta
            $planeta = Planetas::where([['estrella', $estrella]])->first();
            if ($planeta == null) {
                return false;
            }
            return true;
        } else {  //es flota
            return true;
        }
    }

    public static function destinoTipoId($destino, $destinosDest)
    {
        $planetas_id = null;
        $errores = "";

        try {
            if ($destinosDest['en_vuelo_id'] == null && $destinosDest['en_recoleccion_id'] == null && $destinosDest['en_orbita_id'] == null && $destinosDest['orbita'] != null) { //destino es planeta

                $planeta = Planetas::where('estrella', $destinosDest['estrella'])->where('orbita', $destinosDest['orbita'])->first();
                if ($planeta != null) {
                    $planetas_id = $planeta->id;
                } else {
                    if (!$destinosDest['orbita']) {
                        $errores = "No existe planeta destino " . $destinosDest['estrella'] . "x" . $destinosDest['orbita'];
                        //Log::info($errores);
                        throw new \Exception($errores);
                    } else {
                        $destino->en_orbita_id = $destinosDest['en_orbita_id'];
                        $destino->estrella = $destinosDest['estrella'];
                        $destino->orbita = $destinosDest['orbita'];
                        return [$destino, $errores];
                    }
                }
            } else { //destino flota

                if ($destinosDest['en_vuelo_id'] == null && $destinosDest['en_recoleccion_id'] == null && $destinosDest['en_orbita_id'] == null) {
                    $errores = "No existe flota destino " . $destinosDest['estrella'];
                    throw new \Exception($errores);
                }
            }

            $destino->planetas_id = $planetas_id;
            $destino->en_vuelo_id = $destinosDest['en_vuelo_id'];
            $destino->en_orbita_id = $destinosDest['en_orbita_id'];
            $destino->en_recoleccion_id = $destinosDest['en_recoleccion_id'];
            $destino->estrella = $destinosDest['estrella'];;
            $destino->orbita = $destinosDest['orbita'];
        } catch (\Exception $e) {
            Log::info($e);
            // return [$destino,$e->getMessage()];
        }
        return [$destino, $errores];
    }

    public static function regresarFlota($nombreflota, $auto = false)
    {
        $errores = "";
        if ($auto) {
            $flotax = EnVuelo::where('publico', $nombreflota)->first();
        } else {
            $jugadoryAlianza = [];

            $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Log::info($jugadorActual);
            if ($jugadorActual['alianzas_id'] != null) {
                array_push($jugadoryAlianza, $jugadorActual->alianzas_id);
            }

            array_push($jugadoryAlianza, $jugadorActual->id);

            //Log::info("nombreflota: ".$nombreflota);

            $flotax = EnVuelo::where('publico', $nombreflota)->where('jugadores_id', $jugadoryAlianza)->first();
        }


        if ($flotax != null) {
            try {
                $ajusteMapaBase = 35; //ajuste 0,0 con mapa
                $ajusteMapaFactor = 7; //ajuste escala mapa

                DB::beginTransaction();

                $ahora = date("Y-m-d H:i:s");
                $puntoFlota = PuntosEnFlota::where('fin', '>', $ahora)
                    ->where('en_vuelo_id', $flotax->id)
                    ->orderBy('fin', 'asc')
                    ->first();

                //Log::info("vfvf ".$flotax->id);
                //nuscamos destinoa actual
                //$destinosO=$flotax->destinos;
                $destino = Destinos::where("visitado", 0)
                    ->where('flota_id', $flotax->id)
                    ->orderBy('id', 'asc')
                    ->first();
                //Log::info("destino: ".$destino);

                if ($destino == null) {
                    $errores = "No se encuentra el destino actual";
                } else if ($destino->mision_regreso != null) {
                    //se borran los viejos
                    PuntosEnFlota::where('en_vuelo_id', $flotax->id)->delete();
                    //Log::info("Borrando destinos sobrantes: ".$flotax->id." ".$destino->id);
                    Destinos::where('flota_id', $flotax->id)
                        ->where("id", ">", $destino->id)->delete();

                    $constantesU = Constantes::where('tipo', 'universo')->get();
                    $tiempoPuntosFlotas = $constantesU->where('codigo', 'tiempoPuntosFlotas')->first()->valor;

                    $Tinit = $ahora;
                    $initestrella = $destino->initestrella;
                    $initorbita = $destino->initorbita;
                    $duracion = strtotime($Tinit) - strtotime($destino['init']);

                    $add_time = strtotime($Tinit) + $duracion;
                    $Tfin = date('Y-m-d H:i:s', $add_time);

                    //Log::info("duración: ".$duracion." Tinit: ".$Tinit." destino init: ".$destino['init']." Tfin: ".$Tfin);
                    $destinoAnt = Destinos::where([["fin", $destino->init], ["flota_id", $destino->flota_id]])->first();

                    $destino->porcentVel = "100";
                    $destino->mision = $destino->mision_regreso;
                    $destino->mision_regreso = null;
                    $destino->initestrella = $destino->estrella;
                    $destino->initorbita = $destino->orbita;
                    $destino->estrella = $initestrella;
                    $destino->orbita = $initorbita;
                    $destino->fincoordx = $destino->initcoordx;
                    $destino->fincoordy = $destino->initcoordy;
                    if (!isEmpty($puntoFlota)) {
                        $destino->initcoordx = $puntoFlota->coordx;
                        $destino->initcoordy = $puntoFlota->coordy;
                    }

                    //$destino->init = $Tinit;  //para que los mensajes se mantengan
                    $destino->fin = $Tfin;
                    $destino->flota_id = $flotax->id;
                    //si el destino anterior era salida de mi planeta, pues regreso a él

                    // Log::info("INIT " . $destino->init);

                    $result = Flotas::destinoTipoId($destino, $destino);
                    $destino = $result[0];
                    $errores = $result[1];
                    if (strlen($errores) > 3) {
                        Log::info("coso" . $errores);
                        throw new \Exception($errores);
                    }

                    if ($destinoAnt != null && $destinoAnt->mision == "Salida" && $destinoAnt->planetas_id != null) {
                        $destino->planetas_id = $destinoAnt->planetas_id;
                    }

                    $destino->save();

                    // Log::info("destino final: " . $destino);

                    $vectorx = ($destino->fincoordx - $destino->initcoordx) / $duracion;
                    $vectory = ($destino->fincoordy - $destino->initcoordy) / $duracion;

                    for ($tiempoPto = 0; $tiempoPto < $duracion / $tiempoPuntosFlotas; $tiempoPto++) {

                        $add_time = strtotime($Tinit) + ($tiempoPto * $tiempoPuntosFlotas);
                        $TfinPto = date('Y-m-d H:i:s', $add_time);

                        $puntoFlota = new PuntosEnFlota();
                        $puntoFlota->coordx = $destino->initcoordx + $vectorx * ($tiempoPto * $tiempoPuntosFlotas);
                        $puntoFlota->coordy = $destino->initcoordy + $vectory * ($tiempoPto * $tiempoPuntosFlotas);
                        $puntoFlota->fin = $TfinPto;
                        $puntoFlota->en_vuelo_id = $flotax->id;
                        $puntoFlota->jugadores_id = $flotax->jugadores_id;
                        //Log::info($puntoFlota);
                        $puntoFlota->save();
                    }
                    //ultimo punto siempre va
                    $puntoFlota = new PuntosEnFlota();
                    $puntoFlota->coordx = $destino->fincoordx;
                    $puntoFlota->coordy = $destino->fincoordy;
                    $puntoFlota->fin = $Tfin;
                    $puntoFlota->en_vuelo_id = $flotax->id;
                    $puntoFlota->jugadores_id = $flotax->jugadores_id;
                    $puntoFlota->save();

                    DB::commit();
                    //Log::info("Regresando");

                } else {
                    $errores = "La flota ya viene de regreso o no existe destino de regreso";
                }
                // try {
            } catch (Exception $e) {
                DB::rollBack();
                Log::info("Error en Commit de cancelar flota " . $e->getLine() . " " . $nombreflota . " " . $e);
                $errores = "No ha sido posible";
            }
            //return redirect('/juego/flota');
        } else {
            $errores = ("No se encuentra la flota: " . $nombreflota);
        }
        //Log::info($errores);
        return compact('errores');
    }

    /*
los recuirsos realmente movidos se guardan en su destino
destino 0 con lo que sale

*/

    ///////////////  recepción de flotas   ///////////////////////////////////////////////////////////////

    public static function llegadaFlotas()
    {
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $anchoUniverso = $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        $ahora = date("Y-m-d H:i:s");

        //Log::info("listaDestinosEntrantes " . $listaDestinosEntrantes);

        try {
            DB::beginTransaction();
            $listaDestinosEntrantes = Destinos::where('fin', '<', $ahora)->where("visitado", "0")->orderBy("init", "desc")->lockForUpdate()->get();

            foreach ($listaDestinosEntrantes as $destino) {
                try {
                    $destinoAnterior = Destinos::destinoAnterior($destino);

                    //Log::info($destinoAnterior);

                    if ($destinoAnterior != null && $destinoAnterior['visitado'] == 0) {
                        //Log::info("destino anterior no ejecutado id=" . $destino['id']);
                        continue;
                    }

                    $tipodestino = Astrometria::tipoDestino($destino);
                    $destinoEsMio = false;
                    $destinoAlcanzado = false;
                    $cambioMision = false;
                    $guardarCambios = false;
                    $guardarCambiosTransferir = false;
                    $guardarCambiosColonizacion = false;
                    $errores = "";
                    $mensaje = "";

                    if ($destino->flota != null) {
                        $estaFlota = $destino->flota;
                    } else if ($destino->enRecoleccion != null) {
                        $estaFlota = $destino->enRecoleccion;
                    } else if ($destino->enOrbita != null) {
                        $estaFlota = $destino->enOrbita;
                    }

                    // Log::info($destino."flota XXX".$estaFlota);
                    $recursosFlota = $estaFlota->recursosEnFlota;
                    $recursosQuieroCargar = $destino->recursos;
                    //Log::info($recursosQuieroCargar);
                    //$recursosDestino = new RecursosEnFlota();
                    $prioridadesDestino = $destino->prioridades;

                    //Log::info("destino ".$destino." tipodestino ".$tipodestino);
                    //Log::info("mision: ".$destino->mision);

                    switch ($destino->mision) {
                        case "Transportar":
                            $personalOcupado = 0;
                            switch ($tipodestino) {
                                case "planeta":
                                    //Log::info("planeta destino".$destino->planeta);

                                    if ($destino->planetas->jugadores_id != null) {
                                        //actualizamos sus recursos
                                        //Log::info("planeta".$destino->planeta->id);
                                        $personalOcupado = Recursos::calcularRecursos($destino->planetas->id);
                                        $recursosDestino = $destino->planetas->recursos;
                                        $destinoEsMio = Alianzas::idSoyYoOMiAlianza($estaFlota->jugadores_id, $destino->planetas->jugadores_id);

                                        //Log::info("recursosDestino ".$recursosDestino." destinoEsMio ".$destinoEsMio);
                                    } else {
                                        $destinoAlcanzado = true;
                                        $errores = "El planeta al que transportar carece de dueño ";
                                        break 2;
                                    }

                                    break;
                                case "enrecoleccion":
                                    //actualizamos sus recursos
                                    //Log::info("frecolect ".$destino->enRecoleccion->planetas);
                                    Flotas::recolectarAsteroide($destino->enRecoleccion->planetas, null, $estaFlota->jugadores_id);
                                    $recursosDestino = $destino->enRecoleccion->recursosEnFlota;
                                    $destinoEsMio = Alianzas::idSoyYoOMiAlianza($estaFlota->jugadores_id, $destino->enRecoleccion->jugadores_id);
                                    break;
                                case "enorbita":
                                    $recursosDestino = $destino->enOrbita->recursosEnFlota;
                                    $destinoEsMio = Alianzas::idSoyYoOMiAlianza($estaFlota->jugadores_id, $destino->enOrbita->jugadores_id);
                                    break;
                                case "enextraccion":
                                    Flotas::recolectarAsteroide($destino->enRecoleccion->planetas, null, $estaFlota->jugadores_id);
                                    $recursosDestino = $destino->enRecoleccion->recursosEnFlota;
                                    $destinoEsMio = Alianzas::idSoyYoOMiAlianza($estaFlota->jugadores_id, $destino->enRecoleccion->jugadores_id);
                                    break;
                                    break;
                                case "envuelo":
                                    $destinoAlcanzado = true;
                                    $errores = "No se puede transportar a una flota en vuelo ";
                                    break 2;
                            }

                            //Log::info($tipodestino."recursosDestino ".$recursosDestino);
                            //Log::info("recursosDestino");Log::info($recursosDestino);
                            //Log::info("recursosFlota");Log::info($recursosFlota);

                            //Log::info("estaFlota ".$estaFlota." diseños".$estaFlota->diseniosEnFlota);
                            //calcular capacidad carga
                            $cargaMaxima = Disenios::cargaTotal($estaFlota->diseniosEnFlota);
                            $cargaTotalLLevo = Disenios::cargaTotalRecursos($recursosFlota);

                            //Log::info("cargaTotalLLevo ".$cargaTotalLLevo."  cargaMaxima ".$cargaMaxima. " recursosQuieroCargar ".$recursosQuieroCargar);
                            // carga total que llevo ahora

                            //primero cantiddaes, luego prioridades (solo si es tuyo)

                            // traspaso de recursos por cantidad
                            foreach ($recursosArray as $recurso) {

                                $difCarga = $recursosFlota[$recurso] - $recursosQuieroCargar[$recurso]; //si es <1 me llevo cosas
                                //Log::info($destinoEsMio." difCarga ".$difCarga);

                                if ($difCarga < 0 && $destinoEsMio != 1) { // si no es mio no me llevo nada
                                    $difCarga = 0;
                                    //Log::info("0- difcarga borrada");
                                }

                                if ($recurso == "personal") { //si hay gente construyendo no me la llevo
                                    $recursosDestino[$recurso] -= $personalOcupado;
                                    // Log::info(" personal: ".$recursosDestino[$recurso]);
                                }

                                if ($difCarga < 0 && $destinoEsMio == 1 && $recursosDestino[$recurso] < -1 * $difCarga) { //no me llevo mas de lo que hay
                                    $difCarga = $recursosDestino[$recurso];
                                    //Log::info("1- difCarga ".$difCarga);
                                }

                                if ($difCarga > 0 && $recursosFlota[$recurso] < $difCarga) { //no dejo mas de lo que llevo
                                    $difCarga = $recursosFlota[$recurso];
                                    //Log::info("2- difCarga ".$difCarga);
                                }

                                if ($difCarga < 0 && $destinoEsMio == 1 && $cargaTotalLLevo + $difCarga > $cargaMaxima) {  //no cargo mas de mi capacidad
                                    $difCarga = $cargaMaxima - $cargaTotalLLevo;
                                    //Log::info("3- difCarga ".$difCarga);
                                }

                                if ($difCarga != 0) { //se hace el traspaso
                                    $recursosFlota[$recurso] -= $difCarga;
                                    $recursosDestino[$recurso] += $difCarga;
                                    $guardarCambios = true;
                                    //Log::info("CARGA difCarga ".$difCarga." recursosQuieroCargar ".$recursosQuieroCargar[$recurso]."  recursosFlota[recurso] ".$recursosFlota[$recurso]."  recursosDestino[recurso] ".$recursosDestino[$recurso]);
                                }
                            }

                            $cargaTotalLLevo = 0;
                            foreach ($recursosArray as $recurso) {
                                $cargaTotalLLevo += $recursosFlota[$recurso];
                            }
                            //Log::info("recursosFlota2");Log::info($recursosFlota);
                            //Log::info($destinoEsMio . "prioridad " . $prioridadesDestino);
                            //carga por prioridades
                            if ($destinoEsMio == 1) {
                                for ($ordinal = 1; $ordinal < 16; $ordinal++) {
                                    foreach ($recursosArray as $recurso) {
                                        //Log::info($ordinal."-prioridad ".$recurso." ".$prioridadesDestino[$recurso]);
                                        if ($prioridadesDestino[$recurso] == $ordinal) {
                                            $difCarga = $recursosDestino[$recurso];

                                            //Log::info("cargas prior " . $difCarga . " cargaTotalLLevo " . $cargaTotalLLevo . " cargaMaxima " . $cargaMaxima);
                                            if ($cargaTotalLLevo + $difCarga > $cargaMaxima) {  //no cargo mas de mi capacidad
                                                $difCarga = Round($cargaMaxima - $cargaTotalLLevo);
                                                //Log::info(" difCarga ".$difCarga);
                                                //Log::info("PRIORIDADES difCarga " . $difCarga . " " . $recurso . "  recursosFlota[recurso] " . $recursosFlota[$recurso] . "  recursosDestino[recurso] " . $recursosDestino[$recurso]);
                                            }
                                            $recursosFlota[$recurso] += $difCarga;
                                            $recursosDestino[$recurso] -= $difCarga;
                                            $cargaTotalLLevo += $difCarga;
                                            $guardarCambios = true;
                                            //Log::info("CARGA difCarga ".$difCarga." recursosQuieroCargar ".$recursosQuieroCargar[$recurso]."  recursosFlota[recurso] ".$recursosFlota[$recurso]."  recursosDestino[recurso] ".$recursosDestino[$recurso]);
                                        }
                                    }
                                }
                            }
                            $recursosDestino["personal"] += $personalOcupado;
                            $destinoAlcanzado = true;
                            break;
                        case "Transferir":
                            //si los ids de todos los destinos es nulo es orbitar el planeta

                            switch ($tipodestino) {
                                case "planeta":
                                    if (!empty($destino->planetas)) {
                                        $personalOcupado = Recursos::calcularRecursos($destino->planetas->id);
                                        // entrego recursos
                                        $recursosDestino = $destino->planetas->recursos;
                                        foreach ($recursosArray as $recurso) {
                                            $recursosDestino[$recurso] += $recursosFlota[$recurso];
                                        }
                                        $guardarCambiosTransferir = true;
                                    } else {
                                        $cambioMision = true;
                                        $destino['mision'] = "Orbitar";
                                        $destino['planetas_id'] = null;
                                        $destino['en_vuelo_id'] = null;
                                        $destino['en_recoleccion_id'] = null;
                                        $destino['en_orbita_id'] = null;
                                        $errores = "No se ha podido encontrar el destino al que transferir ";
                                    }

                                    break;
                                case "enrecoleccion":
                                    $cambioMision = true;
                                    $destino['mision'] = "Recolectar";
                                    $destino['planetas_id'] = null;
                                    $destino['en_vuelo_id'] = null;
                                    $destino['en_recoleccion_id'] = null;
                                    $destino['en_orbita_id'] = null;
                                    break;
                                case "enorbita":
                                case "envuelo":
                                    $cambioMision = true;
                                    $destino['mision'] = "Orbitar";
                                    $destino['planetas_id'] = null;
                                    $destino['en_vuelo_id'] = null;
                                    $destino['en_recoleccion_id'] = null;
                                    $destino['en_orbita_id'] = null;
                                    break;
                            }
                            break;
                        case "Colonizar":

                            //valorar la constante piminimoscolonizar
                            $piminimoscolonizar = Constantes::where('codigo', 'piminimoscolonizar')->first()->valor;
                            $adminImperioPuntos = Constantes::where('codigo', 'adminImperioPuntos')->first()->valor;

                            $nivelImperio = Investigaciones::where([['codigo', 'invImperio'], ["jugadores_id", $estaFlota->jugadores_id]])->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
                            $consImperio = Constantes::where('codigo', 'adminImperioPuntos')->first()->valor;
                            $puntosIMperioLibres = $nivelImperio * $consImperio + 10 - count($estaFlota->jugadores->planetas) * 10;
                            //Log::info("puntosIMperioLibres ".$puntosIMperioLibres);
                            $hayerror = false;
                            if (empty($destino->planetas)) {
                                $errores .= " No se encuentra el planeta";
                                $hayerror = true;
                            }
                            if (!$hayerror && ($puntosIMperioLibres - $adminImperioPuntos) < $piminimoscolonizar) {
                                $errores = " Insuficientes puntos de imperio para colonizar ";
                                $hayerror = true;
                            }
                            if (!$hayerror && !empty($destino->planetas->jugadoes_id)) {
                                $errores .= " El planeta a colonizar ya tiene dueño ";
                                $hayerror = true;
                            }
                            if (!$hayerror && !Astrometria::colonizarZonaPosible($destino->planetas->id)) {
                                $errores .= "El planeta a colonizar está en el rango de colonización de otro jugador ";
                                $hayerror = true;
                            }
                            if (!$hayerror && $tipodestino != "planeta") {
                                $errores .= "Sólo se pueden colonizar cuerpos tipo planeta ";
                                $hayerror = true;
                            }
                            if (!$hayerror) {
                                $flotaExtrayendo = EnRecoleccion::where("planetas_id", $destino->planetas->id)->first();
                                if ($flotaExtrayendo != null) {
                                    $errores .= "El planeta no es habitable, flota en extracción ";
                                    $hayerror = true;
                                }
                            }


                            if (!$hayerror) {
                                $guardarCambiosColonizacion = true;
                            } else {
                                $destinoAlcanzado = true;
                            }

                            //Log::info("destinoAlcanzado ".$destinoAlcanzado." ".$guardarCambiosColonizacion." errores: ".$errores);
                            break;
                        case "Recolectar":
                            $puedoRecolectar = false;
                            if ($destino->planetas != null && $destino->planetas->tipo == "asteroide") {
                                $puedoRecolectar = true;
                            } else if ($destino->enRecoleccion != null) { //destino es una flota que ya esta recolectando
                                $puedoRecolectar = true;
                            }
                            if ($puedoRecolectar) {
                                $errores = Flotas::flotaARecolectarOrbitar($estaFlota, $destino, $anchoUniverso, $luzdemallauniverso, "recolectar");
                                if (strlen($errores) < 4) {
                                    $destinoAlcanzado = true;
                                }
                            } else {
                                $destinoAlcanzado = true;
                                $errores = "Sólo se pueden recolectar cuerpos tipo asteroide ";
                            }
                            break;
                        case "Orbitar":
                            $errores = Flotas::flotaARecolectarOrbitar($estaFlota, $destino, $anchoUniverso, $luzdemallauniverso, "orbitar");
                            if (strlen($errores) < 4) {
                                $destinoAlcanzado = true;
                            }
                            break;
                        case "Extraer":
                            $puedoRecolectar = false;
                            //Log::info($destino->planetas);
                            if ($destino->planetas != null && $destino->planetas->tipo == "planeta" && $destino->planetas->jugadores_id == null) {
                                $puedoRecolectar = true;
                            } else if ($destino->enRecoleccion != null) { //destino es una flota que ya esta recolectando
                                $puedoRecolectar = true;
                            }

                            if ($puedoRecolectar) {
                                $errores = Flotas::flotaARecolectarOrbitar($estaFlota, $destino, $anchoUniverso, $luzdemallauniverso, "extraer");
                                if (strlen($errores) < 4) {
                                    $destinoAlcanzado = true;
                                }
                            } else {
                                //$destinoAlcanzado = true;
                                $errores = "Sólo se pueden recolectar cuerpos tipo asteroide ";
                                Flotas::regresarFlota($estaFlota->publico, true);
                            }
                            break;
                    }
                    //try {
                    //Log::info("guardar destinoAlcanzado: ".$destinoAlcanzado." guardarCambios ".$guardarCambios);
                    // Log::info($recursosFlota);Log::info($recursosDestino);
                    if ($guardarCambios) {
                        $recursosFlota->save();
                        $recursosDestino->save();
                        $destinoAlcanzado = true;
                        $recursosEnDestino = Flotas::recursosADestino($recursosFlota, $destino->recursos);
                        $recursosEnDestino->save();
                        //Log::info("recursos result ");Log::info($recursosFlota);Log::info($recursosDestino);
                    }

                    if ($guardarCambiosTransferir) {
                        $recursosDestino->save();
                        //Log::info("Entregando Naves: ");
                        foreach ($estaFlota->diseniosEnFlota as $diseno) {
                            $cuantas = $diseno['enFlota'] + $diseno['enHangar'];
                            //Log::info("cuantas= ".$cuantas);
                            DiseniosEnFlota::updateOrCreate([
                                'disenios_id'   => $diseno->disenios->id,
                                'planetas_id'   => $destino->planetas->id
                            ], [
                                'cantidad'     => DB::raw("cantidad+" . $cuantas),
                                'tipo'          => 'nave',
                                'disenios_id'   => $diseno->disenios->id,
                                'planetas_id'   => $destino->planetas->id,
                                "en_vuelo_id"   => null
                            ]);
                        }
                        $estaFlota->delete();
                        $destinoAlcanzado = true;
                    }


                    if ($guardarCambiosColonizacion) {
                        //Log::info($destino->planetas);
                        $planetaColonizar = $destino->planetas;
                        $planetaColonizar['jugadores_id'] = $estaFlota->jugadores_id;
                        $planetaColonizar['nombre'] = "Nueva Colonia";
                        $planetaColonizar['creacion'] = time();
                        $planetaColonizar->save();
                        //Log::info("hecho ");

                        Recursos::initRecursos($destino->planetas->id);

                        $recursosDestino = $destino->planetas->recursos;
                        foreach ($recursosArray as $recurso) {
                            $difCarga = $recursosFlota[$recurso] - $recursosQuieroCargar[$recurso]; //si es <1 me llevo cosas

                            if ($difCarga < 0) {
                                $difCarga = 0;
                            }

                            if ($difCarga > 0 && $recursosFlota[$recurso] < $difCarga) { //no dejo mas de lo que llevo
                                $difCarga = $recursosFlota[$recurso];
                            }

                            if ($difCarga != 0) { //se hace el traspaso
                                $recursosFlota[$recurso] -= $difCarga;
                                $recursosDestino[$recurso] += $difCarga;
                            }
                        }
                        $recursosFlota->save();
                        $recursosDestino->save();
                        $destinoAlcanzado = true;
                    }


                    if ($cambioMision) {
                        $destino->save();
                    }

                    if ($destinoAlcanzado) {
                        //Log::info("visitado ".$destino);
                        $destino['visitado'] = 1;
                        $destino->save();
                    }
                    Log::info($errores);
                    Mensajes::enviarMensajeFlota($destino);
                } catch (Exception $e) {
                    DB::rollBack();
                    $errores = "Error en Commit recepción de flotas " . $e->getLine() . " " . $errores; //.$e;
                    Log::info($errores . " " . $e);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $errores = "Error en Commit recepción de flotas " . $e->getLine() . " " . $errores; //.$e;
            Log::info($errores . " " . $e);
        }
    }

    public static function recursosADestino($recursosLlega, $recursosEnFlota)
    {
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        //Log::info($recursosEnFlota);Log::info($recursosLlega);
        foreach ($recursosArray as $recurso) {

            $recursosEnFlota[$recurso] = $recursosLlega[$recurso];
        }
        return $recursosEnFlota;
    }

    public static function flotaARecolectarOrbitar($flotaLlega, $destino, $anchoUniverso, $luzdemallauniverso, $quehacer)
    {
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        $errores = "";

        if (!empty($flotaLlega)) {

            try {
                $planeta = null;
                $ajusteMapaBase = 35; //ajuste 0,0 con mapa
                $ajusteMapaFactor = 7; //ajuste escala mapa
                if ($destino->planetas != null) {
                    $planeta = $destino->planetas;
                }

                //Log::info("quehacer: ".$quehacer);
                if ($quehacer == "recolectar" || $quehacer == "extraer") {
                    //si ya existe una flota en recolección
                    if ($planeta == null) {
                        $planeta = Planetas::where("estrella", $destino->estrella)->where("orbita", $destino->orbita)->first();
                    }
                    //Log::info("s ".$destino->estrella." o " .$destino->orbita." p ".$planeta  );
                    $flotaExiste = EnRecoleccion::where("jugadores_id", $flotaLlega->jugadores_id)
                        ->where("planetas_id", $planeta->id)->first();

                    if ($flotaExiste != null) {
                        Flotas::recolectarAsteroide($planeta, $flotaExiste, null);
                    }
                    //Log::info("quehacer1 ".$quehacer);
                    if ($quehacer == "recolectar") {
                        $recoleccionT = Disenios::recoleccionTotal($flotaLlega->diseniosEnFlota);
                    } else {
                        $recoleccionT = Disenios::extraccionTotal($flotaLlega->diseniosEnFlota);
                    }
                    $columnNaves = "en_recoleccion_id";
                } else {
                    $flotaExiste = EnOrbita::where("jugadores_id", $flotaLlega->jugadores_id)
                        ->where("estrella", $destino->estrella)->where("orbita", $destino->orbita)->first();
                    $columnNaves = "en_orbita_id";
                    if ($planeta == null) {
                        $planeta = new \stdClass();
                        $planeta->estrella = $destino->estrella;
                        $planeta->orbita = $destino->orbita;
                        $planeta->id = null;
                    }
                    //Log::info($flotaExiste);
                }

                //Log::info($planeta->id . "jugador id " . $flotaLlega->jugadores_id . " flotaExiste " . $flotaExiste);
                //construyendo flota
                //$timestamp = (int) round(now()->format('Uu') / pow(10, 6 - 3));
                DB::beginTransaction();
                if (!empty($flotaExiste)) {

                    $flotaExiste->ataqueReal += $flotaLlega['ataqueReal'];
                    $flotaExiste->defensaReal += $flotaLlega['defensaReal'];
                    $flotaExiste->ataqueVisible += $flotaLlega['ataqueVisible'];
                    $flotaExiste->defensaVisible += $flotaLlega['defensaVisible'];
                    $flotaExiste->creditos += $flotaLlega['creditos'];

                    if ($quehacer == "recolectar" || $quehacer == "extraer") {
                        $flotaExiste->recoleccion = $recoleccionT;
                    }
                    $flotaExiste->save();
                } else {
                    $coordDestino = Flotas::coordenadasBySistema($planeta->estrella, $anchoUniverso, $luzdemallauniverso);
                    $coordDestx = $ajusteMapaFactor  * $coordDestino['x'] + $ajusteMapaBase;
                    $coordDesty = $ajusteMapaFactor  * $coordDestino['y'] + $ajusteMapaBase;

                    if ($quehacer == "recolectar" || $quehacer == "extraer") {
                        $flotax = new EnRecoleccion();
                    } else {
                        $flotax = new EnOrbita();
                    }
                    $flotax->nombre = $flotaLlega['nombre'];
                    $flotax->publico = $flotaLlega['publico'];
                    $flotax->ataqueReal = $flotaLlega['ataqueReal'];
                    $flotax->defensaReal = $flotaLlega['defensaReal'];
                    $flotax->ataqueVisible = $flotaLlega['ataqueVisible'];
                    $flotax->defensaVisible = $flotaLlega['defensaVisible'];
                    $flotax->creditos = $flotaLlega['creditos'];
                    $flotax->jugadores_id = $flotaLlega->jugadores_id;
                    $flotax->coordx = $coordDestx;
                    $flotax->coordy = $coordDesty;
                    if ($planeta->id != null) {
                        $flotax->planetas_id = $planeta->id;
                    }


                    if ($quehacer == "recolectar" || $quehacer == "extraer") {
                        $flotax->recoleccion = $recoleccionT;
                    } else {
                        $flotax->estrella = $planeta->estrella;
                        $flotax->orbita = $planeta->orbita;
                    }
                    $flotax->save();

                    PrioridadesEnFlota::updateOrCreate([
                        'destinos_id'   => $destino->id,
                    ], [
                        "en_recoleccion:id"   => $flotax->id,
                        "destinos_id"   => null
                    ]);

                    //Log::info($flotax);Log::info(" hh ");
                }
                //Log::info($flotax);Log::info(" hh ");

                // naves a flota
                if ($flotaExiste != null) {
                    foreach ($flotaLlega->diseniosEnFlota as $diseno) {
                        DiseniosEnFlota::updateOrCreate([
                            'disenios_id'   => $diseno->disenios->id,
                            $columnNaves   => $flotaExiste->id,
                        ], [
                            'enFlota'     => DB::raw("enFlota+" . $diseno['enFlota']),
                            'enHangar'     => DB::raw("enHangar+" . $diseno['enHangar']),
                            'tipo'          => 'nave',
                            'disenios_id'   => $diseno->disenios->id,
                            $columnNaves   => $flotaExiste->id,
                            "en_vuelo_id"   => null
                        ]);
                    }
                } else {
                    //Log::info($flotaLlega->id);  Log::info($flotax->id); Log::info($columnNaves);
                    DiseniosEnFlota::updateOrCreate([
                        'en_vuelo_id'   => $flotaLlega->id,
                    ], [
                        $columnNaves   => $flotax->id,
                        "en_vuelo_id"   => null
                    ]);
                    // DiseniosEnFlota::where("en_vuelo_id", $flotaLlega->id)->update(["en_recoleccion_id" =>  DB::raw($flotax->id), "en_vuelo_id" => DB::raw('null')]);


                    PrioridadesEnFlota::updateOrCreate([
                        'destinos_id'   => $flotaLlega->id,
                    ], [
                        $columnNaves   => $flotax->id,
                        "destinos_id"   => null
                    ]);
                }

                //recursos
                if ($flotaExiste != null) {
                    $recursosLlega = $flotaLlega->recursosEnFlota;
                    $recursosExiste = $flotaExiste->recursosEnFlota;

                    foreach ($recursosArray as $recurso) {
                        //Log::info("recursos ".$recursosExiste[$recurso]." ".$recursosLlega[$recurso]);
                        $recursosExiste[$recurso] += $recursosLlega[$recurso];
                        //Log::info("recursos ".$recursosExiste[$recurso]." ".$recursosLlega[$recurso]);
                    }
                    $recursosExiste->save();
                } else {
                    RecursosEnFlota::updateOrCreate([
                        'en_vuelo_id'   => $flotaLlega->id,
                    ], [
                        $columnNaves   => $flotax->id,
                        "en_vuelo_id"   => null
                    ]);
                }

                $flotaLlega->delete();
                //try {
                DB::commit();
                //Log::info("Enviada");
            } catch (Exception $e) {
                DB::rollBack();
                $errores = "Error en Commit de poner en " . $quehacer . " " . $e->getLine() . " " . $errores . $e;
                Log::info($errores . " " . $e);
            }
            return $errores;
        }
    }

    public static function recolectarAsteroide($planeta, $flotax = null, $jugadorid = null)
    {

        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        $errores = "";

        if ($flotax == null) {
            $flotax = EnRecoleccion::where("jugadores_id", $jugadorid)->where("planetas_id", $planeta->id)->first();
        }
        //Log::info("flotax ".$flotax);
        $recursosDestino = Producciones::produccionRecoleccion($planeta->id);
        $recursosFlota = $flotax->recursosEnFlota;
        $errores = "";
        $prioridadesDestino = $flotax->prioridadesEnFlota;
        // Log::info(" recursosDestino recolectados ".$recursosDestino." prioridadesEnFlota " . $flotax->prioridadesEnFlota);

        // Log::info(" capacidadRecoleccion " . $capacidadRecoleccion);
        $fechaInicio = strtotime($flotax->updated_at);
        $fechaFin = time();
        $fechaCalculo = ($fechaFin - $fechaInicio) / 3600;
        // Log::info(" fechaCalculo " . $fechaCalculo);
        //Log::info("quehacer2 ".$quehacer);
        $capacidadRecoleccion = 0;
        if ($planeta->tipo == "asteroide") {
            $capacidadRecoleccion = Disenios::recoleccionTotal($flotax->diseniosEnFlota) * $fechaCalculo;
        } else if ($planeta->tipo == "planeta") {
            $capacidadRecoleccion = Disenios::extraccionTotal($flotax->diseniosEnFlota) * $fechaCalculo;
        }

        for ($ordinal = 1; $ordinal < 16; $ordinal++) {
            foreach ($recursosArray as $recurso) {
                //Log::info("message");
                //Log::info($prioridadesDestino);
                //Log::info($ordinal."-prioridad ".$recurso." ".$prioridadesDestino[$recurso]);
                if ($prioridadesDestino[$recurso] == $ordinal) {
                    $extraido = 0;
                    $producido = $recursosDestino[$recurso] * $fechaCalculo;
                    //Log::info(" producido " . $producido);
                    //Log::info(" capacidadRecoleccion " . $capacidadRecoleccion);
                    if ($producido > $capacidadRecoleccion) {
                        $extraido = $capacidadRecoleccion;
                    } else {
                        $extraido = $producido;
                    }
                    $recursosFlota[$recurso] +=  $extraido;
                    $capacidadRecoleccion -= $extraido;

                    // Log::info(" extraido " . $extraido);
                }
            }
        }


        $flotax->updated_at = time();
        DB::beginTransaction();
        $recursosFlota->save();
        $flotax->save();
        DB::commit();

        try { // comprobar si tienes extraccion/recoleccion y si alguna prioridad es mayor a 0
        } catch (Exception $e) {
            DB::rollBack();
            $errores = "Error en Commit ejecutar recolección flota " . $e->getLine() . " " . $flotax->publico . "  lugar " . $planeta->sistema . "x" . $planeta->orbita . "  " . $errores; //.$e;
            Log::info($errores . " " . $e);
        }
        return $errores;
    }

    public static function ValoresDiseniosFlota($navesEstacionadas, $diseniosJugador, $navesEnPlaneta, $flotaid = null)
    {
        $disenios = [];
        $arraycolumn = array_column($navesEstacionadas, 'disenios_id');
        $errores = "";

        foreach ($diseniosJugador as $disenio) {

            $key = array_search($disenio->id, $arraycolumn);  //de los diseños
            if (false !== $key) {

                $nave = $navesEstacionadas[$key]; // enviar

                $enhangar = $nave['enhangar'];
                $enflota = $nave['enflota'];

                if ($enflota > 0 || $enhangar > 0) {

                    $naveP = $navesEnPlaneta->firstWhere('disenios_id', $nave['disenios_id']);

                    if ($flotaid == null) {
                        $cantidadEnOrigen = $naveP['cantidad'];
                    } else {
                        $cantidadEnOrigen = $naveP['enFlota'] + $naveP['enHangar'];
                    }

                    if ($naveP == null  || $cantidadEnOrigen < $enflota + $enhangar) {
                        $errores = "Mas naves a enviar de las que hay (" . $nave['disenios_id'] . ")" . $enflota . " " . $enhangar;
                        //Log::info($errores);
                        break;
                    }

                    $cantidad = $cantidadEnOrigen;

                    $disenio['enflota'] = $enflota;
                    $disenio['enhangar'] = $enhangar;

                    if ($flotaid == null) {
                        $disenio['cantidad'] = $cantidad;
                    } else {
                        $disenio['cantidad'] = 0;
                    }

                    array_push($disenios, $disenio);
                }
            }
        }

        return [$errores, $disenios];
    }

    public static function valoresVaciosFlotaController($planetaActual)
    {

        //prioridades
        $prioridadesXDefecto = new Prioridades();
        $prioridadesXDefecto->personal = 0;
        $prioridadesXDefecto->mineral = 0;
        $prioridadesXDefecto->cristal = 0;
        $prioridadesXDefecto->gas = 0;
        $prioridadesXDefecto->plastico = 0;
        $prioridadesXDefecto->ceramica = 0;
        $prioridadesXDefecto->liquido = 0;
        $prioridadesXDefecto->micros = 0;
        $prioridadesXDefecto->fuel = 0;
        $prioridadesXDefecto->ma = 0;
        $prioridadesXDefecto->municion = 0;
        $prioridadesXDefecto->creditos = 0;


        // recursos en destinos
        $recursosDestino = new RecursosEnFlota();
        $recursosDestino->personal = 0;
        $recursosDestino->mineral = 0;
        $recursosDestino->cristal = 0;
        $recursosDestino->gas = 0;
        $recursosDestino->plastico = 0;
        $recursosDestino->ceramica = 0;
        $recursosDestino->liquido = 0;
        $recursosDestino->micros = 0;
        $recursosDestino->fuel = 0;
        $recursosDestino->ma = 0;
        $recursosDestino->municion = 0;
        $recursosDestino->creditos = 0;

        $destino = new Destinos();
        $destino->estrella = -1;
        $destino->orbita = -1;
        $destino->porcentVel = 100;
        $destino->mision = "";

        $origen = new Destinos();
        $origen->estrella = $planetaActual->estrella;
        $origen->orbita = $planetaActual->orbita;
        $origen->porcentVel = 100;

        return [$prioridadesXDefecto, $recursosDestino, $destino, $origen];
    }

    public static function valoresDiseniosFlotaController($navesEstacionadas)
    {

        $diseniosJugador = [];
        foreach ($navesEstacionadas as $nave) {
            $nave->disenios->mejoras;
            $nave->disenios->tamanio = $nave->disenios->fuselajes->tamanio;

            array_push($diseniosJugador, $nave->disenios);
        }

        $idsDiseno = array();
        foreach ($navesEstacionadas as $diseno) {
            $estedisenioj = Disenios::where('id', $diseno->disenios->id)->first();

            array_push($idsDiseno, $diseno->disenios_id);
            $diseno->fuselajes_id = $estedisenioj->fuselajes_id;
            $diseno->skin = $estedisenioj->skin;
        }
        $ViewDaniosDisenios = ViewDaniosDisenios::whereIn('disenios_id', $idsDiseno)->get();
        //Log::info("message");Log::info($ViewDaniosDisenios);Log::info($idsDiseno);Log::info($navesEstacionadas);
        return [$diseniosJugador, $ViewDaniosDisenios];
    }

    public static function valoresEdicionFlotasController($jugadorActual, $tipoflota, $nombreflota)
    {

        $cargaDest = [];
        $prioridades = [];
        $destinos = [];
        $jugadoryAlianza = [];
        $navesEstacionadas = null;
        $recursosFlota = null;
        // Log::info($jugadorActual);
        if ($jugadorActual['alianzas_id'] != null) {
            array_push($jugadoryAlianza, Alianzas::jugadorAlianza($jugadorActual->alianzas_id)->id);
        }
        array_push($jugadoryAlianza, $jugadorActual->id);

        //Log::info($jugadoryAlianza);

        if ($tipoflota == "envuelo") {
            $flota = EnVuelo::whereIn('jugadores_id', $jugadoryAlianza)
                ->where('publico', $nombreflota)
                ->first();
            $misionAct = "Volando";
        } else if ($tipoflota == "enrecoleccion") {
            $flota = EnRecoleccion::whereIn('jugadores_id', $jugadoryAlianza)
                ->where('publico', $nombreflota)
                ->first();
            $misionAct = "Recolectando";
        } else if ($tipoflota == "enorbita") {
            $flota = EnOrbita::whereIn('jugadores_id', $jugadoryAlianza)
                ->where('publico', $nombreflota)
                ->first();
            $misionAct = "Orbitando";
        }

        if ($flota != null && !empty($flota)) { //editando flota en vuelo
            $visionXDefecto = false;
            $navesEstacionadas = $flota->diseniosEnFlota;
            $recursosFlota = $flota->recursosEnFlota;

            if ($tipoflota == "envuelo") {
                $destinosO = $flota->destinos;
                if (!empty($destinosO)) {
                    foreach ($destinosO as $destino) {
                        $recursosDestino = $destino->recursos;
                        array_push($cargaDest, $recursosDestino);

                        $prioridad = $destino->prioridades;
                        array_push($prioridades, $prioridad);

                        array_push($destinos, $destino);
                    }
                } else {
                    $visionXDefecto = true;
                }
            } else {
                $origen = new Destinos();
                if ($flota->planetas == null) {
                    $origen->estrella = $flota->estrella;
                    $origen->orbita = $flota->orbita;
                } else if ($flota->estrella != null) {
                    $origen->estrella = $flota->estrella;
                    $origen->orbita = $flota->orbita;
                } else {
                    $origen->estrella = $flota->planetas->estrella;
                    $origen->orbita = $flota->planetas->orbita;
                }

                $origen->porcentVel = 100;
                $origen->mision = $misionAct;
                $origen->tipoflota = $tipoflota;
                array_unshift($destinos, $origen);
                array_push($prioridades, $flota->prioridadesEnFlota);
                //Log::info($prioridades);
            }

            $flota['tipoflota'] = $tipoflota;

            //$cargaDest=$destinos[0]->recursos;
            //$prioridades=$destinos[0]->prioridades;

            //Log::info("flota: ".$flota);
            //Log::info("destinos: ".$destinos);
            //Log::info($cargaDest);
            //Log::info("prioridadDestino: ");Log::info($prioridades);
            //Log::info("recursos: ".$recursos);
        } else {
            $visionXDefecto = true;
        }

        //Log::info($cargaDest);

        return [$visionXDefecto, $destinos, $flota, $navesEstacionadas, $recursosFlota, $prioridades, $cargaDest];
    }
}
