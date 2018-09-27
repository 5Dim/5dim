<?php

namespace App;
use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class EnDiseños extends Model
{
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    //Funcion para terminar las ordenes terminadas
    public static function terminarColaDiseños() {
        $colas = EnDiseños::where('finished_at', '<=', date("Y-m-d H:i:s"))->get();
        $reciclaje = Constantes::where('codigo', 'perdidaReciclar')->first()->valor;

        foreach ($colas as $cola) {
            $diseño = DiseñosEnPlaneta::where([
                ['diseños_id', $cola->diseños_id],
                ['planetas_id', $cola->planetas_id]
            ])->first();

            if (!empty($diseño)) {
                //En caso de reciclaje debe devolver los recursos
                if ($cola->accion == "Reciclando") {
                    $coste = $cola->diseños->costes;
                    $recursos = $cola->planetas->recursos;
                    $diseño->cantidad -= $cola->cantidad;

                    //Restaurar beneficio por reciclaje
                    $recursos->mineral += (($coste->mineral * $cola->cantidad) * $reciclaje);
                    $recursos->cristal += (($coste->cristal * $cola->cantidad) * $reciclaje);
                    $recursos->gas += (($coste->gas * $cola->cantidad) * $reciclaje);
                    $recursos->plastico += (($coste->plastico * $cola->cantidad) * $reciclaje);
                    $recursos->ceramica += (($coste->ceramica * $cola->cantidad) * $reciclaje);
                    $recursos->liquido += (($coste->liquido * $cola->cantidad) * $reciclaje);
                    $recursos->micros += (($coste->micros * $cola->cantidad) * $reciclaje);
                    $recursos->save();
                }else{
                    $diseño->cantidad += $cola->cantidad;
                }
            }else{
                $diseño = new DiseñosEnPlaneta();
                $diseño->planetas_id = $cola->planetas_id;
                $diseño->cantidad = $cola->cantidad;
                $diseño->diseños_id = $cola->diseños_id;
                $coste = $cola->diseños->costes;
                $diseño->tipo = $cola->diseños->fuselajes->tipo;
            }
            $diseño->save();
            $cola->delete();
        }
    }

    public static function cadenaProduccion ($cantidad, $tamaño) {

        $PConstantes=Constantes::where('tipo','produccion')->get();
        $ahorroXCantidad=$PConstantes->where('codigo','ahorroXCantidad')->first()->valor ;
        $maximoAhorroXCantidad=$PConstantes->where('codigo','maximoAhorroXCantidad')->first()->valor ;

        $factorTamaño=100;

        switch($tamaño){
            case 0: //caza
                $factorTamaño=$PConstantes->where('codigo','AhorroXcazas')->first()->valor /100;
            break;
            case 1:
                $factorTamaño=$PConstantes->where('codigo','AhorroXligeras')->first()->valor /100;
            break;
            case 2:
                $factorTamaño=$PConstantes->where('codigo','AhorroXmedias')->first()->valor /100;
            break;
            case 3:
                $factorTamaño=$PConstantes->where('codigo','AhorroXpesadas')->first()->valor /100;
            break;
            case 4:
                $factorTamaño=$PConstantes->where('codigo','AhorroXestacion')->first()->valor /100;
            break;
        }

        $factor=1-(pow($cantidad,2)*1/($ahorroXCantidad*100000))/$factorTamaño;
        if ($factor<$maximoAhorroXCantidad){$factor=$maximoAhorroXCantidad;}
        if ($factor>1){$factor=1;}
        if ($cantidad==1){$factor=1;}

        return  $factor;

    }

    public static function tiempoProduccion ($cantidad, $nivelFabrica,$tiempoxunidad) {

        $velhangarxnivel= Constantes::where('codigo', 'velhangarxnivel')->first()->valor;

        $velprodhangar= (1+(($nivelFabrica * $velhangarxnivel)/100)); //por lo que se divide el tiempo, cada nivel un 20 %
        $periodo= (1 * $tiempoxunidad)/$velprodhangar; //tiempo por unidad
        $tiempocns = ($cantidad * $tiempoxunidad)/$velprodhangar;

        return $tiempocns;

    }


}