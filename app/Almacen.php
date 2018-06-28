<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nivel', 'capacidad',
    ];

    public function  generarDatosAlmacenes(){
        $almacen =new Almacen();
        $almacen->nivel=1;
        $almacen->capacidad=222;
        return $almacen;
    }
}