<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    use HasFactory;

    public function envuelo()
    {
        return $this->hasOne(EnVuelo::class);
    }

    public function recursos()
    {
        return $this->hasOne(EnRecursosEnDestino::class);
    }

    public function prioridades()
    {
        return $this->hasOne(EnPrioridadesEnDestino::class);
    }

    public function flota()
    {
        return $this->hasOne(EnVuelo::class, 'id', "flota_id");
    }

    public function flotaDestino()
    {
        return $this->hasMany(EnVuelo::class, 'id', "en_vuelo_id");
    }

    public function enrecoleccion()
    {
        return $this->hasOne(EnRecoleccion::class, 'id', "en_recoleccion_id");
    }

    public function enorbita()
    {
        return $this->hasOne(EnOrbita::class, 'id', "en_orbita_id");
    }

    public function planeta()
    {
        return $this->hasOne(Planetas::class, 'id', "planetas_id");
    }
}
