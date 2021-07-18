<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class GruposNaves extends Model
{
    use HasFactory;

    //insert into grupos_naves  (coordx,coordy,nombre,jugadores_id,pordefecto) values(0,0,'por defecto',1,1)
    public static function crearGrupoPorDefecto($jugador_id){
        $grupoDefecto=new GruposNaves();
        $grupoDefecto->jugadores_id= $jugador_id;
        $grupoDefecto->nombre= "Por defecto";
        $grupoDefecto->pordefecto= 1;
        $grupoDefecto->save();
    }

    public function GuardarGruposNaves() {

        Log::info("llegando...");


    }
}
