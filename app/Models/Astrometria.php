<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astrometria extends Model
{
    use HasFactory;

    // multiplicar por las constantes factorexpansionradar y factorexpansionzonainfluencia $value para obtener valores adecuados a cada uso
    public function RadioByvalue($value)
    {
        return  round((pow($value / (2 * pi()), 2)), 2);
    }
}
