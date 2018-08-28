<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'emisor');
    }

    public function intervinientes ()
    {
        return $this->hasMany(MensajesIntervinientes::class);
    }
}