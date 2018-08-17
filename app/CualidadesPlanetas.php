<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CualidadesPlanetas extends Model
{
    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }
}