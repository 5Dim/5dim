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
use App\Models\EnRecursosEnDestino;
use App\Models\EnVuelo;
use App\Models\EnPrioridadesEnDestino;
use App\Models\DiseniosEnVuelo;
use App\Models\PuntosEnFlota;
use App\Models\RecursosEnFlota;
use App\Models\Astrometria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class FlotaController extends Controller
{
    public function index($estrella="",$orbita="",$nombreflota="",$tipoflota="envuelo")
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
        $cantidadDestinos=$constantesU->where('codigo', 'cantidadDestinosFlotas')->first()->valor;

        //constantes invest
        $constantes = Constantes::where('tipo', 'investigacion')->get();


        //$flotaOrigen = $request->input('nombreflota');
        //Log::info('flota ver: '.$nombreflota);
        //Log::info(empty($nombreflota));
        if (!empty($nombreflota) && !empty($tipoflota)){

            if ($tipoflota=="envuelo"){
                $flota=EnVuelo::
                where('jugadores_id',$jugadorActual->id)
                ->where('publico',$nombreflota)
                ->first();



                if(!empty($flota)){ //editando flota en vuelo
                    $navesEstacionadas=$flota->diseniosenvuelo;
                    $destinos=$flota->destinos;
                    $recursos=$flota->recursosenflota;
                    $cargaDest = [];
                    $prioridades = [];

                    foreach($destinos as $destino){
                        $recursosDestino=$destino->recursos;
                        array_push($cargaDest,$recursosDestino);

                        $prioridad=$destino->prioridades;
                        array_push($prioridades,$prioridad);

                        //Log::info("recursosDestino: ".$recursosDestino);

                    }

                    //$cargaDest=$destinos[0]->recursos;
                    //$prioridades=$destinos[0]->prioridades;

                    //Log::info("flota: ".$flota);
                    //Log::info("destinos: ".$destinos);
                    //Log::info("recursosDestino: ".$cargaDest);
                    //Log::info("prioridadDestino: ".$prioridades);
                }
            }


        } else {
            //Naves en el planeta
            $navesEstacionadas = $planetaActual->estacionadas;

                // datosFlota
            $flota=new EnVuelo;
            $flota->nombre="";

            //prioridades
            $prioridades = [];
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
            array_push($prioridades,$prioridadesXDefecto);

            // recursos en destinos
            $cargaDest = [];
            $recursosDestino=new EnRecursosEnDestino;
                $recursosDestino->personal=0;
                $recursosDestino->mineral=0;
                $recursosDestino->cristal=0;
                $recursosDestino->gas=0;
                $recursosDestino->plastico=0;
                $recursosDestino->ceramica=0;
                $recursosDestino->liquido=0;
                $recursosDestino->micros=0;
                $recursosDestino->fuel=0;
                $recursosDestino->ma=0;
                $recursosDestino->municion=0;
                $recursosDestino->creditos=0;
                array_push($cargaDest,$recursosDestino);

            // destinos
            $destinos=[];
            $origen=new Destinos();
            $origen->estrella=$planetaActual->estrella;
            $origen->orbita=$planetaActual->orbita;
            $origen->porcentVel=100;
            array_push($destinos,$origen);

            $destino=new Destinos();
            $destino->estrella=-1;
            $destino->orbita=-1;
            $destino->porcentVel=100;
            /// prioridades por defecto

            for ($dest=1;$dest<$cantidadDestinos+1;$dest++ ){
                array_push($destinos,$destino);
                array_push($cargaDest,$recursosDestino);
                array_push($prioridades,$prioridadesXDefecto);
            }
        }

        //Log::info("naves estacionadas: ".$navesEstacionadas);

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
            $estedisenioj=$diseniosJugador->where('id', $diseno->disenios_id)->first();

            array_push($idsDiseno,$diseno->id);
            $diseno->enflota=0;
            $diseno->enhangar=0;
            $diseno->fuselajes_id =$estedisenioj->fuselajes_id;
            $diseno->skin =$estedisenioj->skin;
        }
        $ViewDaniosDisenios = ViewDaniosDisenios::whereIn('disenios_id', $idsDiseno)->get();

        //Log::info($navesEstacionadas );
        //Log::info($destinosP);



        //$flotasVisibles=Astrometria::flotasVisibles();

        return view('juego.flotas.flotas', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',

            'cantidadDestinos',
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
            'cargaDest',
            'prioridades',
            'flota',

        ));

    }


    public function traerRecursos($estrella,$orbita){
        //Log::info('trear de: '.$estrella."x".$orbita);

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        $recursos = Planetas::where([ ['estrella', $estrella],['orbita', $orbita],['jugadores_id', $jugadorActual->id] ])->first()->recursos;
        return compact('recursos');
    }

    public static function existeSistema($estrella){
        return Flotas::existeSistema($estrella);
    }


    public function enviarFlota(Request $request, $id = false){ //$id es de la flota en orbita de la que salimos


        $navesEstacionadas = $request->input('navesEstacionadas');
        $cargaDest = $request->input('cargaDest');
        $prioridades = $request->input('prioridades');
        $flota = $request->input('flota');
        $destinos = $request->input('destinos');
        /*
        Log::info("navesEstacionadas");Log::info($navesEstacionadas);
        Log::info("cargaDest");Log::info($cargaDest);
        Log::info("prioridades");Log::info($prioridades);
        Log::info("flota");Log::info($flota);
        Log::info("destinos");Log::info($destinos);
        */

        $errores="";


        if (strlen($errores)<1){
            //// valores de las naves en planeta
            $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
            $navesEnPlaneta = $planetaActual->estacionadas;

            $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
            $diseniosJugador = $jugadorActual->disenios;

            $disenios = [];
            $arraycolumn=array_column($navesEstacionadas, 'disenios_id');

            foreach ($diseniosJugador as $disenio) {

                $key = array_search($disenio->id, $arraycolumn );  //de los diseños
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
                            //Log::info($errores);
                            break;
                        }

                        $disenio['enflota']=$enflota;
                        $disenio['enhangar']=$enhangar;
                        $disenio['cantidad']=$cantidad;

                        array_push($disenios,$disenio);
                    }
                }
            }
        }

            //Log::info($disenios);
            //Log::info("errores: ".$errores);
        if (strlen($errores)<1){

            $tamaniosArray = array("cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega");
            //$tamaniosNaveAcarga = array( 'caza'=> "cargaPequenia", 'ligera'=> "cargaMediana", 'media'=> "cargaGrande", 'pesada'=> "cargaEnorme", 'estacion'=> "cargaMega" );
            //$recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");

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
                $valFlotaT['mantenimiento']=0;

                $disenios= Disenios::calculaMejoras($disenios);
                //Log::info(" a flota llega ".$disenios[1]->datos->cargaPequenia);
                //formatear misiones

            //añado tamaños
            foreach ($disenios as $disenio) {
                $disenio->tamanio = $disenio->fuselajes->tamanio;
            }

            $result=Flotas::calculoFlota($disenios,$valFlotaT,$destinos,$tablaHangares);
            $valFlotaT=$result[0];
            $destinos=$result[1];
            $tablaHangares=$result[2];

            //Log::info($valFlotaT);
            //Log::info($cargaDest);

            $constantesU = Constantes::where('tipo', 'universo')->get();
            $cantidadDestinos=$constantesU->where('codigo', 'cantidadDestinosFlotas')->first()->valor;
            $tiempoPuntosFlotas=$constantesU->where('codigo', 'tiempoPuntosFlotas')->first()->valor;

            $valoresValidos=Flotas::valoresValidos($cantidadDestinos,$cargaDest,$prioridades);
            $cargaDest=$valoresValidos[0];
            $prioridades=$valoresValidos[1];

            $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
            $resultValidar=Flotas::validacionesFlota($destinos,$valFlotaT,$errores,$tablaHangares,$recursos,$cargaDest,$cantidadDestinos);

            //Log::info($resultValidar);

            if (!empty($resultValidar)){
                $errores=$resultValidar;
            }
        }

        //se envia la flota  ////////////////////
        if (strlen($errores)<3){

            DB::beginTransaction();
            try {
                //construyendo flota

                $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
                $nombreJugon= substr($jugadorActual['nombre'],4);
                $timestamp = (int) round(now()->format('Uu') / pow(10, 6 - 3));
                $publico=substr($nombreJugon, 0, 3).substr($timestamp, 5);
                if (strlen($flota['nombre'])<1){
                    $flota['nombre']=$publico;
                }

                //Log::info("Jugador ID= ".$jugadorActual->id);
                $flotax=new EnVuelo;
                $flotax->nombre=$flota['nombre'];;
                $flotax->publico=$publico;
                $flotax->ataqueReal= $valFlotaT['ataqueR'];
                $flotax->defensaReal= $valFlotaT['defensaR'];
                $flotax->ataqueVisible= $valFlotaT['ataqueV'];
                $flotax->defensaVisible= $valFlotaT['defensaV'];
                $flotax->creditos= $valFlotaT['mantenimiento'];
                $flotax->jugadores_id=$jugadorActual->id;
                //Log::info($flotax);
                $flotax->save();

                //Log::info($flota);

                //construyendo destinos
                $Tinit=date("Y-m-d H:i:s");
                for ($dest = 1; $dest < count($destinos); $dest++) {

                    //Log::info($Tinit);

                    $destAnt=$dest-1;
                    $duracion=1*$destinos[$dest]['tiempoDest'];
                    $add_time=strtotime($Tinit)+$duracion;
                    $Tfin=date('Y-m-d H:i:s',$add_time);

                    //Log::info($Tfin);

                    //Log::info($destinos[$destAnt]);
                    //Log::info($destinos[$dest]);

                    if($destinos[$dest]['viable']==true){
                        $destino = new destinos();
                        $destino->porcentVel=$destinos[$dest]['porcentVel'];
                        $destino->mision=ucfirst($destinos[$dest]['mision']);
                        $destino->initestrella=$destinos[$destAnt]['estrella'];
                        $destino->initorbita=$destinos[$destAnt]['orbita'];
                        $destino->estrella=$destinos[$dest]['estrella'];
                        $destino->orbita=$destinos[$dest]['orbita'];
                        $destino->initcoordx=$destinos[$destAnt]['fincoordx'];
                        $destino->initcoordy=$destinos[$destAnt]['fincoordy'];
                        $destino->fincoordx=$destinos[$dest]['fincoordx'];
                        $destino->fincoordy=$destinos[$dest]['fincoordy'];
                        //$destino->vectorx=$destinos[$dest]['fincoordx']-$destinos[$dest]['initcoordx']; //entre segundos
                        //$destino->vectory=$destinos[$dest]['fincoordy']-$destinos[$dest]['initcoordy'];
                        $destino->init=$Tinit;
                        $destino->fin=$Tfin;
                        $destino->en_vuelo_id=$flotax->id;
                        $destino->save();

                        $vectorx=(1 * $destinos[$dest]['fincoordx']-1 * $destinos[$destAnt]['fincoordx'])/$duracion;
                        $vectory=(1 * $destinos[$dest]['fincoordy']-1 * $destinos[$destAnt]['fincoordy'])/$duracion;

                        for ($tiempoPto = 0; $tiempoPto < $duracion/$tiempoPuntosFlotas; $tiempoPto++) {

                            $add_time=strtotime($Tinit)+($tiempoPto * $tiempoPuntosFlotas);
                            $TfinPto=date('Y-m-d H:i:s',$add_time);

                            $puntoFlota=new PuntosEnFlota();
                            $puntoFlota->coordx= $destinos[$destAnt]['fincoordx'] + $vectorx * ($tiempoPto * $tiempoPuntosFlotas);
                            $puntoFlota->coordy= $destinos[$destAnt]['fincoordy'] + $vectory * ($tiempoPto * $tiempoPuntosFlotas);
                            $puntoFlota->fin= $TfinPto;
                            $puntoFlota->en_vuelo_id=$flotax->id;
                            $puntoFlota->jugadores_id=$jugadorActual->id;
                            //Log::info($puntoFlota);
                            $puntoFlota->save();
                        }
                        //ultimo punto siempre va
                        $puntoFlota=new PuntosEnFlota();
                        $puntoFlota->coordx= $destinos[$dest]['fincoordx'];
                        $puntoFlota->coordy= $destinos[$dest]['fincoordy'];
                        $puntoFlota->fin= $Tfin;
                        $puntoFlota->en_vuelo_id=$flotax->id;
                        $puntoFlota->jugadores_id=$jugadorActual->id;
                        $puntoFlota->save();

                        //Log::info($destino);
                        $Tinit=$Tfin;

                        //Log::info($cargaDest[$dest]);

                        $recursosDestino=new EnRecursosEnDestino;
                        $recursosDestino->personal=$cargaDest[$dest]['personal'];
                        $recursosDestino->mineral=$cargaDest[$dest]['mineral'];
                        $recursosDestino->cristal=$cargaDest[$dest]['cristal'];
                        $recursosDestino->gas=$cargaDest[$dest]['gas'];
                        $recursosDestino->plastico=$cargaDest[$dest]['plastico'];
                        $recursosDestino->ceramica=$cargaDest[$dest]['ceramica'];
                        $recursosDestino->liquido=$cargaDest[$dest]['liquido'];
                        $recursosDestino->micros=$cargaDest[$dest]['micros'];
                        $recursosDestino->fuel=$cargaDest[$dest]['fuel'];
                        $recursosDestino->ma=$cargaDest[$dest]['ma'];
                        $recursosDestino->municion=$cargaDest[$dest]['municion'];
                        $recursosDestino->creditos=$cargaDest[$dest]['creditos'];
                        $recursosDestino->destinos_id=$destino->id;
                        $recursosDestino->save();

                        $prioridadex=new EnPrioridadesEnDestino();
                        $prioridadex->personal=$prioridades[$dest]['personal'];
                        $prioridadex->mineral=$prioridades[$dest]['mineral'];
                        $prioridadex->cristal=$prioridades[$dest]['cristal'];
                        $prioridadex->gas=$prioridades[$dest]['gas'];
                        $prioridadex->plastico=$prioridades[$dest]['plastico'];
                        $prioridadex->ceramica=$prioridades[$dest]['ceramica'];
                        $prioridadex->liquido=$prioridades[$dest]['liquido'];
                        $prioridadex->micros=$prioridades[$dest]['micros'];
                        $prioridadex->fuel=$prioridades[$dest]['fuel'];
                        $prioridadex->ma=$prioridades[$dest]['ma'];
                        $prioridadex->municion=$prioridades[$dest]['municion'];
                        $prioridadex->creditos=$prioridades[$dest]['creditos'];
                        $prioridadex->destinos_id=$destino->id;
                        $prioridadex->save();

                    // Log::info("hecho destino ".$dest );
                    }
                }

            // Log::info("todos los destinos done");

                // naves a flota

                foreach ($disenios as $navex) {

                    //Log::info($navex);

                    $naveSale=new DiseniosEnVuelo();
                    $naveSale->enFlota=$navex['enflota'];
                    $naveSale->enHangar=$navex['enhangar'];
                    $naveSale->disenios_id=$navex['id'];
                    $naveSale->en_vuelo_id=$flotax->id;
                    $naveSale->save();

                    $naveP=$navesEnPlaneta->firstWhere('disenios_id',$navex['id']);
                    $naveP->cantidad-=$navex['enflota']+$navex['enhangar'];
                    $naveP->save();
                }

                // restando recursos de origen
                //origen es un planeta:
                $dest=0;
                //Log::info($cargaDest[$dest]);
                $recursos = Planetas::where('id', session()->get('planetas_id'))->first()->recursos;
                $recursos->personal -= $cargaDest[$dest]['personal'];
                $recursos->mineral -= $cargaDest[$dest]['mineral'];
                $recursos->cristal -= $cargaDest[$dest]['cristal'];
                $recursos->gas -= $cargaDest[$dest]['gas'];
                $recursos->plastico -= $cargaDest[$dest]['plastico'];
                $recursos->ceramica -= $cargaDest[$dest]['ceramica'];
                $recursos->liquido -= $cargaDest[$dest]['liquido'];
                $recursos->micros -= $cargaDest[$dest]['micros'];
                $recursos->fuel -= $cargaDest[$dest]['fuel'];
                $recursos->ma -= $cargaDest[$dest]['ma'];
                $recursos->municion -= $cargaDest[$dest]['municion'];
                $recursos->creditos -= $cargaDest[$dest]['creditos'];
                $recursos->save();
                //Log::info($recursos);

                //a la flota
                $recursosEnFlota=new RecursosEnFlota();
                $recursosEnFlota->personal = $cargaDest[$dest]['personal'];
                $recursosEnFlota->mineral = $cargaDest[$dest]['mineral'];
                $recursosEnFlota->cristal = $cargaDest[$dest]['cristal'];
                $recursosEnFlota->gas = $cargaDest[$dest]['gas'];
                $recursosEnFlota->plastico = $cargaDest[$dest]['plastico'];
                $recursosEnFlota->ceramica = $cargaDest[$dest]['ceramica'];
                $recursosEnFlota->liquido = $cargaDest[$dest]['liquido'];
                $recursosEnFlota->micros = $cargaDest[$dest]['micros'];
                $recursosEnFlota->fuel = $cargaDest[$dest]['fuel'];
                $recursosEnFlota->ma = $cargaDest[$dest]['ma'];
                $recursosEnFlota->municion = $cargaDest[$dest]['municion'];
                $recursosEnFlota->creditos = $cargaDest[$dest]['creditos'];
                $recursosEnFlota->en_vuelo_id=$flotax->id;
                $recursosEnFlota->save();
                //Log::info($recursosEnFlota);



            DB::commit();
            //Log::info("Enviada");

            } catch (Exception $e) {
                DB::rollBack();
                Log::info("Error en Commit de envio de flotas ".$e);
            }
            //return redirect('/juego/flota');
        } else {
            Log::info("errores al enviar: ".$errores);
        }
        //Log::info($errores);
        return compact('errores');
    }


    public function verFlotasEnVuelo(){
        //Log::info('message');
        //evitamos peticiones sin sentido:
        if(session()->get('jugadores_id')==null){
            return compact(null);
        }

        $flotas=Astrometria::flotasVisibles();
        return $flotas;

    }



    public function verDatosFlota(Request $request){

        //evitamos peticiones sin sentido:
        if(session()->get('jugadores_id')==null){
            return compact(null);
        }

        $nombreflota = $request->input('nombreflota');

        return null;

    }



}
