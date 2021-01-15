<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendasHistorial extends Model
{
    use HasFactory;

    public function tienda ()
    {
        return $this->belongsTo(Tiendas::class);
    }

    public function construcciones ()
    {
        return $this->belongsTo(TiendasHistorial::class);
    }
}
