<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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