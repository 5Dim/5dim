<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Construcciones;

class EnConstrucciones extends Model
{
    use HasFactory;

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

    public static function colaConstrucciones ($planetaActual) {
        $colaConstruccion= [];
        $colaConstruccion2=[];
        foreach ($planetaActual->construcciones as $construccion){
            if(!empty($construccion->enConstrucciones[0])){
                array_push($colaConstruccion2, $construccion->enConstrucciones);
            }
        }
        for ($i=0; $i < count($colaConstruccion2); $i++) {
            if (!empty($colaConstruccion2[$i])) {
                foreach ($colaConstruccion2[$i] as $colita) {
                    array_push($colaConstruccion, $colita);
                }
            }
        }
        return $colaConstruccion;
    }
}
