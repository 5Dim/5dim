<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    /**
     * Relacion de los construcciones con el planeta
     */
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'emisor');
    }

    /**
     * Relacion de los usuarios con los planetas
     */
    public function intervinientes ()
    {
        return $this->hasMany(MensajesIntervinientes::class);
    }
}