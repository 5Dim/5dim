<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investigaciones;

class EnInvestigaciones extends Model
{
    use HasFactory;


    public function investigaciones()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaInvestigaciones()
    {
        $colas = EnInvestigaciones::where('finished_at', '<=', date("Y-m-d H:i:s"))->get();
        foreach ($colas as $cola) {
            $nivelNuevo = $cola->nivel;
            $cola->investigaciones->nivel = $nivelNuevo;
            $cola->investigaciones->save();
            $cola->delete();
        }
    }

    public static function colaInvestigaciones($planetaActual)
    {
        $colaInvestigaciones = [];
        $colaInvestigaciones2 = [];
        foreach ($planetaActual->jugadores->investigaciones as $investigacion) {
            if (!empty($investigacion->enInvestigaciones[0])) {
                array_push($colaInvestigaciones2, $investigacion->enInvestigaciones);
            }
        }
        for ($i = 0; $i < count($colaInvestigaciones2); $i++) {
            if (!empty($colaInvestigaciones2[$i])) {
                foreach ($colaInvestigaciones2[$i] as $colita) {
                    array_push($colaInvestigaciones, $colita);
                }
            }
        }
        return $colaInvestigaciones;
    }
}
