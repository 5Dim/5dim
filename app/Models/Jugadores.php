<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jugadores extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planetas()
    {
        return $this->hasMany(Planetas::class);
    }

    public function investigaciones()
    {
        return $this->hasMany(Investigaciones::class);
    }

    public function fuselajes()
    {
        return $this->belongsToMany(Fuselajes::class);
    }

    public function mensajes()
    {
        return $this->hasMany(Mensajes::class, 'emisor');
    }

    public function intervinientes()
    {
        return $this->hasMany(MensajesIntervinientes::class, 'receptor');
    }

    public function alianzas()
    {
        return $this->belongsTo(Alianzas::class);
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudesAlianzas::class);
    }

    public function disenios()
    {
        return $this->belongsToMany(Disenios::class);
    }

    public static function calcularPuntos($idJugador)
    {
        $puntosJugador = 0;
        $jugador = Jugadores::find($idJugador);
        foreach ($jugador->planetas as $planeta) {
            if (!empty($planeta)) {
                foreach ($planeta->construcciones as $construccion) {
                    $puntosJugador += $construccion->nivel;
                }
            }
        }
        $jugador->puntos_construccion = $puntosJugador * 1000;
        $puntosJugador = 0;
        foreach ($jugador->investigaciones as $investigacion) {
            if (!empty($investigacion)) {
                $puntosJugador += $investigacion->nivel;
            }
        }
        $jugador->puntos_investigacion = $puntosJugador * 1000;
        $jugador->save();
    }

    public static function nuevoJugador () {
        $jugador = new Jugadores();
        $jugador->nombre = Auth::user()->name;
        $jugador->avatar = "/img/avatar.jpg";
        $jugador->user_id = Auth::user()->id;
        $jugador->save();
        $planetaElegido = Planetas::inRandomOrder()->first();
        $planetaElegido->jugadores_id = $jugador->id;
        $planetaElegido->save();
        CualidadesPlanetas::agregarCualidades($planetaElegido->id, 40);
    }
}
