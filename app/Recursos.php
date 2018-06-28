<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    public $timestamps = false;
    public static function calcularRecursos ($id)
    {
        $recursos = Recursos::where('planeta_id', $id)->first();
        return $recursos;
    }
}
