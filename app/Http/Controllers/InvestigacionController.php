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
use App\Alianzas;
use App\Jugadores;
use Auth;
use App\Investigaciones;
use App\CostesInvestigaciones;

class InvestigacionController extends Controller
{

    public function index ($tab="")
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        if (empty(session()->get('jugadores_id'))) {
            return redirect('/jugador');
        }
        $constantesCheck = Constantes::find(1);
        if (empty($constantesCheck)) {
            return redirect('/admin/DatosMaestros');
        }
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
            return redirect('/planeta');
        }
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
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
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeNaves = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeNaves')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);
        $factoresIndustrias = [];
        $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
        $factorLiquido = (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorLiquido);
        $factorMicros = (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMicros);
        $factorFuel = (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorFuel);
        $factorMa = (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMa);
        $factorMunicion = (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMunicion);
        //Fin recursos

        $investiga = new CostesInvestigaciones();
        $costeInvestigaciones = $investiga->generaCostesInvestigaciones($investigaciones);
        //dd($investigaciones);

        //Constantes de construccion
        $CConstantes=Constantes::where('tipo','investigacion')->get();

        //Enviamos los datos para la velocidad de construccion
        $velInvest=$CConstantes->where('codigo','velInvest')->first();

        // vemos las dependencias
        $dependencias=Dependencias::where('tipo','investigacion')->get();

        //nivel del laboratorio
        $nivelLaboratorio=Construcciones::where([
            ['planetas_id',$planetaActual->id],
            ['codigo','laboratorio'],
        ])->first();

        return view('juego.investigaciones.investigacion', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual',
        'velInvest', 'dependencias', 'colaInvestigacion', 'investigaciones', 'nivelLaboratorio', 'tab', 'nivelImperio', 'nivelEnsamblajeNaves',
        'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'factoresIndustrias', 'planetasJugador', 'planetasAlianza', 'costeInvestigaciones'));
    }

    //Acceso a subir nivel de construccion
    public function construir ($idInvestigacion, $personal, $tab='')
    {
        //En que planeta estamos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $error = false;

        //Recuperar construccion
        $construcciones = Construcciones::construcciones($planetaActual);
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
        $personalUsado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalUsado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;

        //La investigacion que estamos subiendo
        $investigacion = Investigaciones::find($idInvestigacion);
        $investigacionesMax = [];
        array_push($investigacionesMax, $investigacion);

        //Recuperamos su ultima cola (si existe)
        $cola = EnInvestigaciones::where('investigaciones_id', $idInvestigacion)->orderBy('id', 'desc')->first();

        //Parametros por defecto
        $codigo = $investigacion->codigo;

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel + 1;
            $investigacionesMax[0]->nivel = $nivel;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        }else{
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $investigacion->nivel + 1;
            $accion = 'Investigando';
            $investigacionesMax[0]->nivel = $nivel;
        }

        //Costes construcciones
        $costes = new CostesInvestigaciones();
        $costesConstrucciones = $costes->generaCostesInvestigaciones($investigacionesMax);

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $investigacion->sumarCostes($costesConstrucciones[0]);

        //Calcular el tiempo de construccion
        $tiempo = $investigacion->calcularTiempoInvestigaciones($costeTotal, $personal, $nivel, $planetaActual);

        //Comprobamos que el tiempo no sea false, seria un error de personal
        if (!$tiempo) {
            $error = true;
        }

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos que el edificio se puede construir
        if ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->mineral < $costesConstrucciones[0]->mineral) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->cristal < $costesConstrucciones[0]->cristal) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->gas < $costesConstrucciones[0]->gas) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->plastico < $costesConstrucciones[0]->plastico) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->ceramica < $costesConstrucciones[0]->ceramica) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->liquido < $costesConstrucciones[0]->liquido) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->micros < $costesConstrucciones[0]->micros) {
            $error = true;
        }elseif (($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->personal - $personalUsado) < $personal) {
            $error = true;
        }elseif ($accion != "Investigando") {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Restamos el coste a los recursos
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->mineral -= $costesConstrucciones[0]->mineral;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->cristal -= $costesConstrucciones[0]->cristal;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->gas -= $costesConstrucciones[0]->gas;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->plastico -= $costesConstrucciones[0]->plastico;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->ceramica -= $costesConstrucciones[0]->ceramica;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->liquido -= $costesConstrucciones[0]->liquido;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->micros -= $costesConstrucciones[0]->micros;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->save();

            //Generamos la cola
            $construyendo = new EnInvestigaciones();
            $construyendo->personal = $personal;
            $construyendo->investigaciones_id = $idInvestigacion;
            $construyendo->planetas_id = $planetaActual->id;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Investigando";
            $construyendo->created_at = $inicio;
            $construyendo->finished_at = date('Y-m-d H:i:s', $fechaFin);
            $construyendo->save();

            /*
            //Generamos el coste del edificio
            $costeInvestigaciones = new CostesInvestigaciones();
            $costeAntiguo = CostesInvestigaciones::where('investigaciones_id', $investigacion->id)->first();
            $coste = $costeInvestigaciones->generarDatosCostesInvestigacion($nivel, $codigo, $idInvestigacion);
            $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
            $costeAntiguo->save();
            */
        }

        return redirect('/juego/investigacion');
    }

    //Acceso a subir nivel de construccion
    public function cancelar ($idColaInvestigacion = 1)
    {
        //Recuperar construccion
        $cola = EnInvestigaciones::where('id', $idColaInvestigacion)->first();

        //Comprobamos si hay algun edificio por encima del nivel que se ha cancelado
        $listaCola = EnInvestigaciones::where([['investigaciones_id', '=', $cola->investigaciones->id], ['nivel', '>', $cola->nivel]])->get();

        if ($cola->accion == 'Investigando') {
            $nivel = $cola->nivel - 1;
        }
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //La investigacion que estamos subiendo
        $investigacion = $cola->investigaciones;
        $investigacionesMax = [];
        array_push($investigacionesMax, $investigacion);

        //Costes construcciones
        $costes = new CostesInvestigaciones();
        $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);

        /*
        //Generamos el coste del edificio
        $costeConstrucciones = new CostesInvestigaciones();
        $costeAntiguo = CostesInvestigaciones::where('investigaciones_id', $cola->investigaciones->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesInvestigacion($nivel, $cola->investigaciones->codigo, $cola->investigaciones->id);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();
        */

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $colita) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($colita->accion == "Investigando") {
                $investigacionesMax[0]->nivel = $colita->nivel;

                //Costes construcciones
                $costes = new CostesInvestigaciones();
                $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);
                $recursos = $cola->planetas->recursos;


                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($costesInvestigaciones[0]->mineral * $reciclaje);
                $recursos->cristal += ($costesInvestigaciones[0]->cristal * $reciclaje);
                $recursos->gas += ($costesInvestigaciones[0]->gas * $reciclaje);
                $recursos->plastico += ($costesInvestigaciones[0]->plastico * $reciclaje);
                $recursos->ceramica += ($costesInvestigaciones[0]->ceramica * $reciclaje);
                $recursos->liquido += ($costesInvestigaciones[0]->liquido * $reciclaje);
                $recursos->micros += ($costesInvestigaciones[0]->micros * $reciclaje);
                $recursos->save();
            }
            $colita->delete();
        }
        //En caso de ser una construccion debe devolver parte de los recursos
        if ($cola->accion == "Investigando") {

            //Costes construcciones
            $costes = new CostesInvestigaciones();
            $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);
            $recursos = $cola->planetas->recursos;
            $investigacionesMax[0]->nivel = $cola->nivel;

            //Costes construcciones
            $costes = new CostesInvestigaciones();
            $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax[0]);
            $recursos = $cola->planetas->recursos;


            if (!empty($costesInvestigaciones)){
            //Restaurar beneficio por reciclaje
            $recursos->mineral += ($costesInvestigaciones[0]->mineral * $reciclaje);
            $recursos->cristal += ($costesInvestigaciones[0]->cristal * $reciclaje);
            $recursos->gas += ($costesInvestigaciones[0]->gas * $reciclaje);
            $recursos->plastico += ($costesInvestigaciones[0]->plastico * $reciclaje);
            $recursos->ceramica += ($costesInvestigaciones[0]->ceramica * $reciclaje);
            $recursos->liquido += ($costesInvestigaciones[0]->liquido * $reciclaje);
            $recursos->micros += ($costesInvestigaciones[0]->micros * $reciclaje);
        } else {

            $recursos->mineral += 0;
            $recursos->cristal += 0;
            $recursos->gas += 0;
            $recursos->plastico += 0;
            $recursos->ceramica += 0;
            $recursos->liquido += 0;
            $recursos->micros += 0;
        }


            $recursos->save();
        }
        $cola->delete();

        return redirect('/juego/investigacion');
    }

    //Acceso a subir nivel de construccion
    public function datos ($codigo)
    {
        $nombreInvestigacion = trans('investigacion.' . $codigo);
        $descripcionInvestigacion = trans('investigacion.' . $codigo . 'Descripcion');
        return compact('descripcionInvestigacion', 'nombreInvestigacion');
    }
}