<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiendasHistorial extends Model
{
    public function tienda ()
    {
        return $this->belongsTo(Tiendas::class);
    }

    public function construcciones ()
    {
        return $this->belongsTo(TiendasHistorial::class);
    }
}