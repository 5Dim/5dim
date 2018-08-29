<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alianzas extends Model
{
    public function solicitudes ()
    {
        return $this->hasMany(SolicitudesAlianzas::class);
    }
    public function miembros ()
    {
        return $this->hasMany(Jugadores::class);
    }
}