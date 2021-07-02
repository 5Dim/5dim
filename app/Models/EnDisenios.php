<?php

namespace App\Models;

use App\Models\Constantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnDisenios extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function disenios()
    {
        return $this->belongsTo(Disenios::class);
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaDisenios()
    {
        DB::beginTransaction();
        try {
            $colas = EnDisenios::where('finished_at', '<=', date("Y-m-d H:i:s"))->lockForUpdate()->get();

            foreach ($colas as $cola) {
                $disenio = DiseniosEnFlota::where([
                    ['disenios_id', $cola->disenios_id],
                    ['planetas_id', $cola->planetas_id]
                ])->first();
                $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;
                $coste = $cola->disenios->costes;
                Recursos::calcularRecursos($cola->planetas->id);
                $recursos = $cola->planetas->recursos;
                if (!empty($disenio)) {
                    //En caso de reciclaje debe devolver los recursos
                    if ($cola->accion == "Reciclando") {
                        //Restaurar beneficio por reciclaje
                        $recursos->mineral += (($coste->mineral * $cola->cantidad) * $reciclaje);
                        $recursos->cristal += (($coste->cristal * $cola->cantidad) * $reciclaje);
                        $recursos->gas += (($coste->gas * $cola->cantidad) * $reciclaje);
                        $recursos->plastico += (($coste->plastico * $cola->cantidad) * $reciclaje);
                        $recursos->ceramica += (($coste->ceramica * $cola->cantidad) * $reciclaje);
                        $recursos->liquido += (($coste->liquido * $cola->cantidad) * $reciclaje);
                        $recursos->micros += (($coste->micros * $cola->cantidad) * $reciclaje);
                        $recursos->save();
                    } else {
                        $disenio->cantidad += $cola->cantidad;
                        $disenio->save();
                    }
                } else {
                    if ($cola->accion != "Reciclando") {
                        $disenio = new DiseniosEnFlota();
                        $disenio->planetas_id = $cola->planetas_id;
                        $disenio->cantidad += $cola->cantidad;
                        $disenio->disenios_id = $cola->disenios_id;
                        $coste = $cola->disenios->costes;
                        $disenio->save();
                    } else {
                        //Restaurar beneficio por reciclaje
                        $recursos->mineral += (($coste->mineral * $cola->cantidad) * $reciclaje);
                        $recursos->cristal += (($coste->cristal * $cola->cantidad) * $reciclaje);
                        $recursos->gas += (($coste->gas * $cola->cantidad) * $reciclaje);
                        $recursos->plastico += (($coste->plastico * $cola->cantidad) * $reciclaje);
                        $recursos->ceramica += (($coste->ceramica * $cola->cantidad) * $reciclaje);
                        $recursos->liquido += (($coste->liquido * $cola->cantidad) * $reciclaje);
                        $recursos->micros += (($coste->micros * $cola->cantidad) * $reciclaje);
                        $recursos->save();
                    }
                }
                $cola->motivo_delete = "Finalizado";
                $cola->save();
                $cola->delete();
                Jugadores::calcularPuntos($cola->planetas->jugadores->id);
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("[ERROR] COLA DISEÑOS");
            Log::error($e);
        }
        Jugadores::calcularPuntos(session()->get('jugadores_id'));
    }


    public static function tiempoProduccion($cantidad, $nivelFabrica, $tiempoxunidad)
    {

        $velhangarxnivel = Constantes::where('codigo', 'velocidadHangar')->first()->valor;

        $velprodhangar = (1 + (($nivelFabrica * $velhangarxnivel) / 100)); //por lo que se divide el tiempo, cada nivel un 20 %
        $periodo = (1 * $tiempoxunidad) / $velprodhangar; //tiempo por unidad
        $tiempocns = ($cantidad * $tiempoxunidad) / $velprodhangar;

        return $tiempocns;
    }

    /*
    public function distanciatiempo($origen, $destino)
    {
        // coordenadas
        $luzdemallauniverso = $luzdemallauniverso / $freductoruni;

        if ($distancia < 100000) {
            $valveW = .00001;
        } else {
            $valveW = .5;
        };
        $tllegada1 = (1 / $Amovnaves) * pow(($distancia / ($valveW * $velock * $velock)), .5);


        $distancia = sqrt((($destinox - $origenx) * ($destinox - $origenx)) + (($destinoy - $origeny) * ($destinoy - $origeny)));

        $distancia = round($distancia * $luzdemallauniverso);
        $distancia = $distancia + $distp;
    }
    */
}
