<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnConstrucciones extends Model
{

    /**
     * Relacion de enConstruccion con los construcciones
     */
    public function construcciones ()
    {
        return $this->belongsTo(Construcciones::class);
    }
}