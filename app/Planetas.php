<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planetas extends Model
{
    /**
     * Relacion de los planetas con los usuarios
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relacion de los planetas con los usuarios
     */
    public function recursos ()
    {
        return $this->belongsTo(Recursos::class);
    }
}
