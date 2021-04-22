<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CualidadesPlanetas extends Model
{
    use HasFactory;

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    public static function agregarCualidades($IdPlaneta, $yacimientos)
    {
        $planeta = Planetas::find($IdPlaneta);
        $cualidades = new CualidadesPlanetas();
        $cualidades->planetas_id = $IdPlaneta;
        $cualidades->eje_x = 0;
        $cualidades->eje_y = 0;
        $cualidades->enfriamiento = 0;
        if ($planeta->tipo == "planeta") {
            $max = Constantes::where('codigo', 'yacimientosMaximos')->first()->valor;
            $min = Constantes::where('codigo', 'yacimientosMinimos')->first()->valor;
        } elseif ($planeta->tipo == "asteroide") {
            $max = Constantes::where('codigo', 'yacimientosasteroidesminimo')->first()->valor;
            $min = Constantes::where('codigo', 'yacimientosasteroidesmaximo')->first()->valor;
        } else {
            $max = 0;
            $min = 0;
        }

        if ($yacimientos == 0) {
            $cualidades->mineral = rand($min, $max);
            $cualidades->cristal = rand($min, $max);
            $cualidades->gas = rand($min, $max);
            $cualidades->plastico = rand($min, $max);
            $cualidades->ceramica = rand($min, $max);
        } else {
            $cualidades->mineral = $yacimientos;
            $cualidades->cristal = $yacimientos;
            $cualidades->gas = $yacimientos;
            $cualidades->plastico = $yacimientos;
            $cualidades->ceramica = $yacimientos;
        }

        $cualidades->save();
    }
}
