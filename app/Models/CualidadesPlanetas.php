<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CualidadesPlanetas extends Model
{
    use HasFactory;

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    public static function agregarCualidades ($IdPlaneta, $yacimientos) {
        Planetas::find($IdPlaneta);
        $cualidades = new CualidadesPlanetas();
        $cualidades->planetas_id = $IdPlaneta;
        $cualidades->eje_x = 0;
        $cualidades->eje_y = 0;
        $cualidades->enfriamiento = 0;

        if (empty($yacimientos)) {
            $cualidades->mineral = rand(0, 99);
            $cualidades->cristal = rand(0, 99);
            $cualidades->gas = rand(0, 99);
            $cualidades->plastico = rand(0, 99);
            $cualidades->ceramica = rand(0, 99);
        }else {
            $cualidades->mineral = $yacimientos;
            $cualidades->cristal = $yacimientos;
            $cualidades->gas = $yacimientos;
            $cualidades->plastico = $yacimientos;
            $cualidades->ceramica = $yacimientos;
        }

        $cualidades->save();
    }
}
