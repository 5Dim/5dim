<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioridadesEnFlota extends Model
{
    use HasFactory;

    public function destino()
    {
        return $this->hasOne(Destinos::class);
    }

    public function orbita()
    {
        return $this->hasOne(EnOrbita::class);
    }

    public function recoleccion()
    {
        return $this->hasOne(EnRecoleccion::class);
    }
}
