<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(DiseniosEnPlaneta::class);
    }

    public function enDisenios()
    {
        return $this->hasMany(EnDisenios::class);
    }

    // Nuevo planeta de inicio.
    public static function nuevoPlaneta($idJugador)
    {
        $planetaElegido = Planetas::inRandomOrder()->first();
        $planetaElegido->jugadores_id = $idJugador;
        if ($planetaElegido->nombre == '' || $planetaElegido->nombre == null) {
            $planetaElegido->nombre = 'Colonia';
        }
        $planetaElegido->save();
        CualidadesPlanetas::agregarCualidades($planetaElegido->id, Constantes::where('codigo', 'yacimientosIniciales')->first()->valor);

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
