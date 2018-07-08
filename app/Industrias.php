<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industrias extends Model
{
    /**
     * Relacion de los construcciones con el planeta
     */
    public function planeta ()
    {
        return $this->belongsTo(Planetas::class);
    }
}