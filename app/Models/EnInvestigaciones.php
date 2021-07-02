<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investigaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnInvestigaciones extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function investigaciones()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaInvestigaciones()
    {
        DB::beginTransaction();
        try {
            $colas = EnInvestigaciones::where('finished_at', '<=', date("Y-m-d H:i:s"))->lockForUpdate()->get();
            foreach ($colas as $cola) {
                $cola->investigaciones->nivel = $cola->nivel;
                if (!empty($cola->investigaciones->jugadores->alianzas)) {
                    $jugadoresDeAlianza = Jugadores::where('alianzas_id', $cola->investigaciones->jugadores->alianzas_id)->get();
                    foreach ($jugadoresDeAlianza as $jugador) {
                        $invest = $jugador->investigaciones->where('codigo', $cola->investigaciones->codigo)->first();
                        $invest->nivel = $cola->nivel;
                        $invest->save();
                    }
                }
                $cola->investigaciones->save();
                $cola->motivo_delete = "Finalizado";
                $cola->save();
                $cola->delete();
                Jugadores::calcularPuntos($cola->planetas->jugadores->id);
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("[ERROR] COLA INVESTIGACIONES");
            Log::error($e);
        }
    }

    public static function colaInvestigaciones()
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $colaInvestigaciones = [];
        $colaInvestigaciones2 = [];
        if (!empty($jugadorActual->alianzas)) {
            $miembros = Alianzas::idMiembros($jugadorActual->alianzas->id);
        } else {
            $miembros = [session()->get('jugadores_id')];
        }
        $investigaciones = Investigaciones::whereIn('jugadores_id', $miembros)->get();
        foreach ($investigaciones as $investigacion) {
            if (!empty($investigacion->enInvestigaciones[0])) {
                array_push($colaInvestigaciones2, $investigacion->enInvestigaciones);
            }
        }
        for ($i = 0; $i < count($colaInvestigaciones2); $i++) {
            if (!empty($colaInvestigaciones2[$i])) {
                foreach ($colaInvestigaciones2[$i] as $colita) {
                    array_push($colaInvestigaciones, $colita);
                }
            }
        }
        // dd($colaInvestigaciones);
        // dd(collect($colaInvestigaciones)->where('codigo', "invTitanio"));
        return $colaInvestigaciones;
    }
}
