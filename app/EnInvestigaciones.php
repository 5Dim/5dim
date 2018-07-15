<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnInvestigaciones extends Model
{

    public function investigaciones ()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

}