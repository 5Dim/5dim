<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajesIntervinientes extends Model
{
    use HasFactory;

    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'receptor');
    }

    public function mensajes ()
    {
        return $this->belongsTo(Mensajes::class);
    }
}
