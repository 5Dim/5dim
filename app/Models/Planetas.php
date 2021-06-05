<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Planetas extends Model
{
    use HasFactory;

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function recursos()
    {
        return $this->hasOne(Recursos::class);
    }

    public function construcciones()
    {
        return $this->hasMany(Construcciones::class);
    }

    public function industrias()
    {
        return $this->hasOne(Construcciones::class);
    }

    public function enInvestigaciones()
    {
        return $this->hasMany(EnInvestigaciones::class);
    }

    public function cualidades()
    {
        return $this->hasOne(CualidadesPlanetas::class);
    }

    public function estacionadas()
    {
        return $this->hasMany(DiseniosEnFlota::class);
    }

    public function enDisenios()
    {
        return $this->hasMany(EnDisenios::class);
    }

    public function objetivos()
    {
        return $this->hasMany(Destinos::class);
    }

    // Nuevo planeta de inicio.
    public static function nuevoPlaneta($idJugador)
    {
        //
        $i = 0;
        $sistema = 0;
        $planetaElegido = new Planetas();
        while (!empty($planetaElegido) && $i < 500) {
            $sistema = rand(0, 9999);
            $planetaElegido = Planetas::where('estrella', $sistema)->first();
            $i++;
            //Log::info("WHILE " . $sistema);
        }
        if (!empty($planetaElegido)) {
            $planetaElegido = Planetas::where([['tipo', 'planeta'], ['jugadores_id', null]])->inRandomOrder()->first();
        } else {
            $orbita = rand(1, 6);
            $planetaElegido = new Planetas();
            $planetaElegido->estrella = $sistema;
            $planetaElegido->orbita = $orbita;
            $planetaElegido->imagen = random_int(10, 69);
            $planetaElegido->tipo = "planeta";
        }
        $planetaElegido->jugadores_id = $idJugador;
        $planetaElegido->nombre = 'Planeta principal';
        $planetaElegido->creacion = time();
        Planetas::coordenadasBySistema($planetaElegido);
        $planetaElegido->save();
        CualidadesPlanetas::agregarCualidades($planetaElegido->id, Constantes::where('codigo', 'yacimientosIniciales')->first()->valor);

        //Asteroide de inicio
        $asteroidesAsociados = new Planetas();
        $asteroidesAsociados->estrella = $planetaElegido->estrella;
        if ($planetaElegido->orbita < 7) {
            if (empty(Planetas::where([['estrella', $planetaElegido->estrella], ['orbita', $planetaElegido->orbita - 1]])->first())) {
                $asteroidesAsociados->orbita = $planetaElegido->orbita + 1;
            } else {
                $asteroidesAsociados->orbita = $planetaElegido->orbita + 2;
            }
        } else {
            if (empty(Planetas::where([['estrella', $planetaElegido->estrella], ['orbita', $planetaElegido->orbita - 1]])->first())) {
                $asteroidesAsociados->orbita = $planetaElegido->orbita - 1;
            } else {
                $asteroidesAsociados->orbita = $planetaElegido->orbita - 2;
            }
        }
        $asteroidesAsociados->imagen = random_int(70, 79);
        $asteroidesAsociados->tipo = "asteroide";
        $asteroidesAsociados->creacion = time();
        Planetas::coordenadasBySistema($asteroidesAsociados);
        CualidadesPlanetas::agregarCualidades($asteroidesAsociados->id, Constantes::where('codigo', 'yacimientosInicialesAsteriode')->first()->valor);

        return $planetaElegido->id;
    }

    // dado un planeta de sistema se obtienen las coordenadas x e y
    public static function coordenadasBySistema($planeta)
    {
        $nsistema = $planeta->estrella;
        $anchouniverso = Constantes::where('codigo', 'anchouniverso')->first()->valor;
        $luzdemallauniverso = Constantes::where('codigo', 'luzdemallauniverso')->first()->valor;

        $cy = floor($nsistema / $anchouniverso) * 10;
        $cx = ($nsistema - floor($nsistema / $anchouniverso) * $anchouniverso) * $luzdemallauniverso;
        $planeta->coordx = $cx;
        $planeta->coordy = $cy;
        $planeta->save();
    }
}
