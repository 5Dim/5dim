<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class MensajesIntervinientes extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class, 'receptor');
    }

    public function mensajes()
    {
        return $this->belongsTo(Mensajes::class);
    }

    public static function intervinientesDeFlotas($destino, $idMensaje)
    {
        Log::info("destino " . $destino);
        $duenioFlota = $destino->flota->jugadores->id;
        $duenioDestino = null;
        if (!empty($destino->planetas_id)) {
            $duenioDestino = $destino->planetas->jugadores->id;
        } elseif (!empty($destino->en_vuelo_id)) {
            $duenioDestino = $destino->enVuelo->jugadores->id;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $duenioDestino = $destino->enRecoleccion->jugadores->id;
        } elseif (!empty($destino->en_orbita_id)) {
            $duenioDestino = $destino->enOrbita->jugadores->id;
        }

        if ($duenioFlota == $duenioDestino) {
            $receptor = new MensajesIntervinientes();
            $receptor->leido = false;
            $receptor->mensajes_id = $idMensaje;
            $receptor->receptor = $duenioFlota;
            $receptor->save();
        } else {
            $receptor = new MensajesIntervinientes();
            $receptor->leido = false;
            $receptor->mensajes_id = $idMensaje;
            $receptor->receptor = $duenioFlota;
            $receptor->save();

            $receptor = new MensajesIntervinientes();
            $receptor->leido = false;
            $receptor->mensajes_id = $idMensaje;
            $receptor->receptor = $duenioDestino;
            $receptor->save();
        }
    }
}
