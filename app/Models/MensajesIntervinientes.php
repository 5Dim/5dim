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
        //Log::info("destino " . $destino);
        $duenioFlota = $destino->flota->jugadores->id;
        $duenioDestino = null;
        if ($destino->mision == "Recolectar" || $destino->mision == "Orbitar" || $destino->mision == "Extraer" || $destino->mision == "Colonizar") {
            $duenioDestino = $duenioFlota;
        } elseif (!empty($destino->planetas_id) && !empty($destino->planetas->jugadores)) {
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

            if(!empty($duenioDestino)){
                $receptor = new MensajesIntervinientes();
                $receptor->leido = false;
                $receptor->mensajes_id = $idMensaje;
                $receptor->receptor = $duenioDestino;
                $receptor->save();
            }
        }
    }

    public static function intervinientesErrorFlotas($idMensaje, $destino)
    {
        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $idMensaje;
        $receptor->receptor = $destino->flota->jugadores->id;
        $receptor->save();
    }

    public static function intervinientesBienvenida($idMensaje, $idJugador)
    {
        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $idMensaje;
        $receptor->receptor = $idJugador;
        $receptor->save();
    }
}
