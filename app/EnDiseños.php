<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnDiseños extends Model
{
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaDiseños() {
        $colas = EnDiseños::where('finished_at', '<=', date("Y-m-d H:i:s"))->get();
        $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;

        foreach ($colas as $cola) {
            $diseño = DiseñosEnPlaneta::where([
                ['diseños_id', $cola->diseños_id],
                ['planetas_id', $cola->planetas_id]
            ])->first();

            if (!empty($diseño)) {
                //En caso de reciclaje debe devolver los recursos
                if ($cola->accion == "Reciclando") {
                    $coste = $cola->diseños->costes;
                    $recursos = $cola->planetas->recursos;
                    $diseño->cantidad -= $cola->cantidad;

                    //Restaurar beneficio por reciclaje
                    $recursos->mineral += (($coste->mineral * $cola->cantidad) * $reciclaje);
                    $recursos->cristal += (($coste->cristal * $cola->cantidad) * $reciclaje);
                    $recursos->gas += (($coste->gas * $cola->cantidad) * $reciclaje);
                    $recursos->plastico += (($coste->plastico * $cola->cantidad) * $reciclaje);
                    $recursos->ceramica += (($coste->ceramica * $cola->cantidad) * $reciclaje);
                    $recursos->liquido += (($coste->liquido * $cola->cantidad) * $reciclaje);
                    $recursos->micros += (($coste->micros * $cola->cantidad) * $reciclaje);
                    $recursos->save();
                }else{
                    $diseño->cantidad += $cola->cantidad;
                }
            }else{
                $diseño = new DiseñosEnPlaneta();
                $diseño->planetas_id = $cola->planetas_id;
                $diseño->cantidad = $cola->cantidad;
                $diseño->diseños_id = $cola->diseños_id;
                $coste = $cola->diseños->costes;
                $diseño->tipo = $cola->diseños->fuselajes->tipo;
            }
            $diseño->save();
            $cola->delete();
        }
    }

    public static function cadenaProduccion ($cantidad, $tamaño) {
        $return = 1;


        return $return;
    }
}