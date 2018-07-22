<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Dependencias;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\EnInvestigaciones;
use App\CostesConstrucciones;
use Auth;
use App\Radares;
use App\Flotas;

class AstrometriaController extends Controller
{
    public function index ()
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->user != Auth::user()) {
            return redirect('/planeta');
        }
        EnConstrucciones::terminarColaConstrucciones();
        $construcciones = Construcciones::construcciones($planetaActual);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $personal = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personal += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;
        //Fin recursos

        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual'));
    }

    public function generarUniverso ()
    {
        $universo = [];
        $planetas = Planetas::select('estrella', 'jugadores_id')->orderBy('jugadores_id', 'desc')->distinct()->get(['estrella']);
        foreach ($planetas as $planeta) {
            if ($planeta->jugadores_id > 1) {
                $planetita = new Planetas();
                $planetita->habitado = 1;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            } else {
                $planetita = new Planetas();
                $planetita->habitado = 0;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            }
        }
        $planetoide = new Planetas();
        $planetoide->idioma = 0;
        $planetoide->global = Planetas::max('estrella');
        $planetoide->ancho = 500;
        $planetoide->fondo = "img/fondo.png";
        $planetoide->sistemas = $universo;
        return $planetoide;
    }

    public function generarRadares(){

        $radares=[];

        for($n=0;$n<30;$n++){
            $radar=new Radares();
            $radar->estrella=random_int ( 1 , 10000 );
            $radar->circulo=random_int ( 1 , 10 );
            $radar->color=random_int ( 1 , 4 );
            array_push($radares,$radar);
        }

        return $radares;
    }


    public function generarFlotas(){

        $flotas=[];

        for($n=0;$n<30;$n++){
            $flota=new Flotas();
            $flota->numeroflota=random_int ( 1 , 10000 );
            $flota->nick=random_int ( 1 , 10 );
            $flota->ataque=random_int ( 1 , 1000000);
            $flota->defensa=random_int ( 1 , 1000000);
            $flota->origen=random_int ( 1 , 10000)."x".random_int ( 1 , 9);
            $flota->destino=random_int ( 1 , 10000)."x".random_int ( 1 , 9);
            $flota->angulo=random_int ( 1 , 400 );
            $flota->color=random_int ( 1 , 5 );
            $flota->fecha=random_int ( 0 , 23 )."h ".random_int ( 0 , 59 )."m ".random_int ( 0 , 59 )."s" ;

            $flota->coordix=random_int ( 1 , 10000 );
            $flota->coordiy=random_int ( 1 , 10000 );

            $flota->coordfx=random_int ( 1 , 10000 );
            $flota->coordfy=random_int ( 1 , 10000 );

            $flota->coordx= round( ((($flota->coordix-$flota->coordfx)/random_int ( 1 , 100)) + $flota->coordix),2);
            $flota->coordy=round( (($flota->coordiy-$flota->coordfy)/random_int ( 1 , 100)) + $flota->coordiy,2);

            $flota->abreen="ppal";


            array_push($flotas,$flota);
        }

        return $flotas;
    }


}