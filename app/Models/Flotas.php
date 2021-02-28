<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flotas extends Model
{

    public static function calculoFlota($disenios,$valFlotaT,$destinos,$tablaHangares){ // calcula los valores de una flota

        //  Log::info($disenios);

        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
        $tamaniosNaveAcarga = array( 'caza'=> "cargaPequenia", 'ligera'=> "cargaMediana", 'media'=> "cargaGrande", 'pesada'=> "cargaEnorme", 'estacion'=> "cargaMega" );
        //$recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");


            //bucle por nave
            foreach($disenios as $disenio){

                $aflota = $disenio['enflota'];
                $ahangar = $disenio['enhangar'];
                $atotal = $aflota + $ahangar;
               // $valFlotaT['extraccion'] += $disenios['extraccion']* $atotal;
               // $valFlotaT['recoleccion'] += $disenios['recoleccion']* $atotal;

               $valFlotaT['carga'] += $disenio['carga'] * $atotal;
               $valFlotaT['fuel'] += $disenio['fuel'] * $aflota;
               $valFlotaT['ataqueR'] += $disenio['ataque'] * $atotal;
               $valFlotaT['defensaR'] += $disenio['defensa'] * $atotal;
               $valFlotaT['ataqueV'] += $disenio['ataque'] * $aflota;
               $valFlotaT['defensaV'] += $disenio['defensa'] * $aflota;

                if ($aflota > 0) {
                    $valFlotaT['velocidad'] = min($disenio['velocidad'], $valFlotaT['velocidad']);
                    $valFlotaT['maniobra'] = min($disenio['maniobra'], $valFlotaT['maniobra']);
                }

                //hangares

                forEach($tamaniosArray as $tamaniod){
                    $tablaHangares['capacidadH'][$tamaniod] += $atotal * $disenio[$tamaniod];
                };

                $tcarga = $tamaniosNaveAcarga[$disenio['tamanio']];
                $tablaHangares['dentroH'][$tcarga] += $ahangar;
                $tablaHangares['fueraH'][$tcarga] += $aflota;

                $tablaHangares['capacidadH']['cargaMega'] = 0; //siempre

                $valFlotaT['atotal']+=$atotal;
            }

            Flotas::calculoespaciotiempo($destinos,$valFlotaT);
    }

    public static function validacionesFlota($destinos,$valFlotaT,$errores,$tablaHangares,$recursos){ // calcula los valores de una flota
        // destinos
        for ($dest = 1; $dest < count($destinos); $dest++) {
            //destino viable
            if (!$destinos[$dest]['viable']){
                $errores=" Destino no viable= ".$dest;
                break;
            }
            //misiones
            $destAnt = $dest - 1;
            $destPost = $dest + 1;

            $orden = $destinos[$dest]['mision'];

            if ($orden != "") {

                $ordenAnt = $destinos[$destAnt]['mision'];
                $ordenPost = $destinos[$destPost]['mision'];
                // no se puede llegar
                if ($ordenAnt == "" || $ordenAnt == "transferir" || $ordenAnt == "recolectar" || $ordenAnt == "orbitar" || $ordenAnt == "extraer") {
                    $errores += " No se alcanzará destino " + $dest;
                    break;
                }

                // soy la ultima y debe ser de cierre
                if ($ordenPost != "") {
                    if ($ordenPost="" && $orden != "transferir" && $orden != "recolectar" && $orden != "orbitar" || $ordenAnt == "extraer") {
                        $errores += " la misión del último destino no es transferir, orbitar,extraer o recolectar";
                        break;
                    }
                }
                if (count($destinos) == $destPost) {
                    if ($orden != "transferir" && $orden != "recolectar" && $orden != "orbitar" || $ordenAnt == "extraer") {
                        $errores += " la misión del último destino no es transferir, orbitar,extraer o recolectar";
                        break;
                    }
                }
            }

            $cargaDest=$destinos[$dest]->recursos->get();
            $cargaDestT=0;
            foreach ($cargaDest as $recurso) {
                $cargaDestT+=$recurso;
            }

            // Carga total
            if ($cargaDestT > $valFlotaT['carga']) {
                $errores += " Seleccionada mas carga de la capacidad";
                break;
            }

            /// Carga en origen
            if ($dest==1){
                if ($recursos->personal < $cargaDest->personal){
                    $errores += " No hay tanta carga: personal";
                    break;
                }
                if ($recursos->personal < $cargaDest->personal){
                    $errores += " No hay tanta carga: personal";
                    break;
                }
                if ($recursos->mineral < $cargaDest->mineral){
                    $errores += " No hay tanta carga: mineral";
                    break;
                }
                if ($recursos->cristal < $cargaDest->cristal){
                    $errores += " No hay tanta carga: cristal";
                    break;
                }
                if ($recursos->gas < $cargaDest->gas){
                    $errores += " No hay tanta carga: gas";
                    break;
                }
                if ($recursos->plastico < $cargaDest->plastico){
                    $errores += " No hay tanta carga: plastico";
                    break;
                }
                if ($recursos->ceramica < $cargaDest->ceramica){
                    $errores += " No hay tanta carga: ceramica";
                    break;
                }
                if ($recursos->liquido < $cargaDest->liquido){
                    $errores += " No hay tanta carga: liquido";
                    break;
                }
                if ($recursos->fuel < $cargaDest->fuel + $valFlotaT['fuel']){
                    $errores += " No hay tanto fuel";
                    break;
                }
                if ($recursos->ma < $cargaDest->ma){
                    $errores += " No hay tanta carga: ma";
                    break;
                }
                if ($recursos->municion < $cargaDest->municion){
                    $errores += " No hay tanta carga: municion";
                    break;
                }
                if ($recursos->creditos < $cargaDest->creditos){
                    $errores += " No hay tanta carga: creditos";
                    break;
                }

            }


        }


        /// hangares
        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");

        foreach ($tamaniosArray as $tamanio) {
            if ($tablaHangares['dentroH'][$tamanio] > $tablaHangares['capacidadH'][$tamanio]) {
                $errores += "  Capacidad de hangar insuficiente";
                break;
            };
        }

    }

    public static function calculoespaciotiempo($destinos,$valFlotaT) {
        $fuelDestT = 0;
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $fueldistancia = $constantesU->where('codigo', 'fueldistancia')->first()->valor;
        $factortiempoviaje=$constantesU->where('codigo', 'factortiempoviaje')->first()->valor;

        for ($dest = 1; $dest < count($destinos); $dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            $destAnt = $dest - 1;
            $destinos[$dest]['viable']=true;
            $tiempoDest =0;
            $fuelDest=0;
            if ($destinos[$dest]['mision']!=""){
                $distancia = Flotas::distanciaUniverso($destinos[$destAnt], $destinos[$dest],$constantesU);
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
    }



    public static function distanciaUniverso($origen, $destino,$constantesU) {
        $coordOrigen = [];
        $coordOrigen['x'] = 0;
        $coordOrigen['y'] = 0;
        $coordDestino = [];
        $coordDestino['x'] = 0;
        $coordDestino['y'] = 0;
        $factordistancia = 1;

        $anchoUniverso= $constantesU->where('codigo', 'anchoUniverso')->first()->valor;
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
        $destino->coordx=$coordDestino['x'];
        $destino->coordy=$coordDestino['y'];
        return round($dist * 100) / 100;
    }


    public static function gastoFuel($distancia, $fuelbase,$fueldistancia) {
        return round($fueldistancia * $distancia * $fuelbase);
    }

    public static function tiempoLLegada($distancia, $velocidad,$factortiempoviaje) {
        return ($tiempo = round($distancia / $velocidad * $factortiempoviaje)); //en segundos
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
