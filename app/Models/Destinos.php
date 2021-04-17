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
        return $this->hasMany(EnVuelo::class, 'id', "flota_id");
    }

    public function enrecoleccion()
    {
        return $this->hasOne(EnRecoleccion::class);
    }

    public function enorbita()
    {
        return $this->hasOne(EnOrbita::class);
    }

    public function planeta()
    {
        return $this->hasOne(Planetas::class);
    }
}
