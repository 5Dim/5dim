<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    public function creador()
    {
        return $this->hasOne(Jugadores::class, 'id', "jugadores_id");
    }

    public static function idMiembros($alianza)
    {
        $alianza = Alianzas::find($alianza);
        $idMiembros = [];
        foreach ($alianza->miembros as $miembro) {
            array_push($idMiembros, $miembro->id);
        }
        return $idMiembros;
    }

    public static function jugadorAlianza($alianza)
    {
        $alianza = Alianzas::find($alianza)->nombre;
        $jugadorAlianza = Jugadores::where('nombre', $alianza)->first();

        return $jugadorAlianza;
    }

    //para cosas propias, me quito a mi y a mi propia alianza-jugador
    public static function idMiembrosSinMi($alianza, $miId)
    {
        $alianza = Alianzas::find($alianza);
        $idMiembros = [];
        foreach ($alianza->miembros as $miembro) {
            if ($miembro->id != $miId && $miembro->user_id != null) {
                array_push($idMiembros, $miembro->id);
            }
        }
        return $idMiembros;
    }

    // mira para las flotas si el jugador propietario (que NO el jugador activo) puede hacer cosas como propias en destino
    public static function idSoyYoOMiAlianza($idMio, $idDestino)
    {
        if ($idMio == $idDestino) {
            return true;
        }

        $miJugador = Jugadores::where("id", $idMio)->first();

        if ($miJugador->alianzas_id != null) {
            $miAlianza = Alianzas::where("id", $miJugador['alianzas_id'])->first();
            if ($miAlianza != null && Alianzas::jugadorAlianza($miAlianza->id) == $idDestino) {
                return true;
            }
        }



        return false;
    }
}
