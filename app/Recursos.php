<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    public static function calcularRecursos ($id)
    {
        $recursos = Recursos::where('planeta_id', $id)->first();
        return $recursos;
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function planeta ()
    {
        return $this->belongsTo(Planetas::class);
    }
}
