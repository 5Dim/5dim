<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planetas extends Model
{
    /**
     * Relacion de los planetas con los jugadores
     */
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class);
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function recursos ()
    {
        return $this->hasOne(Recursos::class);
    }

    /**
     * Relacion de los planetas con las construcciones
     */
    public function construcciones ()
    {
        return $this->hasMany(Construcciones::class);
    }

    /**
     * Relacion de los planetas con las construcciones
     */
    public function industrias ()
    {
        return $this->hasOne(Construcciones::class);
    }
}