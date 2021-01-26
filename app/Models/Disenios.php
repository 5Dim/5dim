<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Disenios extends Model
{
    use HasFactory;

    public function jugadores()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function danios()
    {
        return $this->hasOne(DaniosDisenios::class);
    }

    public function cualidades()
    {
        return $this->hasOne(CualidadesDisenios::class);
    }

    public function costes()
    {
        return $this->hasOne(CostesDisenios::class);
    }

    public function viewDisenios()
    {
        return $this->hasOne(ViewDisenios::class);
    }

    public function viewDanios()
    {
        return $this->hasOne(ViewDaniosDisenios::class);
    }

    public function cola()
    {
        return $this->hasMany(EnDisenios::class);
    }

    public function fuselajes()
    {
        return $this->belongsTo(Fuselajes::class);
    }

    public function estacionadas()
    {
        return $this->hasOne(DiseniosEnPlaneta::class);
    }

    public function creador()
    {
        return $this->belongsTo(Jugadores::class, 'jugadores_id');
    }

    public function mejoras()
    {
        return $this->hasMany(MejorasDisenios::class);
    }

    public function generarDatosDisenios()
    {

        // $disenios = [];
        // $costesDisenios = [];

        // $disenio = new Disenios();
        // $disenio->nombre = 'Recolector';
        // $disenio->posicion = 9;
        // $disenio->descripcion = "Podemos dejar esta nave en órbita de asteroides para recolectar y otra nave que traiga los recursos.";
        // $disenio->fuselajes_id = 69;
        // $disenio->codigo = "RECOLECTOR";
        // $disenio->skin = 1;
        // $disenio->jugadores_id = 1;
        // array_push($disenios, $disenio);

        // $disenio = new Disenios();
        // $disenio->nombre = 'Remolcador';
        // $disenio->posicion = 9;
        // $disenio->descripcion = "Esta nave está diseniada para remolcar estaciones o mover planetoides colonizados.";
        // $disenio->fuselajes_id = 70;
        // $disenio->codigo = "REMOLCADOR";
        // $disenio->skin = 1;
        // $disenio->jugadores_id = 1;
        // array_push($disenios, $disenio);



        // foreach ($disenios as $estedisenio) {
        //     $estedisenio->save();
        // }

        //return $result;
    }
}
