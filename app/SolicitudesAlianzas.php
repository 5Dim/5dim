<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudesAlianzas extends Model
{
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function alianzas ()
    {
        return $this->belongsTo(Alianzas::class);
    }
}