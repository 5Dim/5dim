<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Flotas extends Model
{

    public static function calculoFlota($disenios,$valFlotaT,$destinos,$tablaHangares){ // calcula los valores de una flota

        //  Log::info($disenios);

        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
        $tamaniosNaveAcarga = array( 'caza'=> "cargaPequenia", 'ligera'=> "cargaMediana", 'media'=> "cargaGrande", 'pesada'=> "cargaEnorme", 'estacion'=> "cargaMega" );
        //$recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");


            //bucle por nave
            foreach($disenios as $disenio){
                //Log::info($disenio);

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

                forEach($tamaniosArray as $tamaniod){
                    $tablaHangares['capacidadH'][$tamaniod] += $atotal * $disenio[$tamaniod];
                };
                //Log::info($disenio);
                $tcarga = $tamaniosNaveAcarga[$disenio['tamanio']];
                $tablaHangares['dentroH'][$tcarga] += $ahangar;
                $tablaHangares['fueraH'][$tcarga] += $aflota;

                $tablaHangares['capacidadH']['cargaMega'] = 0; //siempre

                $valFlotaT['atotal']+=$atotal;
            }

            //Log::info("calculo flota");
            //Log::info($valFlotaT);
            $result=Flotas::calculoespaciotiempo($destinos,$valFlotaT);

            return [$result[1],$result[0],$tablaHangares];
    }


    public static function valoresValidos($cantidadDestinos,$cargaDest,$prioridades){
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");

        for ($dest = 1; $dest < $cantidadDestinos; $dest++) {
            foreach ($recursosArray as $recurso) {

                if (!is_numeric($cargaDest[$dest][$recurso])){
                    $cargaDest[$dest][$recurso]=0;
                }

                $prioridad=$prioridades[$dest][$recurso];
                if (is_numeric($prioridad)){
                    if ($prioridad <0){
                        $prioridades[$dest][$recurso]=0;
                    } else if ($prioridad >20){
                        $prioridades[$dest][$recurso]=20;
                    }
                } else {
                    $prioridades[$dest][$recurso]=0;
                }
            }
        }

        return [$cargaDest,$prioridades];
    }

    public static function validacionesFlota($destinos,$valFlotaT,$errores,$tablaHangares,$recursos,$cargaDest,$cantidadDestinos){ // calcula los valores de una flota

        // destinos
        $destinosViables=0;
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        $cargaDestT=0;

        for ($dest = 1; $dest < $cantidadDestinos; $dest++) {
            //destino viable
            if (!$destinos[$dest]['viable']){
                $errores=" Destino no viable= ".$dest;
            }
            //misiones
            $destAnt = $dest - 1;
            $destPost = $dest + 1;

            //Log::info($destinos[$dest]);
            if (isset ($destinos[$dest]['mision']) && strlen($errores)<1){

                $destinosViables++;
                $orden = $destinos[$dest]['mision'];

                if ($orden != "") {

                    $ordenAnt = $destinos[$destAnt]['mision'];
                    $ordenPost = $destinos[$destPost]['mision'];
                    // no se puede llegar

                    if ($ordenAnt == "" || $ordenAnt == "transferir" || $ordenAnt == "recolectar" || $ordenAnt == "orbitar" || $ordenAnt == "extraer") {
                        $errores = " No se alcanzará destino " . $dest;
                    }

                    // soy la ultima y debe ser de cierre
                    if ($ordenPost=="" && $orden != "transferir" && $orden != "recolectar" && $orden != "orbitar" || $ordenAnt == "extraer") {
                        $errores = " la misión del último destino no es transferir, orbitar,extraer o recolectar";
                    }

                    if ($cantidadDestinos == $destPost) {
                        if ($orden != "transferir" && $orden != "recolectar" && $orden != "orbitar" || $ordenAnt == "extraer") {
                            $errores = " la misión del último destino no es transferir, orbitar,extraer o recolectar";
                        }
                    }

                    foreach ($recursosArray as $recurso) {
                       $cargaDestT+=1 * $cargaDest[$dest][$recurso];
                    }

                    if ($destinos[$dest]['tiempoDest']<1 || $destinos[$dest]['fuelDest']<1){
                        $errores = " tiempo o fuel no puede ser 0 a destino ".$dest;
                    }

                    if ($destinos[$dest]['porcentVel'] <0 ||  $destinos[$dest]['porcentVel']>100 ){
                        $errores = " porcentaje de velocidad fuera de rango en destino ".$dest;
                    }
                }
            }


            // Carga total
            if (strlen($errores)<1 && $cargaDestT > 1* $valFlotaT['carga']) {
                $errores = " Seleccionada mas carga de la capacidad";
            }

            /// Carga en origen
            if (strlen($errores)<1 &&  $dest==1){
                if ($recursos->personal < $cargaDest[$dest]['personal']){
                    $errores = " No hay tanta carga: personal destino ".[$dest];
                }
                if ($recursos->mineral < $cargaDest[$dest]['mineral']){
                    $errores = " No hay tanta carga: mineral destino ".[$dest];
                }
                if ($recursos->cristal < $cargaDest[$dest]['cristal']){
                    $errores = " No hay tanta carga: cristal destino ".[$dest];
                }
                if ($recursos->gas < $cargaDest[$dest]['gas']){
                    $errores = " No hay tanta carga: gas destino ".[$dest];
                }
                if ($recursos->plastico < $cargaDest[$dest]['plastico']){
                    $errores = " No hay tanta carga: plastico destino ".[$dest];
                }
                if ($recursos->ceramica < $cargaDest[$dest]['ceramica']){
                    $errores = " No hay tanta carga: ceramica destino ".[$dest];
                }
                if ($recursos->liquido < $cargaDest[$dest]['liquido']){
                    $errores = " No hay tanta carga: liquido destino ".[$dest];
                }
                if ($recursos->micros < $cargaDest[$dest]['micros']){
                    $errores = " No hay tanta carga: micros destino ".[$dest];
                }
                if ($recursos->fuel < $cargaDest[$dest]['fuel'] + $valFlotaT['fuel']){
                    $errores = " No hay tanto fuel destino ".[$dest];
                }
                if ($recursos->ma < $cargaDest[$dest]['ma']){
                    $errores = " No hay tanta carga: ma destino ".[$dest];
                }
                if ($recursos->municion < $cargaDest[$dest]['municion']){
                    $errores = " No hay tanta carga: municion";
                }
                if ($recursos->creditos < $cargaDest[$dest]['creditos']){
                    $errores = " No hay tanta carga: creditos";
                }
            }

        }

        if (strlen($errores)<1 && $destinosViables<1){
            $errores = " No hay destinos con misiones viables";
        }


        /// hangares
        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");

        foreach ($tamaniosArray as $tamanio) {
            if ($tablaHangares['dentroH'][$tamanio] > $tablaHangares['capacidadH'][$tamanio]) {
                $errores = "  Capacidad de hangar insuficiente";
            };
        }

        Log::info($errores);

        return $errores;

    }

    public static function calculoespaciotiempo($destinos,$valFlotaT) {
        $fuelDestT = 0;
        $constantesU = Constantes::where('tipo', 'universo')->get(); //Log::info($constantesU);
        $fueldistancia = $constantesU->where('codigo', 'fuelpordistancia')->first()->valor;
        $factortiempoviaje=$constantesU->where('codigo', 'factortiempoviaje')->first()->valor;

        for ($dest = 1; $dest < count($destinos); $dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            $destAnt = $dest - 1;
            $destinos[$dest]['viable']=true;
            $tiempoDest =0;
            $fuelDest=0;

            if (isset ($destinos[$dest]['mision']) &&  $destinos[$dest]['mision']!=""){
                $result = Flotas::distanciaUniverso($destinos[$destAnt], $destinos[$dest],$constantesU);
                $distancia=$result[0];
                $destinos[$dest]=$result[1];

                if ($distancia==0 || $destinos[$dest]['estrella'] == "") {
                    $destinos[$dest]['viable']=false;
                } else {
                    $porcentVel = $destinos[$dest]['porcentVel']/100;
                    $fuelDest = Flotas::gastoFuel($distancia, $valFlotaT['fuel'],$fueldistancia);
                    if ($distancia < 10) {
                        if ($valFlotaT['maniobra'] < 1) {
                            $destinos[$dest]['viable']=false;
                        } else {
                            $tiempoDest = Flotas::tiempoLLegada($distancia, $valFlotaT['maniobra'] * $porcentVel,$factortiempoviaje);
                        }
                    } else {
                        if ($valFlotaT['velocidad'] < 1) {
                            $destinos[$dest]['viable']=false;
                        } else {
                            $tiempoDest = Flotas::tiempoLLegada($distancia, $valFlotaT['velocidad'] * $porcentVel,$factortiempoviaje);
                        }
                    }
                }
            }
            $destinos[$dest]['tiempoDest']=$tiempoDest;
            $destinos[$dest]['fuelDest']=$fuelDest;
            $fuelDestT += $fuelDest;

        }
        $valFlotaT['fuelDestT']=$fuelDestT;

        return [$destinos,$valFlotaT];
    }



    public static function distanciaUniverso($origen, $destino,$constantesU) {
        $coordOrigen = [];
        $coordOrigen['x'] = 0;
        $coordOrigen['y'] = 0;
        $coordDestino = [];
        $coordDestino['x'] = 0;
        $coordDestino['y'] = 0;
        $factordistancia = 1;

        $anchoUniverso= $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso= $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;

        $dist = 0;

        if ($origen['estrella'] != "0" && $destino['estrella'] != "0" && $origen['orbita'] != "0" && $destino['orbita'] != "0") {
            if ($origen['estrella'] == $destino['estrella'] && $origen['orbita'] == $destino['orbita']) {
                //orbitar
                $factordistancia = $constantesU->where('codigo', 'distanciaorbita')->first()->valor;
                $coordDestino['x'] = 0.5;
            } else if ($origen['estrella'] == $destino['estrella']) {
                //mismo sistema
                $factordistancia = $constantesU->where('codigo', 'distanciaentreplanetas')->first()->valor;
                $coordOrigen['x'] = $origen['orbita'];
                $coordDestino['x'] = $destino['orbita'];
            } else {
                //entre sistemas
                $factordistancia = $constantesU->where('codigo', 'distanciaentresistemas')->first()->valor;

                $coordOrigen = Flotas::coordenadasBySistema($origen['estrella'],$anchoUniverso,$luzdemallauniverso);
                $coordDestino = Flotas::coordenadasBySistema($destino['estrella'],$anchoUniverso,$luzdemallauniverso);
            }
            //calculo coords para distancia
            $dist = $factordistancia * pow(($coordDestino['x'] - $coordOrigen['x']) * ($coordDestino['x'] - $coordOrigen['x']) + ($coordDestino['y'] - $coordOrigen['y']) * ($coordDestino['y'] - $coordOrigen['y']), 1 / 2);
        }
        //guardando coord para representar

        $coordDestino = Flotas::coordenadasBySistema($destino['estrella'],$anchoUniverso,$luzdemallauniverso);
        $destino['fincoordx']=$coordDestino['x'];
        $destino['fincoordy']=$coordDestino['y'];
        return [round($dist * 100) / 100,$destino];
    }


    public static function gastoFuel($distancia, $fuelbase,$fueldistancia) {
        return round($fueldistancia * $distancia * $fuelbase);
    }

    public static function tiempoLLegada($distancia, $velocidad,$factortiempoviaje) {
        if ($velocidad>0){
            return ($tiempo = round($distancia / $velocidad * $factortiempoviaje)); //en segundos
        }
        return 0;
    }

    public static function coordenadasBySistema($nsistema,$anchoUniverso,$luzdemallauniverso) {
        $coord = [];
        $coord['y'] = floor($nsistema / $anchoUniverso) * 10;
        $coord['x'] = ($nsistema - floor($nsistema / $anchoUniverso) * $anchoUniverso) * $luzdemallauniverso;

        return $coord;
    }

    public static function calculoVector(){


    }

}
