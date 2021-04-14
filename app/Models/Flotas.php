<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use LengthException;

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
                    //Log::info($disenio['datos'][$tamaniod]. " de ".$tamaniod." del diseño ".$disenio);
                    $tablaHangares['capacidadH'][$tamaniod] += $atotal * $disenio['datos'][$tamaniod];
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
            //Log::info($tablaHangares);
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
            //Log::info($destinos[$dest]['viable']);
           // if (!$destinos[$dest]['viable']){
           //     $errores=" Destino no viable= ".$dest;
           // }
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

                    if ($ordenAnt == "" || $ordenAnt == "Transferir" || $ordenAnt == "Recolectar" || $ordenAnt == "Orbitar" || $ordenAnt == "Extraer") {
                        $errores = " No se alcanzará destino " . $dest;
                    }

                    // soy la ultima y debe ser de cierre
                    if ($ordenPost=="" && $orden != "Transferir" && $orden != "Recolectar" && $orden != "Orbitar" && $orden != "Extraer") {
                        $errores = " la misión del último destino no es Transferir, Orbitar,Extraer o Recolectar";
                    }

                    if ($cantidadDestinos == $dest) {
                        if ($ordenPost != "Transferir" && $ordenPost != "Recolectar" && $ordenPost != "Orbitar" && $ordenPost != "Extraer") {
                            $errores = " la misión del último destino no es Transferir, Orbitar,Extraer o Recolectar. ";
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

                    //los destinos existen
                    //sistemas
                    if(Flotas::existeSistema($destinos[$dest]['estrella'])==false){
                        $errores.=" Sistema ".$destinos[$dest]['estrella']." no existe ";
                    }
                    //flotas
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
                if ($recursos->fuel < $cargaDest[$dest]['fuel'] + $valFlotaT['fuelDestT']){//$valFlotaT['fuel']
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

    public static function calculoespaciotiempo($destinos,$valFlotaT) {
        $fuelDestT = 0;
        $constantesU = Constantes::where('tipo', 'universo')->get(); //Log::info($constantesU);
        $fueldistancia = $constantesU->where('codigo', 'fuelpordistancia')->first()->valor;
        $factortiempoviaje=$constantesU->where('codigo', 'factortiempoviaje')->first()->valor;
        $anchoUniverso= $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso= $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;
        $fuelfactorreduccionpordistancia= $constantesU->where('codigo', 'fuelfactorreduccionpordistancia')->first()->valor;

        $dest=0;
        $coordDestino = Flotas::coordenadasBySistema($destinos[$dest]['estrella'],$anchoUniverso,$luzdemallauniverso);
        $destinos[$dest]['fincoordx']=$coordDestino['x'];
        $destinos[$dest]['fincoordy']=$coordDestino['y'];

        for ($dest = 1; $dest < count($destinos); $dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            $destAnt = $dest - 1;
            $destinos[$dest]['viable']=false;
            $tiempoDest =0;
            $fuelDest=0;

            if (isset ($destinos[$dest]['mision']) &&  $destinos[$dest]['mision']!=""){
                $destinos[$dest]['viable']=true;
                $result = Flotas::distanciaUniverso($destinos[$destAnt], $destinos[$dest],$constantesU);
                $distancia=$result[0];
                $destinos[$dest]=$result[1];

                if ($distancia==0 || $destinos[$dest]['estrella'] == "") {
                    $destinos[$dest]['viable']=false;
                } else {
                    $porcentVel = $destinos[$dest]['porcentVel']/100;
                    $fuelDest = Flotas::gastoFuel($distancia, $valFlotaT['fuel'],$fueldistancia,$porcentVel,$fuelfactorreduccionpordistancia);
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
        //Log::info($destinos[1]['viable']);

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

        // calculos
        if ($origen['estrella'] != "0" && $destino['estrella'] != "0" && $origen['orbita'] != "0" && $destino['orbita'] != "0") {
            if ($origen['estrella'] == $destino['estrella'] && $origen['orbita'] == $destino['orbita']) {
                //Orbitar
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


    public static function gastoFuel($distancia, $fuelbase,$fueldistancia,$porcentVel,$fuelfactorreduccionpordistancia) {
        return round($fueldistancia * $distancia * $fuelbase * pow($porcentVel,$fuelfactorreduccionpordistancia));
    }

    public static function tiempoLLegada($distancia, $velocidad,$factortiempoviaje) {
        if ($velocidad>0){
            return (round($distancia / $velocidad * $factortiempoviaje)); //en segundos
        }
        return 0;
    }

    public static function coordenadasBySistema($nsistema,$anchoUniverso,$luzdemallauniverso) {
        $coord = [];
        $coord['y'] = floor($nsistema / $anchoUniverso) * 10;
        $coord['x'] = ($nsistema - floor($nsistema / $anchoUniverso) * $anchoUniverso) * $luzdemallauniverso;

        return $coord;
    }

    public static function existeSistema($estrella){
        $planeta=Planetas::where([ ['estrella', $estrella]])->first();
        if ($planeta==null){
            return false;
        }
        return true;
    }


public static function destinoTipoId($destino,$destinosDest){

    $planetas_id=null;
    $flota_id=null;
    $en_recoleccion_id=null;
    $en_orbita_id=null;
    $errores="";

    try {
        $codigoDestino=$destinosDest['estrella'];

        if(strlen($codigoDestino)<7 && $destinosDest['orbita']!=null){//destino es planeta

            $planeta=Planetas::where('estrella', $destinosDest['estrella'])->where('orbita', $destinosDest['orbita'])->first();
            if($planeta!=null){
                $planetas_id=$planeta->id;
            } else {
                $errores="No existe planeta destino ".$destinosDest['estrella']."x".$destinosDest['orbita'];
                //Log::info($errores);
                throw new \Exception($errores);
            }
        } else{ //destino flota

            $flotadestino=EnVuelo::where('publico',$codigoDestino)->orWhere('nombre',$codigoDestino)->first();
            if($flotadestino!=null){
                $flota_id=$flotadestino->id;
            } else {
                $flotadestino=EnOrbita::where('publico',$codigoDestino)->orWhere('nombre',$codigoDestino)->first();
                if($flotadestino!=null){
                    $en_orbita_id=$flotadestino->id;
                } else {
                    $flotadestino=EnRecoleccion::where('publico',$codigoDestino)->orWhere('nombre',$codigoDestino)->first();
                    if($flotadestino!=null){
                        $en_recoleccion_id=$flotadestino->id;
                    } else {
                        $errores="No existe flota destino ".$destinosDest['estrella'];
                        //Log::info($errores);
                        //$destino=$errores;
                        throw new \Exception($errores);
                    }
                }
            }
        }

        $destino->planetas_id=$planetas_id;
        $destino->flota_id=$flota_id;
        $destino->en_orbita_id=$en_orbita_id;
        $destino->en_recoleccion_id=$en_recoleccion_id;
    } catch (\Exception $e) {
        Log::info($e);
       // return $e->getMessage();
    }
    return [$destino,$errores];

}


    public static function regresarFlota($nombreflota){

        $jugadoryAlianza = [];

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));// Log::info($jugadorActual);
        if($jugadorActual['alianzas_id']!=null){
            array_push($jugadoryAlianza,$jugadorActual->alianzas_id);
        }

        array_push($jugadoryAlianza,$jugadorActual->id);

        //Log::info("nombreflota: ".$nombreflota);
        $errores="";
        $flotax=EnVuelo::where('publico',$nombreflota)->where('jugadores_id',$jugadoryAlianza)->first();
        if ($flotax!=null){

            $ajusteMapaBase=35; //ajuste 0,0 con mapa
            $ajusteMapaFactor=7; //ajuste escala mapa

            DB::beginTransaction();
            try {
                $ahora=date("Y-m-d H:i:s");
                $puntoFlota=PuntosEnFlota::
                    where('fin','>',$ahora)
                    ->where('en_vuelo_id',$flotax->id)
                    ->orderBy('fin', 'asc')
                    ->first();

                //nuscamos destinoa actual
                //$destinosO=$flotax->destinos;
                $destino=Destinos::where("visitado",0)
                ->where('en_vuelo_id',$flotax->id)
                ->orderBy('id', 'asc')
                ->first();
                //Log::info("destino: ".$destino);

                if ($destino==null){
                    $errores="No se encuentra el destino actual";
                }
                else if($destino->mision_regreso!=null){
                    //se borran los viejos
                    PuntosEnFlota::where('en_vuelo_id',$flotax->id)->delete();
                    //Log::info("Borrando destinos sobrantes: ".$flotax->id." ".$destino->id);
                    Destinos::where('en_vuelo_id',$flotax->id)
                    ->where("id",">",$destino->id)->delete();

                    $constantesU = Constantes::where('tipo', 'universo')->get();
                    $tiempoPuntosFlotas=$constantesU->where('codigo', 'tiempoPuntosFlotas')->first()->valor;

                    $Tinit=$ahora;
                    $initestrella=$destino->initestrella;
                    $initorbita=$destino->initorbita;
                    $duracion=strtotime($Tinit)-strtotime($destino['init']);

                    $add_time=strtotime($Tinit)+$duracion;
                    $Tfin=date('Y-m-d H:i:s',$add_time);

                    //Log::info("duración: ".$duracion." Tinit: ".$Tinit." destino init: ".$destino['init']." Tfin: ".$Tfin);


                    $destino->porcentVel="100";
                    $destino->mision=$destino->mision_regreso;
                    $destino->mision_regreso=null;
                    $destino->initestrella=$destino->estrella;
                    $destino->initorbita=$destino->orbita;
                    $destino->estrella=$initestrella;
                    $destino->orbita=$initorbita;
                    $destino->fincoordx=$destino->initcoordx;
                    $destino->fincoordy=$destino->initcoordy;
                    $destino->initcoordx=$puntoFlota->coordx;
                    $destino->initcoordy=$puntoFlota->coordy;
                    $destino->init=$Tinit;
                    $destino->fin=$Tfin;
                    $destino->en_vuelo_id=$flotax->id;

                    $result=Flotas::destinoTipoId($destino,$destino);
                    $destino=$result[0];
                    $errores=$result[1];
                    if (strlen($errores)>3){
                        //Log::info("coso" .$errores);
                        throw new \Exception($errores);
                    }

                    $destino->save();

                    //Log::info("destino final: ".$destino);

                    $vectorx=($destino->fincoordx-$destino->initcoordx)/$duracion;
                    $vectory=($destino->fincoordy-$destino->initcoordy)/$duracion;

                    for ($tiempoPto = 0; $tiempoPto < $duracion/$tiempoPuntosFlotas; $tiempoPto++) {

                        $add_time=strtotime($Tinit)+($tiempoPto * $tiempoPuntosFlotas);
                        $TfinPto=date('Y-m-d H:i:s',$add_time);

                        $puntoFlota=new PuntosEnFlota();
                        $puntoFlota->coordx= $destino->initcoordx + $vectorx * ($tiempoPto * $tiempoPuntosFlotas);
                        $puntoFlota->coordy= $destino->initcoordy + $vectory * ($tiempoPto * $tiempoPuntosFlotas);
                        $puntoFlota->fin= $TfinPto;
                        $puntoFlota->en_vuelo_id=$flotax->id;
                        $puntoFlota->jugadores_id=$flotax->jugadores_id;
                        //Log::info($puntoFlota);
                        $puntoFlota->save();
                    }
                    //ultimo punto siempre va
                    $puntoFlota=new PuntosEnFlota();
                    $puntoFlota->coordx= $destino->fincoordx;
                    $puntoFlota->coordy= $destino->fincoordy;
                    $puntoFlota->fin= $Tfin;
                    $puntoFlota->en_vuelo_id=$flotax->id;
                    $puntoFlota->jugadores_id=$flotax->jugadores_id;
                    $puntoFlota->save();

                    DB::commit();
                    //Log::info("Regresando");

                } else {
                    $errores="La flota ya viene de regreso o no existe destino de regreso";
                }


            } catch (Exception $e) {
                DB::rollBack();
                Log::info("Error en Commit de cancelar flota ".$nombreflota." ".$e);
                $errores="No ha sido posible";
            }
            //return redirect('/juego/flota');
        } else {
            $errores=("No se encuentra la flota: ".$nombreflota);
        }
        //Log::info($errores);
        return compact('errores');
    }


    ///////////////  recepción de flotas   ////////////////////////
    public static function llegadaFlotas(){

        $ahora=date("Y-m-d H:i:s");
        $listaDestinosEntrantes=Destinos::where('fin','>',$ahora)->where("visitado","0")->get();


        foreach($listaDestinosEntrantes as $destino){
            $tipodestino="planeta";

            switch($destino->mision){
                case "Transportar":
                    //destino existe
                    if($destino->flota!=null){ // flota
                        $flotax=EnVuelo::where('publico',$destino->flota)->first();
                        if($flotax!=null){
                            $tipodestino="flota";
                            //actualizamos sus recursos

                        }else {
                            //flota sigue su camino
                        }
                    } else { // planeta
                        $planetadestino = Planetas::where('estrella', $destino->estrella)->where('orbita', $destino->orbita)->first();
                        if($planetadestino!=null && $planetadestino->recursos!=null){
                            $tipodestino="planeta";
                            //actualizamos sus recursos
                            Recursos::calcularRecursos($planetadestino->id);
                            ///$recursos = Recursos::where('planetas_id', $planetadestino->id)->first();
                        } else {
                            //flota sigue su camino
                        }
                    }
                    break;
                    case "Transferir":
                        //si los ids de todos los destinos es nulo es orbitar el planeta

                    break;

                   //gestión de recursos




                    break;

            }




        }



    }


}
