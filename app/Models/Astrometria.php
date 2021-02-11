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
}
