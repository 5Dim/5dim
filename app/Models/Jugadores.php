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
        $jugador = Auth::user()->jugador;
        if (!empty($jugador->planetas)) {
            // Multiplicador costes recursos
            $multiplicadorMineral = Constantes::where('codigo', 'multiplicadorMineral')->first()->valor;
            $multiplicadorCristal = Constantes::where('codigo', 'multiplicadorCristal')->first()->valor;
            $multiplicadorGas = Constantes::where('codigo', 'multiplicadorGas')->first()->valor;
            $multiplicadorPlastico = Constantes::where('codigo', 'multiplicadorPlastico')->first()->valor;
            $multiplicadorCeramica = Constantes::where('codigo', 'multiplicadorCeramica')->first()->valor;

            //Multiplicador industrias
            $costoLiquido = Constantes::where('codigo', 'costoLiquido')->first()->valor;
            $costoMicros = Constantes::where('codigo', 'costoMicros')->first()->valor;
            $costoFuel = Constantes::where('codigo', 'costoFuel')->first()->valor;
            $costoMa = Constantes::where('codigo', 'costoMa')->first()->valor;
            $costoMunicion = Constantes::where('codigo', 'costoMunicion')->first()->valor;

            // Puntos
            $puntosConstruccion = 0;
            foreach ($jugador->planetas as $planeta) {
                if (!empty($planeta)) {
                    $costesConstrucciones = CostesConstrucciones::generaCostesConstrucciones($planeta->construcciones);
                    foreach ($costesConstrucciones as $coste) {
                        $costeTotal = 0;
                        $costeTotal += ($coste->mineral * $multiplicadorMineral) +
                            ($coste->cristal * $multiplicadorCristal) +
                            ($coste->gas * $multiplicadorGas) +
                            ($coste->plastico * $multiplicadorPlastico) +
                            ($coste->ceramica * $multiplicadorCeramica) +

                            ($coste->liquido * ($multiplicadorMineral * $costoLiquido)) +
                            ($coste->micros * ($multiplicadorCristal * $costoMicros));
                        $puntosConstruccion += $costeTotal;
                    }
                }
            }

            $puntosInvestigacion = 0;
            $investiga = new CostesInvestigaciones();
            $costeInvestigaciones = $investiga->generaCostesInvestigaciones($jugador->investigaciones);
            foreach ($costeInvestigaciones as $coste) {
                if (!empty($coste)) {
                    $costeTotal = 0;
                    $costeTotal += ($coste->mineral * $multiplicadorMineral) +
                        ($coste->cristal * $multiplicadorCristal) +
                        ($coste->gas * $multiplicadorGas) +
                        ($coste->plastico * $multiplicadorPlastico) +
                        ($coste->ceramica * $multiplicadorCeramica) +

                        ($coste->liquido * ($multiplicadorMineral * $costoLiquido)) +
                        ($coste->micros * ($multiplicadorCristal * $costoMicros)) +
                        ($coste->fuel * ($multiplicadorGas * $costoFuel)) +
                        ($coste->ma * ($multiplicadorPlastico * $costoMa)) +
                        ($coste->municion * ($multiplicadorCeramica * $costoMunicion));
                    $puntosInvestigacion += $costeTotal;
                }
            }

            $puntosFlotas = 0;
            $enOrbita = $jugador->enOrbita;
            foreach ($enOrbita as $flota) {
                if (!empty($flota)) {
                    $costeTotal = 0;
                    $costeTotal += $flota->creditos;
                    $puntosFlotas += $costeTotal;
                }
            }
            $enVuelo = $jugador->enVuelo;
            foreach ($enVuelo as $flota) {
                if (!empty($flota)) {
                    $costeTotal = 0;
                    $costeTotal += $flota->creditos;
                    $puntosFlotas += $costeTotal;
                }
            }
            $enRecoleccion = $jugador->enRecoleccion;
            foreach ($enRecoleccion as $flota) {
                if (!empty($flota)) {
                    $costeTotal = 0;
                    $costeTotal += $flota->creditos;
                    $puntosFlotas += $costeTotal;
                }
            }
            $planetas = $jugador->planetas;
            foreach ($planetas as $planeta) {
                foreach ($planeta->estacionadas as $disenio) {
                    if (!empty($disenio)) {
                        $costeTotal = 0;
                        $costeTotal += $disenio->disenios->mejoras->mantenimiento * $disenio->cantidad;
                        $puntosFlotas += $costeTotal;
                    }
                }
            }

            $recursosPorPuntos = Constantes::where('codigo', 'recursosPorPuntos')->first()->valor;
            $jugador->puntos_construccion = $puntosConstruccion / $recursosPorPuntos;
            $jugador->puntos_investigacion = $puntosInvestigacion / $recursosPorPuntos;
            $jugador->puntos_flotas = $puntosFlotas;
            // dd($puntosFlotas);
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

            $nombreJugon = substr($jugador->nombre, 4);
            $timestamp = (int) round(now()->format('Uu') / pow(10, 6 - 3));
            $jugador->baliza = substr($nombreJugon, 0, 3) . substr($timestamp, 5);
            $jugador->movimientos = 1;

            $jugador->save();
        } else {
            $jugador = Auth::user()->jugador;
        }
        Planetas::nuevoPlaneta($jugador->id);
        Mensajes::bienvenida($jugador->id);
        GruposNaves::crearGrupoPorDefecto($jugador->id);

        return $jugador;
    }
}
