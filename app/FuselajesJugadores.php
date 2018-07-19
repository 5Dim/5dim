<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuselajesJugadores extends Model
{

    public function cualidades ()
    {
        return $this->hasOne(CualidadesFuselajes::class);
    }

    public function costes ()
    {
        return $this->hasOne(CostesFuselajes::class);
    }

    public function jugadores ()
    {
        return $this->belongsToMany(CualidadesFuselajes::class);
    }
}