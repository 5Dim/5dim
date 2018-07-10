<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industrias extends Model
{
    public $timestamps = false;
    /**
     * Relacion de los construcciones con el planeta
     */
    public function planeta ()
    {
        return $this->belongsTo(Planetas::class);
    }
}