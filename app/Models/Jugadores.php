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

    public function enVuelo()
    {
        return $this->hasMany(EnVuelo::class);
    }

    public function enOrbita()
    {
        return $this->hasMany(EnOrbita::class);
    }

    public function enRecoleccion()
    {
        return $this->hasMany(EnRecoleccion::class);
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
        if (!empty($jugador->alianzas)) {
            $puntosJugador = 0;
            $jugador = Jugadores::where('nombre', $jugador->alianzas->nombre)->first();
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
    }

    public static function nuevoJugador()
    {
        if (empty(Auth::user()->jugador)) {
            $jugador = new Jugadores();
            $jugador->nombre = Auth::user()->name;
            $jugador->avatar = "http://161.97.143.51/img/avatar.png";
            $jugador->user_id = Auth::user()->id;
            $jugador->save();
        } else {
            $jugador = Auth::user()->jugador;
        }
        Planetas::nuevoPlaneta($jugador->id);
        Mensajes::bienvenida($jugador->id);

        return $jugador;
    }
}
