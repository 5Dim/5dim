<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutasPredefinidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function disenios()
    {
        return $this->hasMany(DiseniosEnRuta::class);
    }

    public function recursos()
    {
        return $this->hasOne(RecursosEnRuta::class);
    }

    public function destinos()
    {
        return $this->hasMany(DestinosEnRuta::class);
    }

    public function objetivos()
    {
        return $this->belongsTo(Destinos::class);
    }
}
