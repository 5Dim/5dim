<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnDiseños extends Model
{
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
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
                $diseño->cantidad += 1;
                //En caso de reciclaje debe devolver los recursos
                if ($cola->accion == "Reciclando") {
                    $coste = $cola->diseños->coste;
                    $recursos = $cola->planetas->recursos;

                    //Restaurar beneficio por reciclaje
                    $recursos->mineral += ($coste->mineral * $reciclaje);
                    $recursos->cristal += ($coste->cristal * $reciclaje);
                    $recursos->gas += ($coste->gas * $reciclaje);
                    $recursos->plastico += ($coste->plastico * $reciclaje);
                    $recursos->ceramica += ($coste->ceramica * $reciclaje);
                    $recursos->liquido += ($coste->liquido * $reciclaje);
                    $recursos->micros += ($coste->micros * $reciclaje);
                    $recursos->save();
                }
                $diseño->save();
                $cola->delete();
            }else{
                $diseño = new DiseñosEnPlaneta();
                $diseño->planetas_id = $cola->planetas_id;
                $diseño->diseños_id = $cola->diseños_id;
                $diseño->cantidad = 1;
                $diseño->tipo = $cola->diseños->fuselajes->tipo;
                if ($cola->accion == "Reciclando") {
                    $coste = $cola->diseños->coste;
                    $recursos = $cola->planetas->recursos;

                    //Restaurar beneficio por reciclaje
                    $recursos->mineral += ($coste->mineral * $reciclaje);
                    $recursos->cristal += ($coste->cristal * $reciclaje);
                    $recursos->gas += ($coste->gas * $reciclaje);
                    $recursos->plastico += ($coste->plastico * $reciclaje);
                    $recursos->ceramica += ($coste->ceramica * $reciclaje);
                    $recursos->liquido += ($coste->liquido * $reciclaje);
                    $recursos->micros += ($coste->micros * $reciclaje);
                    $recursos->save();
                }
                $diseño->save();
                $cola->delete();
            }
        }
    }
}