<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astrometria extends Model
{
    use HasFactory;

    // multiplicar por las constantes factorexpansionradar y factorexpansionzonainfluencia $value para obtener valores adecuados a cada uso
    public static function radioRadar($value)
    {
        return round((pow($value, 0.92)), 2);
    }

    // multiplicar por las constantes factorexpansionradar y factorexpansionzonainfluencia $value para obtener valores adecuados a cada uso
    public static function radioInfluencia($value)
    {
        $constanteInfluencia = Constantes::where('codigo', 'factorexpansionzonainfluencia')->first()->valor;
        return round($constanteInfluencia * $value * (pow(1 / $value, 0.5)), 2);
    }

    // dado un planeta de sistema se obtienen las coordenadas x e y
    public function coordenadasBySistema($planeta) {
        $nsistema=$planeta->estrella;
        $anchouniverso=Constantes::where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso=Constantes::where('codigo', 'luzdemallauniverso')->first()->valor;

        $cy = floor($nsistema / $anchouniverso) * 10;
        $cx =($nsistema - floor($nsistema / $anchouniverso) * $anchouniverso) * $luzdemallauniverso;
        $planeta->coordx=$cx;
        $planeta->coordy=$cy;
        $planeta->save();
    }
}
