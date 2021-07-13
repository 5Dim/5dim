<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursosEnFlota extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'en_recoleccion_id',
        'en_vuelo_id',
        'en_orbita_id',
        'personal',
        'mineral',
        'cristal',
        'gas',
        'plastico',
        'ceramica',
        'liquido',
        'micros',
        'fuel',
        'ma',
        'municion',
        'creditos'
    ];

    public function envuelo()
    {
        return $this->hasOne(EnVuelo::class);
    }

    public function enrecoleccion()
    {
        return $this->hasOne(EnRecoleccion::class);
    }

    public function enorbita()
    {
        return $this->hasOne(EnOrbita::class);
    }

    public function destino()
    {
        return $this->hasOne(Destinos::class);
    }

}
