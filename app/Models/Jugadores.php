<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    use HasFactory;

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function planetas ()
    {
        return $this->hasMany(Planetas::class);
    }

    public function investigaciones ()
    {
        return $this->hasMany(Investigaciones::class);
    }

    public function fuselajes ()
    {
        return $this->belongsToMany(Fuselajes::class);
    }

    public function mensajes ()
    {
        return $this->hasMany(Mensajes::class, 'emisor');
    }

    public function intervinientes ()
    {
        return $this->hasMany(MensajesIntervinientes::class, 'receptor');
    }

    public function alianzas ()
    {
        return $this->belongsTo(Alianzas::class);
    }

    public function solicitudes ()
    {
        return $this->hasMany(SolicitudesAlianzas::class);
    }

    public function disenios ()
    {
        return $this->belongsToMany(Disenios::class);
    }

    public static function calcularPuntos ($idPlaneta)
    {
        $puntosJugador = 0;
        $jugador = Jugadores::find($idPlaneta);
        foreach ($jugador->planetas as $planeta) {
            if (!empty($planeta)) {
                foreach ($planeta->construcciones as $construccion) {
                    if ($construccion->codigo != "almMineral" and $construccion->codigo != "almCristal") {
                        $puntosJugador += $construccion->nivel;
                    }
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
