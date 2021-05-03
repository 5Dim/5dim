<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostesConstrucciones;
use App\Models\Industrias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Construcciones extends Model
{
    use HasFactory;

    // No queremos timestamps en este modelo
    public $timestamps = false;

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    public function enConstrucciones()
    {
        return $this->hasMany(EnConstrucciones::class);
    }

    public static function listaNombres()
    {
        $listaNombres = [
            // Minas
            "indPersonal",
            "minaMineral",
            "minaCristal",
            "minaGas",
            "minaPlastico",
            "minaCeramica",
            // Industrias
            "indLiquido",
            "indMicros",
            "indFuel",
            "indMA",
            "indMunicion",
            // Almacenes
            "almGas",
            "almPlastico",
            "almCeramica",
            "almLiquido",
            "almMicros",
            "almFuel",
            "almMA",
            "almMunicion",
            // Militares
            "refugio",
            "hangar",
            //  Desarrollo
            "laboratorio",
            "comercio",
            // Observacion
            "observacion",
            "inhibidorHMA",

            // //Especializaciones
            "potenciador",
            "terraformadorMinero",
            // "terraformadorIndustrial",
            // "redLogistica",
            // "megaAstillero",
            // "redInvestigacion",
            // "redObservatorios",
            // "redComercio",
            // // Especiales
            // "nodEstructura",
            // "nodMotorMA",
            // "disparoFlotas",
            // "teleportFlota",
            // "teleportNodriza",
        ];
        return $listaNombres;
    }

    public static function listaCategorias()
    {
        $listaCategoriasPorOrden = [
            // Minas
            "mina",
            "mina",
            "mina",
            "mina",
            "mina",
            "mina",
            // Industrias
            "industria",
            "industria",
            "industria",
            "industria",
            "industria",
            // Almacenes
            "almacen",
            "almacen",
            "almacen",
            "almacen",
            "almacen",
            "almacen",
            "almacen",
            "almacen",
            // Militares
            "militar",
            "militar",
            // Desarrollo
            "desarrollo",
            "desarrollo",
            // Observacion
            "observacion",
            "observacion",
            //Especializaciones
            "especializacion",
            "especializacion",
            "especializacion",
            "especializacion",
            "especializacion",
            "especializacion",
            "especializacion",
            "especializacion",
            // Especiales
            "especial",
            "especial",
            "especial",
            "especial",
            "especial",
        ];
        return $listaCategoriasPorOrden;
    }

    public function sumarCostes($coste)
    {
        $nuevoCoste = $coste->mineral + $coste->cristal + $coste->gas + $coste->plastico + $coste->ceramica + $coste->liquido + $coste->micros;

        return $nuevoCoste;
    }

    public function calcularTiempoConstrucciones($preciototal, $personal)
    {
        $velocidadConst = Constantes::where('codigo', 'velocidadConst')->first();
        if (is_numeric($personal) && $personal > 0) {
            $result = (($preciototal * $velocidadConst->valor) / $personal);
        } else {
            $result = "sin personal";
        }
        return $result;
    }

    public static function nuevaColonia($planeta)
    {
        $listaConstrucciones = [];
        $listaNombres = Construcciones::listaNombres();
        $listaCategoriasPorOrden = Construcciones::listaCategorias();

        for ($i = 0; $i < count($listaNombres); $i++) {
            $construccion = new Construcciones();
            $construccion->planetas_id = $planeta;
            $construccion->codigo = $listaNombres[$i];
            $construccion->categoria = $listaCategoriasPorOrden[$i];
            // $construccion->nivel = 0;
            array_push($listaConstrucciones, $construccion);
        }

        $industrias = new Industrias();
        $industrias->planetas_id = $planeta;
        $industrias->liquido = false;
        $industrias->micros = false;
        $industrias->fuel = false;
        $industrias->ma = false;
        $industrias->municion = false;

        DB::beginTransaction();
        try {
            foreach ($listaConstrucciones as $construccion) {
                $construccion->save();
            }
            $industrias->save();
            DB::commit();
        } catch (\Throwable $e) {
            Log::info("ERROR NUEVO PLANETA: " . $e);
            DB::rollBack();
        }
    }

    public static function construcciones()
    {
        $construcciones = Construcciones::where('planetas_id', session()->get('planetas_id'))->get();
        if (empty($construcciones[0]->codigo)) {
            Construcciones::nuevaColonia(session()->get('planetas_id'));
            $construcciones = Construcciones::where('planetas_id', session()->get('planetas_id'))->get();
        }
        return $construcciones;
    }
}
