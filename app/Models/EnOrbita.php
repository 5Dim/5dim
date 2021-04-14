<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnOrbita extends Model
{
    use HasFactory;

    public function orbita()
    {
        return $this->hasOne(Planetas::class);
    }

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function objetivos()
    {
        return $this->belongsTo(Destinos::class, 'flota_id', "id");
    }
}
