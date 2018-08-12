<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function planetas ()
    {
        return $this->hasMany(Planetas::class);
    }

    public function investigaciones ()
    {
        return $this->hasMany(Investigaciones::class);
    }

    public function fuselajes ()
    {
        return $this->belongsToMany(Fuselajes::class);
    }

    public function mensajes ()
    {
        return $this->hasMany(Mensajes::class, 'emisor');
    }

    public function intervinientes ()
    {
        return $this->hasMany(MensajesIntervinientes::class, 'receptor');
    }
}