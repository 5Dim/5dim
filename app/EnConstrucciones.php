<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Construcciones;

class EnConstrucciones extends Model
{

    /**
     * Relacion de enConstruccion con los construcciones
     */
    public function construcciones ()
    {
        return $this->belongsTo(Construcciones::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaConstrucciones() {
        $colas = EnConstrucciones::where('finished_at', '<=', date("Y-m-d H:i:s"))->get();
        foreach ($colas as $cola) {
            $nivelNuevo = $cola->nivel;
            $cola->construcciones->nivel = $nivelNuevo;

            //En caso de reciclaje debe devolver los recursos
            if ($cola->accion == "Reciclando") {
                $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;
                $coste = $cola->construcciones->coste;
                $recursos = $cola->construcciones->planetas->recursos;

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
            $cola->construcciones->save();
            $cola->delete();
        }
    }
}