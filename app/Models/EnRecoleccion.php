<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnRecoleccion extends Model
{
    use HasFactory;

    public function planeta()
    {
        return $this->hasOne(Planetas::class);
    }

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function objetivos()
    {
        return $this->belongsTo(Destinos::class, 'en_vuelo_id', "id");
    }
}
