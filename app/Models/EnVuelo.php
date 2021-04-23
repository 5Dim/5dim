<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnVuelo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function diseniosEnFlota()
    {
        return $this->hasMany(DiseniosEnFlota::class);
    }

    public function puntosenflota()
    {
        return $this->hasMany(PuntosEnFlota::class);
    }

    public function recursosEnFlota()
    {
        return $this->hasOne(RecursosEnFlota::class);
    }

    public function destinos()
    {
        return $this->hasMany(Destinos::class, 'flota_id', "id");
    }

    public function objetivos()
    {
        return $this->belongsTo(Destinos::class);
    }
}
