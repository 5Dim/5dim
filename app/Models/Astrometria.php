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
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $constanteRadar = Constantes::where('codigo', 'factorexpansionradar')->first()->valor;
        if (!empty($jugadorActual->alianzas) && !empty($jugadorActual->alianzas->miembros)) {
            foreach ($jugadorActual->alianzas->miembros as $miembro) {
                foreach ($miembro->planetas as $planeta) {
                    $nivelObservatorio = $planeta->construcciones->where('codigo', 'observacion')->first()->nivel;
                    $nivelObservacion = $miembro->investigaciones->where('codigo', 'invObservacion')->first()->nivel;
                    $radar = new Radares();
                    $radar->estrella = $planeta->estrella;
                    $radar->circulo = Astrometria::radioRadar(($nivelObservatorio + $nivelObservacion) * $constanteRadar);
                    $radar->color = 2;
                    array_push($radares, $radar);
                }
            }
        } else {
            foreach ($jugadorActual->planetas as $planeta) {
                $nivelObservatorio = $planeta->construcciones->where('codigo', 'observacion')->first()->nivel;
                $nivelObservacion = $jugadorActual->investigaciones->where('codigo', 'invObservacion')->first()->nivel;
                $radar = new Radares();
                $radar->estrella = $planeta->estrella;
                $radar->circulo = Astrometria::radioRadar(($nivelObservatorio + $nivelObservacion) * $constanteRadar);
                $radar->color = 1;
                array_push($radares, $radar);
            }
        }

        return $radares;
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
            $restoJugadores = Jugadores::wher('alianzas_id', "!=", $jugadorActual->alianzas->id)->get();
        }
        foreach ($restoJugadores as $jugador) {
            foreach ($jugador->planetas as $planeta) {
                $radar = new Radares();
                $radar->estrella = $planeta->estrella;
                $radar->circulo = Astrometria::radioInfluencia(((time() - $planeta->creacion) / (3600 * 24 * 30)));
                $radar->color = 2;
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
        $anchoUniverso= $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso= $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;

        $coordOrigen=Flotas::coordenadasBySistema($sistema,$anchoUniverso,$luzdemallauniverso);

        foreach ($radares as $radar) {
            //Log::info($radar);
            $coordDestino=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);
            $dist =  (pow(($coordDestino['x'] - $coordOrigen['x']) * ($coordDestino['x'] - $coordOrigen['x']) + ($coordDestino['y'] - $coordOrigen['y']) * ($coordDestino['y'] - $coordOrigen['y']), 1 / 2))/$luzdemallauniverso;

            //Log::info($dist);
            if ($dist<$radar['circulo']){
                $seve = true;
                break;
            }
        }

        return $seve;
    }



    //determina que flotas son visibles
    public static function flotasVisibles(){

        //Log::info("flotas visibles");
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $anchoUniverso= $constantesU->where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso= $constantesU->where('codigo', 'luzdemallauniverso')->first()->valor;

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));// Log::info($jugadorActual);
        if($jugadorActual['alianzas_id']!=null){
            $jugadoresAlianzas=Alianzas::idMiembros($jugadorActual['alianzas_id']); //Log::info($jugadoresAlianzas);

            //saco flotas aliadas
            $jugadorAlianzaSinMi=Alianzas::idMiembrosSinMi($jugadorActual['alianzas_id'],$jugadorActual->id);
            $flotasVisiblesAliadas=EnVuelo::where('jugadores_id',$jugadorAlianzaSinMi)->get();
        } else {
            $jugadoresAlianzas=$jugadorActual;
        }


        //determina caja de visibilidad
        $minCoordx=9999999;
        $maxCoordx=-1;
        $minCoordy=99999999;
        $maxCoordy=-1;
        $ahora=date("Y-m-d H:i:s");

        //se borran los ptos viejos
        PuntosEnFlota::where('fin','<',$ahora)->delete();

        $radares = Astrometria::radares();

        foreach ($radares as $radar) {
           // Log::info($radar);
            $coordBase=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);
            //Log::info($coordBase);
            $minCoordx=min($minCoordx,$coordBase['x'] -$radar['circulo']);
            $maxCoordx=max($maxCoordx,$coordBase['x'] +$radar['circulo']);
            $minCoordy=min($minCoordy,$coordBase['y'] -$radar['circulo']);
            $maxCoordy=max($maxCoordy,$coordBase['y'] +$radar['circulo']);
            //Log::info($minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
        }

            // arrays de flotas con formato de astrometría
           // $flotasVisiblesAjenasF = [];
            //$flotasVisiblesPropiasF = [];
           // $flotasVisiblesAliadasF = [];
            $flotas=[];

            //Log::info('busca ptos floa: ');
            $puntosFlota=PuntosEnFlota::
            where('fin','>',$ahora)
            ->whereNotIn('jugadores_id',$jugadoresAlianzas)
            ->orderBy('fin', 'asc')
            ->get()->unique('envuelos_id');

            $enZona=$puntosFlota->where('coordx','>=',$minCoordx)
            ->where('coordx','<=',$maxCoordx)
            ->where('coordy','>=',$minCoordy)
            ->where('coordy','<=',$maxCoordy);

            //Log::info($ahora." puntos flota: ".$puntosFlota);
            //Log::info($minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
            //Log::info("enzona: ".$enZona);

            //$flotasVisiblesIds=[];

            //me aseguro que esta en el circulo de radares
            foreach ($radares as $radar) {

                //Log::info($radar);
                $coordDestino=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);

                foreach ($enZona as $ptoFlota) {
                    $dist =  (pow(($coordDestino['x'] - $ptoFlota['coordx']) * ($coordDestino['x'] - $ptoFlota['coordx']) + ($coordDestino['y'] - $ptoFlota['coordy']) * ($coordDestino['y'] - $ptoFlota['coordy']), 1 / 2))/$luzdemallauniverso;
                    //Log::info("dist ".$dist);
                    if ($dist<$radar['circulo']){
                        //Log::info($ptoFlota);
                        $flotasVisiblesAjena=EnVuelo::where('id',$ptoFlota['envuelos_id'])->first();
                        //Log::info($flotasVisiblesAjena);
                        $estaflota=Astrometria::flotaValoresVisibles($radares,$flotasVisiblesAjena,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"ajeno");
                        if ($estaflota!=null){
                            array_push($flotas,$estaflota );
                        }
                        break;
                    }
                }
            }

            //saco flotas aliadas
            if($jugadorActual['alianzas_id']!=null){
                foreach($flotasVisiblesAliadas as $flotaV){
                    $ptoFlota=PuntosEnFlota::
                    where('envuelos_id',$flotaV->id)
                    ->orderBy('fin', 'asc')
                    ->first();
                    $estaflota= Astrometria::flotaValoresVisibles($radares,$flotaV,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"aliada");
                    if ($estaflota!=null){
                        array_push($flotas,$estaflota );
                    }
                }
            }

            //saco flotas propias
            $flotasVisiblesPropias=EnVuelo::where('jugadores_id',$jugadorActual->id)->get();
            //Log::info("flotas visibles propias: ".$flotasVisiblesPropias);
            foreach($flotasVisiblesPropias as $flotaV){
                //Log::info($flotaV);
                $ptoFlota=PuntosEnFlota::
                where('envuelos_id',$flotaV->id)
                ->orderBy('fin', 'asc')
                ->first();
                $estaflota= Astrometria::flotaValoresVisibles($radares,$flotaV,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"propia");
                if ($estaflota!=null){
                    array_push($flotas,$estaflota );
                }
            }

            //Log::info($flotasVisiblesPropias);

            $data=[
            'flotas'=>$flotas
            ];

            return $data;

    }


    public static function flotaValoresVisibles($radares,$flotaVisible,$ptoFlota,$anchoUniverso,$luzdemallauniverso,$tipo){

        $ahora=date("Y-m-d H:i:s");

        //Log::info($flotaVisible);
        $destinoActual=Destinos::where('envuelos_id',$flotaVisible['id'])
        ->where('init','<',$ahora)
        ->where('fin','>=',$ahora)
        ->first();

        //Log::info($destinoActual);
        if ($destinoActual==null){
            return;
        }

        $esteJugon=Jugadores::find($flotaVisible['jugadores_id'])->first();
        //Log::info($esteJugon);
        $ajuste=35; //ajuste con mapa

            $flota = new \stdClass();
            $flota->numeroflota = $flotaVisible->publico;
            $flota->nick = $esteJugon['nombre'];
            $flota->ataque = $flotaVisible->ataqueVisible;
            $flota->defensa = $flotaVisible->defensaVisible;
            $flota->origen ="?";
            $flota->destino = "?";
            $flota->coordix = null;
            $flota->coordiy = null;
            $flota->coordfx = null;
            $flota->coordfy = null;
            $flota->trestante = null;
            $flota->tregreso = null;
            $flota->mision = null;
            $flota->tipo = $tipo;
            $flota->fecha = null;
            $flota->cargaActual="?";

        if ($tipo=="ajeno"){
            //calculo de si veo origen y destino
            $seveOrigen=false;
            $seveDestino=false;

            foreach ($radares as $radar) {
                $coordDestino=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);

                $dist =  (pow(($destinoActual->initcoordx - $coordDestino['x']) * ($destinoActual->initcoordx - $coordDestino['x']) + ($destinoActual->initcoordy - $coordDestino['y']) * ($destinoActual->initcoordy - $coordDestino['y']), 1 / 2))/$luzdemallauniverso;
                if (!$seveOrigen && $dist<$radar['circulo']){
                    $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
                    $flota->coordix =7* $destinoActual->initcoordx+$ajuste;
                    $flota->coordiy =7* $destinoActual->initcoordy+$ajuste;
                    $seveOrigen=true;
                }

                $dist =  (pow(($destinoActual->initcoordx - $coordDestino['x']) * ($destinoActual->initcoordx - $coordDestino['x']) + ($destinoActual->initcoordy - $coordDestino['y']) * ($destinoActual->initcoordy - $coordDestino['y']), 1 / 2))/$luzdemallauniverso;
                if (!$seveDestino && $dist<$radar['circulo']){
                    $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
                    $flota->coordfx =7* $destinoActual->fincoordx+$ajuste;
                    $flota->coordfy =7* $destinoActual->fincoordy+$ajuste;
                    $seveDestino=true;
                }

                if ($seveOrigen && $seveDestino){
                    break;
                }
            }
            $flota->color = 3;

        } else if ($tipo=="aliado") {
            $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
            $flota->coordix =7* $destinoActual->initcoordx+$ajuste;
            $flota->coordiy =7* $destinoActual->initcoordy+$ajuste;
            $flota->coordfx =7* $destinoActual->fincoordx+$ajuste;
            $flota->coordfy =7* $destinoActual->fincoordy+$ajuste;
            $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
            $flota->color = 2;

            $tiempovuelo=strtotime($destinoActual['fin'])-strtotime($destinoActual['init']);
            $trestante=strtotime($destinoActual['fin'])-strtotime($ahora);
            $tregreso=strtotime($ahora)-strtotime($destinoActual['init']);
            $flota->tvuelo = $tiempovuelo;
            $flota->trestante = $trestante;
            $flota->tregreso = $tregreso;
            $flota->mision = $destinoActual['mision'];
            $flota->fecha = $destinoActual['fin'];
        } else { //propio
            //Log::info($destinoActual);

            $flota->numeroflota = $flotaVisible->nombre;
            $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
            $flota->coordix =7* $destinoActual->initcoordx+$ajuste;
            $flota->coordiy =7* $destinoActual->initcoordy+$ajuste;
            $flota->coordfx =7* $destinoActual->fincoordx+$ajuste;
            $flota->coordfy =7* $destinoActual->fincoordy+$ajuste;
            $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
            $flota->color =1;

            $tiempovuelo=strtotime($destinoActual['fin'])-strtotime($destinoActual['init']);
            $trestante=strtotime($destinoActual['fin'])-strtotime($ahora);
            $tregreso=strtotime($ahora)-strtotime($destinoActual['init']);
            $flota->tvuelo = $tiempovuelo;
            $flota->trestante = $trestante;
            $flota->tregreso = $tregreso;
            $flota->mision = $destinoActual['mision'];
            $flota->fecha = $destinoActual['fin'];

            $flota->recursos=RecursosEnFlota::where('envuelos_id',$flotaVisible['id'])->first();
        }

            $flota->coordx =7* $ptoFlota->coordx+$ajuste;
            $flota->coordy =7* $ptoFlota->coordy+$ajuste;
            $flota->abreen = "ppal";

            $vectorx=$destinoActual->fincoordx-$destinoActual->initcoordx;
            $vectory=$destinoActual->fincoordy-$destinoActual->initcoordy;
            $angle=atan2($vectory, $vectorx)+3.141579/2;

            $flota->angulo = $angle;
            //Log::info($flotaVisible->nombre." ".$flota->coordfx." ".$flota->coordix." ademas ".$flota->coordfy." ".$flota->coordiy);
            //Log::info($vectorx."  ".$vectory." = ".$angle.", grados= ".(180*$angle/3.141579));

        return $flota;

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
