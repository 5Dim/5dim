<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosEnFlota extends Model
{
    protected $table = 'en_puntos_en_flota';
    use HasFactory;

    public function envuelo()
    {
        return $this->hasOne(EnVuelo::class);
    }
}
