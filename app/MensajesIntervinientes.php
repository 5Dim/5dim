<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajesIntervinientes extends Model
{
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'receptor');
    }

    public function mensajes ()
    {
        return $this->belongsTo(Mensajes::class);
    }
}