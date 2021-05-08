<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    use HasFactory;
    public function recursos()
    {
        return $this->hasOne(RecursosEnFlota::class);
    }

    public function prioridades()
    {
        return $this->hasOne(PrioridadesEnFlota::class);
    }

    public function flota()
    {
        return $this->belongsTo(EnVuelo::class, 'flota_id');
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    public function enVuelo()
    {
        return $this->belongsTo(EnVuelo::class);
    }

    public function enRecoleccion()
    {
        return $this->belongsTo(EnRecoleccion::class);
    }

    public function enOrbita()
    {
        return $this->belongsTo(EnOrbita::class);
    }

    public static function destinoAnterior($destino)
    {
        return Destinos::where([['fin', $destino->init], ['flota_id', $destino->flota_id], ["id", '!=', $destino->id]])->first();
    }
}
