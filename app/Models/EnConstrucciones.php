<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Construcciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EnConstrucciones extends Model
{
    use HasFactory;

    public function construcciones()
    {
        return $this->belongsTo(Construcciones::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaConstrucciones()
    {
        DB::beginTransaction();
        try {
        $colas = EnConstrucciones::where('finished_at', '<=', date("Y-m-d H:i:s"))->lockForUpdate()->get();
        foreach ($colas as $cola) {
            $cola->construcciones->nivel = $cola->nivel;

            //En caso de reciclaje debe devolver los recursos
            if ($cola->accion == "Reciclando") {
                $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;
                $coste = CostesConstrucciones::generarDatosCostesConstruccion($cola->construcciones->nivel, $cola->construcciones->codigo, $cola->construcciones->id);
                // $coste = $cola->construcciones->coste;
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
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("ERROR COLA CONSTRUCCIONES");
            Log::error($e);
        }
    }

    public static function colaConstrucciones($planetaActual)
    {
        $colaConstruccion = [];
        $colaConstruccion2 = [];
        // Comprueba cada construcción para ver si está en la cola
        foreach ($planetaActual->construcciones as $construccion) {
            if (!empty($construccion->enConstrucciones[0])) {
                array_push($colaConstruccion2, $construccion->enConstrucciones);
            }
        }

        // Recorremos toda la lista de enConsrtruccion
        for ($i = 0; $i < count($colaConstruccion2); $i++) {
            if (!empty($colaConstruccion2[$i])) {
                foreach ($colaConstruccion2[$i] as $colita) {
                    array_push($colaConstruccion, $colita);
                }
            }
        }
        return $colaConstruccion;
    }
}
