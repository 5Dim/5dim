<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alianzas extends Model
{
    public function jugadores ()
    {
        return $this->hasMany(Jugadores::class);
    }
}