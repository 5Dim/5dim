<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnOrbita extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre'
    ];

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

    public function diseniosEnFlota()
    {
        return $this->hasMany(DiseniosEnFlota::class);
    }

    public function prioridadesEnFlota()
    {
        return $this->hasOne(PrioridadesEnFlota::class);
    }
}
