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


    public static function coordenadasVisibles($coordx,$coordy,$radar)
    {


        return false;
    }

    //determina que flotas extrangeras son visibles
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

            /*
            where('coordx','>=',$minCoordx)
            ->where('coordx','<=',$maxCoordx)
            ->where('coordy','>=',$minCoordy)
            ->where('coordy','<=',$maxCoordy)
            */

            // arrays de flotas con formato de astrometría
            $flotasVisiblesAjenasF = [];
            $flotasVisiblesPropiasF = [];
            $flotasVisiblesAliadasF = [];

        $puntosFlota=PuntosEnFlota::
            where('fin','>',$ahora)
            ->where('jugadores_id','<>',$jugadoresAlianzas)
            ->orderBy('fin', 'asc')
            ->get()->unique('envuelos_id');

            $enZona=$puntosFlota->where('coordx','>=',$minCoordx)
            ->where('coordx','<=',$maxCoordx)
            ->where('coordy','>=',$minCoordy)
            ->where('coordy','<=',$maxCoordy);

            //Log::info($ahora." puntos flota: ".$puntosFlota);
            //Log::info($minCoordx." ".$maxCoordx." ".$minCoordy." ".$maxCoordy);
            //Log::info("enzona: ".$enZona);

            $flotasVisiblesIds=[];

            //me aseguro que esta en el circulo de radares
            foreach ($radares as $radar) {

                //Log::info($radar);
                $coordDestino=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);

                foreach ($enZona as $ptoFlota) {
                    $dist =  (pow(($coordDestino['x'] - $ptoFlota['coordx']) * ($coordDestino['x'] - $ptoFlota['coordx']) + ($coordDestino['y'] - $ptoFlota['coordy']) * ($coordDestino['y'] - $ptoFlota['coordy']), 1 / 2))/$luzdemallauniverso;
                    //Log::info("dist ".$dist);
                    if ($dist<$radar['circulo']){
                        //array_push ($flotasVisiblesIds,$ptoFlota['envuelos_id']);
                        $flotasVisiblesAjena=EnVuelo::where('jugadores_id',$flotasVisiblesIds)->get();
                        array_push($flotasVisiblesAjenasF, Astrometria::flotaValoresVisibles($radares,$flotasVisiblesAjena,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"ajeno"));
                        break;
                    }
                }
            }

            //saco flotas aliadas
            if($jugadorActual['alianzas_id']!=null){
                foreach($flotasVisiblesAliadas as $flotaV){
                    array_push($flotasVisiblesAliadasF, Astrometria::flotaValoresVisibles($radares,$flotaV,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"aliada"));
                }
            }

            //saco flotas propias
            $flotasVisiblesPropias=EnVuelo::where('jugadores_id',$jugadorActual->id)->get();
            foreach($flotasVisiblesPropias as $flotaV){
                array_push($flotasVisiblesPropiasF, Astrometria::flotaValoresVisibles($radares,$flotaV,$ptoFlota,$anchoUniverso,$luzdemallauniverso,"propia"));
            }

            //Log::info($flotasVisiblesPropias);

            $data=[
            'flotasVisiblesAjenas'=>$flotasVisiblesAjenasF,
            'flotasVisiblesPropias'=>$flotasVisiblesPropiasF,
            'flotasVisiblesAliadas'=>$flotasVisiblesAliadasF
            ];

            return $data;

    }


    public static function flotaValoresVisibles($radares,$flotasVisiblesAjena,$ptoFlota,$anchoUniverso,$luzdemallauniverso,$dueno){

        $ahora=date("Y-m-d H:i:s");

        $destinoActual=Destinos::where('envuelos_id',$flotasVisiblesAjena->id)
        ->where('init','>',$ahora)
        ->where('fin','<=',$ahora)
        ->first();

            $flota = new \stdClass();
            $flota->numeroflota = $flotasVisiblesAjena->publico;
            $flota->nick = Jugadores::find($flotasVisiblesAjena->get('jugadores_id'))->get()->nombre;
            $flota->ataque = $flotasVisiblesAjena->ataqueVisible;
            $flota->defensa = $flotasVisiblesAjena->defensaVisible;
            $flota->origen ="?";
            $flota->destino = "?";
            $flota->coordix = null;
            $flota->coordiy = null;
            $flota->coordfx = null;
            $flota->coordfy = null;


        if ($dueno=="ajeno"){
            //calculo de siu veo origen y destino
            $seveOrigen=false;
            $seveDestino=false;

            foreach ($radares as $radar) {
                $coordDestino=Flotas::coordenadasBySistema($radar['estrella'],$anchoUniverso,$luzdemallauniverso);

                $dist =  (pow(($destinoActual->initcoordx - $coordDestino['x']) * ($destinoActual->initcoordx - $coordDestino['x']) + ($destinoActual->initcoordy - $coordDestino['y']) * ($destinoActual->initcoordy - $coordDestino['y']), 1 / 2))/$luzdemallauniverso;
                if (!$seveOrigen && $dist<$radar['circulo']){
                    $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
                    $flota->coordix = $destinoActual->initcoordx;
                    $flota->coordiy = $destinoActual->initcoordy;
                    $seveOrigen=true;
                }

                $dist =  (pow(($destinoActual->initcoordx - $coordDestino['x']) * ($destinoActual->initcoordx - $coordDestino['x']) + ($destinoActual->initcoordy - $coordDestino['y']) * ($destinoActual->initcoordy - $coordDestino['y']), 1 / 2))/$luzdemallauniverso;
                if (!$seveDestino && $dist<$radar['circulo']){
                    $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
                    $flota->coordfx = $destinoActual->fincoordx;
                    $flota->coordfy = $destinoActual->fincoordy;
                    $seveDestino=true;
                }

                if ($seveOrigen && $seveDestino){
                    break;
                }
            }
            $flota->color = 3;
            $flota->fecha = 1;
        } else if ($dueno=="aliado") {
            $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
            $flota->coordix = $destinoActual->initcoordx;
            $flota->coordiy = $destinoActual->initcoordy;
            $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
            $flota->coordfx = $destinoActual->fincoordx;
            $flota->coordfy = $destinoActual->fincoordy;
            $flota->color = 3;
            $flota->fecha = 1;
        } else {
            $flota->origen =$destinoActual['initestrella']."x".$destinoActual['initorbita'];
            $flota->coordix = $destinoActual->initcoordx;
            $flota->coordiy = $destinoActual->initcoordy;
            $flota->destino =$destinoActual['estrella']."x".$destinoActual['orbita'];
            $flota->coordfx = $destinoActual->fincoordx;
            $flota->coordfy = $destinoActual->fincoordy;
            $flota->color = 3;
            $flota->fecha = 1;
        }

            $flota->angulo = 0;
            $flota->coordx = $ptoFlota->coordx;
            $flota->coordy = $ptoFlota->coordy;
            $flota->abreen = "ppal";

        return $flota;

    }

}
