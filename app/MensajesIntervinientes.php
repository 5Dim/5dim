<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajesIntervinientes extends Model
{
    /**
     * Relacion de los construcciones con el planeta
     */
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'receptor');
    }

    /**
     * Relacion de los construcciones con el planeta
     */
    public function mensajes ()
    {
        return $this->belongsTo(Mensajes::class);
    }
}