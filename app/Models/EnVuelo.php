<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnVuelo extends Model
{
    use HasFactory;

    public function diseniosenvuelo()
    {
        return $this->hasMany(DiseniosEnVuelo::class);
    }

    public function puntosenflota()
    {
        return $this->hasMany(PuntosEnFlota::class);
    }

    public function recursosenflota()
    {
        return $this->hasOne(RecursosEnFlota::class);
    }

    public function destinos()
    {
        return $this->hasMany(Destinos::class);
    }

    public function objetivos()
    {
        return $this->belongsTo(Destinos::class, 'flota_id', "id");
    }
}
