<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnRecoleccion extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsTo(Destinos::class);
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    public function recursosEnFlota()
    {
        return $this->hasOne(RecursosEnFlota::class);
    }
}
