<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Constantes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CostesConstrucciones extends Model
{
    use HasFactory;

    public $timestamps = false;
    /// eval ("\$prc1 = \$r1cce$kktua * ((pow (\$elnivel , \$potcosto))*((\$cntinic1 * pow (\$elnivel , \$lapotencia1)))*\$factoramort);");
    /**
     * Relacion de los construcciones con el coste
     */
    public function construcciones()
    {
        return $this->belongsTo(Construcciones::class);
    }
    public function modificarCostes($costeAntiguo, $costeNuevo)
    {
        $costeAntiguo->mineral = $costeNuevo->mineral;
        $costeAntiguo->cristal = $costeNuevo->cristal;
        $costeAntiguo->gas = $costeNuevo->gas;
        $costeAntiguo->plastico = $costeNuevo->plastico;
        $costeAntiguo->ceramica = $costeNuevo->ceramica;
        $costeAntiguo->liquido = $costeNuevo->liquido;
        $costeAntiguo->micros = $costeNuevo->micros;
        return $costeAntiguo;
    }


    public static function generaCostesConstrucciones($construcciones)
    {

        $avelprodminas = Constantes::where('codigo', 'avelprodminas')->first()->valor / 10;

        $costesConstruccion = [];

        foreach ($construcciones as $construccion) {
            $costesc = new CostesConstrucciones();
            $nivel = $construccion->nivel;
            if (!empty($construccion->enConstrucciones[0])) {
                $nivel = EnConstrucciones::where('construcciones_id', $construccion->id)->orderBy('id', 'desc')->first()->nivel;
            }
            $codigo = $construccion->codigo;

            switch ($codigo) {
                case "minaMineral":
                    $r1cce = [$codigo, .55, 0, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "minaCristal":
                    $r1cce = [$codigo, .5, .3, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "minaGas":
                    $r1cce = [$codigo, 1, .9, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "minaPlastico":
                    $r1cce = [$codigo, .8, .7, .6, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "minaCeramica": ///5
                    $r1cce = [$codigo, .7, .6, .5, .4, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indLiquido":
                    $r1cce = [$codigo, .6, .5, .4, .3, .2, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indMicros":
                    $r1cce = [$codigo, .4, .4, .5, .1, 0, .8, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indFuel":
                    $r1cce = [$codigo, 1, 1.8, .2, 0, 3, 0, 1, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indMA":
                    $r1cce = [$codigo, 1.5, 2, .2, .5, 3, 0, 1, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indMunicion": //10
                    $r1cce = [$codigo, .2, .3, 0, .4, .1, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "indPersonal":
                    $r1cce = [$codigo, .2, 0, 0, .2, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almGas":
                    $r1cce = [$codigo, .2, .2, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almPlastico":
                    $r1cce = [$codigo, 1, 1, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almCeramica":
                    $r1cce = [$codigo, 1.5, 1.1, 0, 1.2, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almLiquido":
                    $r1cce = [$codigo, 1.5, 1.1, 0, 0, 1, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almMicros":
                    $r1cce = [$codigo, 5, 4.5, 0, 0, 0, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almFuel":
                    $r1cce = [$codigo, 1.1, 1.1, .8, 0, 1, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almMA":
                    $r1cce = [$codigo, 2, 2.5, 1.2, 1.1, 1.7, 2, 2.5, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "almMunicion":
                    $r1cce = [$codigo, 1.2, 1.2, 0, 0, 1.2, 0, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "refugio":
                    $r1cce = [$codigo, 1.5, 1.5, 15.5, 6.9, 8.5, 1, 0, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "hangar":
                    $r1cce = [$codigo, 3, 3, .2, 1.5, 1, .5, 1.5, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "laboratorio":
                    $r1cce = [$codigo, 2, 2, 1, 1.5, 1.2, .2, 2, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "comercio":
                    $r1cce = [$codigo, 3, 15, 5.3, 1.5, .6, 1.2, 3.5, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "observacion":
                    $r1cce = [$codigo, .5, 1.0, 0, 0, 0, 0, 3.5, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "inhibidorHMA":
                    $r1cce = [$codigo, 70, 20, 15, 1, 32, 2.3, 1.3, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "potenciador":
                    $r1cce = [$codigo, 80.2, 60.5, 40.5, 0.3, 1, 5.8, 1, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                case "terraformadorMinero":
                    $r1cce = [$codigo, 55, 18, .1, 24.1, 12.5, 4.3, .7, $nivel];
                    $coste = $costesc->calculos($r1cce, $avelprodminas);
                    break;
                    // case "terraformadorIndustrial":
                    //     $r1cce = [$codigo, 55, 18, .1, 24.1, 12.5, 4.3, .7, $nivel];
                    //     $coste = $costesc->calculos($r1cce, $avelprodminas);
                    //     break;
                    // case "nodEstructura":
                    //     $r1cce = [$codigo, 3.5, 3.5, 0, 2, 0, 0, 2.8, $nivel];
                    //     $coste = $costesc->calculos($r1cce, $avelprodminas);
                    //     break;
                    // case "nodMotorMA":
                    //     $r1cce = [$codigo, 3.5, 2.8, 2, 2.8, 2.5, 4.5, 2, $nivel];
                    //     $coste = $costesc->calculos($r1cce, $avelprodminas);
                    //     break;
            }
            array_push($costesConstruccion, $coste);
        }
        // dd($costesConstruccion);
        return $costesConstruccion;
    }


    public static function generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion)
    {
        $avelprodminas = Constantes::where('codigo', 'avelprodminas')->first()->valor / 10;
        $costesc = new CostesConstrucciones();
        switch ($codigo) {
            case "minaMineral":
                $r1cce = [$codigo, .55, 0, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "minaCristal":
                $r1cce = [$codigo, .5, .3, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "minaGas":
                $r1cce = [$codigo, 1, .9, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "minaPlastico":
                $r1cce = [$codigo, .8, .7, .6, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "minaCeramica": ///5
                $r1cce = [$codigo, .7, .6, .5, .4, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indLiquido":
                $r1cce = [$codigo, .6, .5, .4, .3, .2, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indMicros":
                $r1cce = [$codigo, .4, .4, .5, .1, 0, .8, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indFuel":
                $r1cce = [$codigo, 1, 1.8, .2, 0, 3, 0, 1, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indMA":
                $r1cce = [$codigo, 1.5, 2, .2, .5, 3, 0, 1, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indMunicion": //10
                $r1cce = [$codigo, .2, .3, 0, .4, .1, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "indPersonal":
                $r1cce = [$codigo, .2, 0, 0, .2, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almGas":
                $r1cce = [$codigo, .2, .2, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almPlastico":
                $r1cce = [$codigo, 1, 1, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almCeramica":
                $r1cce = [$codigo, 1.5, 1.1, 0, 1.2, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almLiquido":
                $r1cce = [$codigo, 1.5, 1.1, 0, 0, 1, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almMicros":
                $r1cce = [$codigo, 5, 4.5, 0, 0, 0, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almFuel":
                $r1cce = [$codigo, 1.1, 1.1, .8, 0, 1, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almMA":
                $r1cce = [$codigo, 2, 2.5, 1.2, 1.1, 1.7, 2, 2.5, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "almMunicion":
                $r1cce = [$codigo, 1.2, 1.2, 0, 0, 1.2, 0, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "laboratorio":
                $r1cce = [$codigo, 2, 2, 1, 1.5, 1.2, .2, 2, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "hangar":
                $r1cce = [$codigo, 3, 3, .2, 1.5, 1, .5, 1.5, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "observacion":
                $r1cce = [$codigo, .5, 1.0, 0, 0, 0, 0, 3.5, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "refugio":
                $r1cce = [$codigo, 1.5, 1.5, 15.5, 6.9, 8.5, 1, 0, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "terraformador":
                $r1cce = [$codigo, 80.2, 60.5, 40.5, 0.3, 1, 5.8, 1, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "comercio":
                $r1cce = [$codigo, 3, 15, 5.3, 1.5, .6, 1.2, 3.5, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "potenciador":
                $r1cce = [$codigo, 55, 18, .1, 24.1, 12.5, 4.3, .7, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "inhibidorHMA":
                $r1cce = [$codigo, 70, 20, 15, 1, 32, 2.3, 1.3, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "nodEstructura":
                $r1cce = [$codigo, 3.5, 3.5, 0, 2, 0, 0, 2.8, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
            case "nodMotorMA":
                $r1cce = [$codigo, 3.5, 2.8, 2, 2.8, 2.5, 4.5, 2, $nivel];
                $coste = $costesc->calculos($r1cce, $idConstruccion, $avelprodminas);
                break;
        }
        return $coste;
    }


    function calculos($r1cce, $avelprodminas)
    {
        //$avelprodminas=1.6; //para costes edificios, por defecto es igual a $Avelprodminas, para uni mutante
        $potcosto = .7; //la potencia del costo
        $factoramort = 5 / $avelprodminas; //indica que en esas horas se amortiza la mina mineral nivel 1
        $factorprod = 1.7 * $avelprodminas; //por lo que se multiplica la producción
        $cntinic1 = 37 * $factorprod;
        $lapotencia1 = 2.2;
        $cntinic2 = 27 * $factorprod;
        $lapotencia2 = 2.2; //2.1
        $cntinic3 = 25  * $factorprod;
        $lapotencia3 = 2.2; //2
        $cntinic4 = 20 * $factorprod;
        $lapotencia4 = 2.2;  //1.8
        $cntinic5 = 30 * $factorprod;
        $lapotencia5 = 2.2;   //1.7
        $cntinic6 = 19 * $factorprod;
        $lapotencia6 = 2.2;  // 1.65
        $cntinic7 = 19 * $factorprod;
        $lapotencia7 = 2.2;  // 1.55
        $coste = new CostesConstrucciones();
        //$coste->codigo=$r1cce[0];
        //$coste->nivel=$r1cce[8];

        $coste->mineral = $r1cce[1] * ((pow($r1cce[8], $potcosto)) * (($cntinic1 * pow($r1cce[8], $lapotencia1))) * $factoramort);
        $coste->cristal = $r1cce[2] * ((pow($r1cce[8], $potcosto)) * (($cntinic2 * pow($r1cce[8], $lapotencia2))) * $factoramort);
        $coste->gas =    $r1cce[3] * ((pow($r1cce[8], $potcosto)) * (($cntinic3 * pow($r1cce[8], $lapotencia3))) * $factoramort);
        $coste->plastico = $r1cce[4] * ((pow($r1cce[8], $potcosto)) * (($cntinic4 * pow($r1cce[8], $lapotencia4))) * $factoramort);
        $coste->ceramica = $r1cce[5] * ((pow($r1cce[8], $potcosto)) * (($cntinic5 * pow($r1cce[8], $lapotencia5))) * $factoramort);
        $coste->liquido = $r1cce[6] * ((pow($r1cce[8], $potcosto)) * (($cntinic6 * pow($r1cce[8], $lapotencia6))) * $factoramort);
        $coste->micros = $r1cce[7] * ((pow($r1cce[8], $potcosto)) * (($cntinic7 * pow($r1cce[8], $lapotencia7))) * $factoramort);
        return ($coste);
    }
}
