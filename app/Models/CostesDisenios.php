<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostesDisenios extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function disenios ()
    {
        return $this->belongsTo(Disenios::class);
    }

    public static function generarDatosCostesDisenios(){


        // $costesDisenios=[];
        // $n=1;

        // $costes=new CostesDisenios(); //recolector
        // $costes->mineral=50000;
        // $costes->cristal=40000;
        // $costes->gas=4000;
        // $costes->plastico=4000;
        // $costes->ceramica=6000;
        // $costes->liquido=1500;
        // $costes->micros=9000;
        // $costes->personal=4;
        // $costes->masa=100000;
        // $costes->energia=0;
        // $costes->disenios_id=$n;
        // array_push($costesDisenios, $costes);
        // $n++;

        // $costes=new CostesDisenios(); //remolcador
        // $costes->mineral=2000000;
        // $costes->cristal=1000000;
        // $costes->gas=150000;
        // $costes->plastico=100000;
        // $costes->ceramica=50000;
        // $costes->liquido=40000;
        // $costes->micros=30000;
        // $costes->personal=400;
        // $costes->masa=10000000;
        // $costes->energia=0;
        // $costes->disenios_id=$n;
        // array_push($costesDisenios, $costes);
        // $n++;


        // foreach($costesDisenios as $estecosto){
        //     $estecosto->save();
        // }


    }
}
