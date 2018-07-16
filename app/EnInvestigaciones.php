<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Investigaciones;

class EnInvestigaciones extends Model
{

    public function investigaciones ()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaInvestigaciones() {
        $colas = EnInvestigaciones::where('finished_at', '<=', date("Y-m-d H:i:s"))->get();
        foreach ($colas as $cola) {
            $nivelNuevo = $cola->nivel;
            $cola->investigaciones->nivel = $nivelNuevo;

            //En caso de reciclaje debe devolver los recursos
            if ($cola->accion == "Reciclando") {
                $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;
                $coste = $cola->investigaciones->coste;
                $recursos = $cola->planetas->recursos;

                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($coste->mineral * $reciclaje);
                $recursos->cristal += ($coste->cristal * $reciclaje);
                $recursos->gas += ($coste->gas * $reciclaje);
                $recursos->plastico += ($coste->plastico * $reciclaje);
                $recursos->ceramica += ($coste->ceramica * $reciclaje);
                $recursos->liquido += ($coste->liquido * $reciclaje);
                $recursos->micros += ($coste->micros * $reciclaje);
                $recursos->fuel += ($coste->fuel * $reciclaje);
                $recursos->ma += ($coste->ma * $reciclaje);
                $recursos->municion += ($coste->municion * $reciclaje);
                $recursos->save();
            }
            $cola->investigaciones->save();
            $cola->delete();
        }
    }

    public static function colaInvestigaciones ($planetaActual) {
        $colaInvestigaciones= [];
        $colaInvestigaciones2=[];
        foreach ($planetaActual->jugadores->investigaciones as $investigacion){
            if(!empty($investigacion->enInvestigaciones[0])){
                array_push($colaInvestigaciones2, $investigacion->enInvestigaciones);
            }
        }
        for ($i=0; $i < count($colaInvestigaciones2); $i++) {
            if (!empty($colaInvestigaciones2[$i])) {
                foreach ($colaInvestigaciones2[$i] as $colita) {
                    array_push($colaInvestigaciones, $colita);
                }
            }
        }
        return $colaInvestigaciones;
    }

}