<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursosEnFlota extends Model
{
    use HasFactory;

    public function envuelo()
    {
        return $this->hasOne(EnVuelo::class);
    }

    public function enrecoleccion()
    {
        return $this->hasOne(EnRecoleccion::class);
    }

    public function enextraccion()
    {
        return $this->hasOne(EnExtraccion::class);
    }

    public function destino()
    {
        return $this->hasOne(Destinos::class);
    }

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
        'liquidos',
        'micros',
        'fuel',
        'ma',
        'municion',
        'creditos'
    ];

}
