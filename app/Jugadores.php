<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    /**
     * Relacion de los planetas con los usuarios
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion de los usuarios con los planetas
     */
    public function planetas ()
    {
        return $this->hasMany(Planetas::class);
    }

    public function investigaciones ()
    {
        return $this->hasMany(Investigaciones::class);
    }
}