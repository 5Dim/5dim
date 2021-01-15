<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;

    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class, 'emisor');
    }

    public function intervinientes ()
    {
        return $this->hasMany(MensajesIntervinientes::class);
    }
}
