<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Destinos;
use App\Models\Disenios;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\Prioridades;
use App\Models\Flotas;
use App\Models\ViewDaniosDisenios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FlotaController extends Controller
{
    public function index()
    {
        // Planeta, jugador y alianza
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $planetasAlianza = null;
        if (session()->has('alianza_id') != "nulo") {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }

        //Recursos
        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $construcciones = Construcciones::construcciones($planetaActual);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $produccion = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);

        // Personal ocupado
        $personalOcupado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalOcupado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personalOcupado += $cola->personal;
            }
        }

        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

        //variables universo
        $constantesU = Constantes::where('tipo', 'universo')->get();

        //constantes invest
        $constantes = Constantes::where('tipo', 'investigacion')->get();

        //Naves en el planeta
        $navesEstacionadas = $planetaActual->estacionadas;
        $diseniosJugador = $jugadorActual->disenios;

        foreach ($diseniosJugador as $disenio) {
            $disenio->tamanio = $disenio->fuselajes->tamanio;
        }

        $mejoras = [];
        for ($i = 0; $i < count($diseniosJugador); $i++) {
            $diseniosJugador[$i]->mejoras;
        }

        $idsDiseno=array();
        foreach($navesEstacionadas as $diseno){
            array_push($idsDiseno,$diseno->id);
            $diseno->enflota=0;
            $diseno->enhangar=0;
        }
        $ViewDaniosDisenios = ViewDaniosDisenios::whereIn('disenios_id', $idsDiseno)->get();

        //prioridades

        $prioridadesXDefecto=new Prioridades();
        $prioridadesXDefecto->personal=1;
        $prioridadesXDefecto->mineral=1;
        $prioridadesXDefecto->cristal=1;
        $prioridadesXDefecto->gas=1;
        $prioridadesXDefecto->plastico=1;
        $prioridadesXDefecto->ceramica=1;
        $prioridadesXDefecto->liquido=1;
        $prioridadesXDefecto->micros=1;
        $prioridadesXDefecto->fuel=1;
        $prioridadesXDefecto->ma=1;
        $prioridadesXDefecto->municion=1;
        $prioridadesXDefecto->creditos=1;

        // destinos
        $destinos=[];
        $origen=new Destinos();
        $origen->estrella=$planetaActual->estrella;
        $origen->orbita=$planetaActual->orbita;
        $origen->porcentVel=100;
        array_push($destinos,$origen);

        $dest=new Destinos();
        $dest->estrella=-1;
        $dest->orbita=-1;
        $dest->porcentVel=100;
        /// prioridades por defecto
        array_push($destinos,$dest);
        array_push($destinos,$dest);
        array_push($destinos,$dest);


        return view('juego.flotas.flotas', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'mejoras',
            'constantes',
            'ViewDaniosDisenios',
            'destinos',

        ));
    }

    public function traerRecursos($estrella,$orbita){

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        $recursos = Planetas::where([ ['estrella', $estrella],['orbita', $orbita],['jugadores_id', $jugadorActual->id] ])->first()->recursos;
        return compact('recursos');
    }





    public function enviarFlota(Request $request, $id = false){ //$id es de la flota en orbita de la que salimos


        $navesEstacionadas = $request->input('navesEstacionadas');
       // $cargaDest = $request->input('cargaDest');
        //$prioridades = $request->input('prioridades');
        //$datosBasicos = $request->input('datosBasicos');
        $destinos = $request->input('destinos'); //lleva las prioridades y cargas

        $errores="";

        //// valores de las naves en planeta
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $navesEnPlaneta = $planetaActual->estacionadas;


        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $diseniosJugador = $jugadorActual->disenios;

        Log::info($navesEnPlaneta);
        $disenios = [];
        $araycolumn=array_column($navesEstacionadas, 'disenios_id');

        foreach ($diseniosJugador as $disenio) {

            $key = array_search($disenio->id, $araycolumn );  //de los diseños
            if (false !== $key)
            {
                $nave=$navesEstacionadas[$key]; // enviar

                $enhangar=$nave['enhangar'];
                $enflota=$nave['enflota'];

                if($enflota>0 || $enhangar>0){

                    $naveP=$navesEnPlaneta->firstWhere('disenios_id',$nave['disenios_id']);

                    $cantidad=$naveP['cantidad'];

                    if ($cantidad<$enflota+$enhangar){
                        $errores="Mas naves a enviar de las que hay (".$nave['disenios_id'].")".$cantidad." ".$enflota." ".$enhangar;
                        Log::info($errores);
                        break;
                    }

                    $disenio['enflota']=$enflota;
                    $disenio['enhangar']=$enhangar;
                    $disenio['cantidad']=$cantidad;

                    array_push($disenios,$disenio);

                }
            }
        }

        //Log::info($disenios);
    if (strlen($errores)<1){

        $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
        $tamaniosNaveAcarga = array( 'caza'=> "cargaPequenia", 'ligera'=> "cargaMediana", 'media'=> "cargaGrande", 'pesada'=> "cargaEnorme", 'estacion'=> "cargaMega" );
        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");

        $fueraH = [];
        $dentroH = [];
        $capacidadH = [];
        $tablaHangares = [];
        $tablaHangares['fueraH'] = $fueraH;
        $tablaHangares['dentroH'] = $dentroH;
        $tablaHangares['capacidadH'] = $capacidadH;

            foreach ($tamaniosArray as $tamanio) {
                $tablaHangares['capacidadH'][$tamanio] = 0;
                $tablaHangares['fueraH'][$tamanio] = 0;
                $tablaHangares['dentroH'][$tamanio] = 0;
            };


            $valFlotaT=[];
            //reinicio valores
            $valFlotaT['carga']=0;
            $valFlotaT['municion']=0;
            $valFlotaT['fuel']=0;
            $valFlotaT['velocidad']=999;
            $valFlotaT['maniobra']=999;
            $valFlotaT['ataqueR']=0;
            $valFlotaT['defensaR']=0;
            $valFlotaT['ataqueV']=0;
            $valFlotaT['defensaV']=0;
            $valFlotaT['extraccion']=0;
            $valFlotaT['recoleccion']=0;
            $valFlotaT['fuelDestT']=0;
            $valFlotaT['atotal']=0;

        Disenios::calculaMejoras($disenios);
        //Log::info($disenios[0]);
            //formatear misiones

        //añado tamaños
        foreach ($disenios as $disenio) {
            $disenio->tamanio = $disenio->fuselajes->tamanio;
        }

        $result=Flotas::calculoFlota($disenios,$valFlotaT,$destinos,$tablaHangares);
        $valFlotaT=$result[0];
        $destinos=$result[1];
        $tablaHangares=$result[2];


        Log::info($valFlotaT);

        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $resultValidar=Flotas::validacionesFlota($destinos,$valFlotaT,$errores,$tablaHangares,$recursos);

        $errores=$resultValidar[0];
    }

    //se envia la flota
    if (strlen($errores)<1){
        //construyendo destinos
        for ($dest = 1; $dest < count($destinos); $dest++) {
            $destino = new destinos();


        }
        /

    }

       // var_dump($disenios);
       // Log::info($disenios[0]);
       // FlotaController::calculoFlota($disenios);


        return compact('errores');
    }



}
