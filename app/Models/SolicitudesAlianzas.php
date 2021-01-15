<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesAlianzas extends Model
{
    use HasFactory;

    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function alianzas ()
    {
        return $this->belongsTo(Alianzas::class);
    }
}
