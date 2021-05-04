<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioridadesEnFlota extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'en_recoleccion_id',
        'en_orbita_id',
        'destinos_id',
        'personal',
        'mineral',
        'cristal',
        'gas',
        'plastico',
        'ceramica',
        'liquidos',
        'micros',
        'fuel',
        'ma',
        'municion',
        'creditos'
    ];

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
