<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
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
        $almacen =new Almacenes();
        $almacen->nivel=1;
        $almacen->capacidad=222;
        return $almacen;
    }
}
