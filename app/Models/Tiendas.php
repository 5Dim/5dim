<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    use HasFactory;

    public function transacciones ()
    {
        return $this->hasMany(TiendasHistorial::class);
    }

    public static function generarDatosTiendas ()
    {
        $tiendas=[];

        $tienda = new tiendas();
        $tienda->codigo = 'premium1';
        $tienda->coste = 15;
        array_push($tiendas, $tienda);

        foreach($tiendas as $estaTienda){
            $estaTienda->save();
        }
    }
}
