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
}
