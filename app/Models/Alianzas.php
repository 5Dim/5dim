<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alianzas extends Model
{
    use HasFactory;

    public function solicitudes()
    {
        return $this->hasMany(SolicitudesAlianzas::class);
    }

    public function miembros()
    {
        return $this->hasMany(Jugadores::class);
    }

    public function creador() {
        return $this->hasOne(Jugadores::class, 'id', "jugadores_id");
    }

    public static function idMiembros($alianza) {
        $alianza = Alianzas::find($alianza);
        $idMiembros = [];
        foreach ($alianza->miembros as $miembro) {
            array_push($idMiembros, $miembro->id);
        }

        return $idMiembros;
    }

    public function jugadorAlianza($alianza) {
        $alianza = Alianzas::find($alianza)->nombre;
        $jugadorAlianza = Jugadores::where('nombre', $alianza)->first();

        return $jugadorAlianza;
    }
}
