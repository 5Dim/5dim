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
use App\Investigaciones;
use Auth;
use App\Fuselajes;
use App\Armas;
use App\CostesArmas;
use App\CostesFuselajes;
use App\Jugadores;
use App\Diseños;
use App\DañosDiseños;
use App\CostesDiseños;
use App\CualidadesDiseños;

class DiseñoController extends Controller
{
    public function index ()
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

        //Devolvemos todos los diseños
        $diseños = $jugadorActual->diseños;

        return view('juego.diseño.diseño', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio',
        'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones', 'factoresIndustrias',
        'planetasJugador', 'planetasAlianza', 'diseños'));
    }
    public function diseñar ($idFuselaje)
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

        $diseño = Fuselajes::find($idFuselaje);

        $armas = Armas::all();

        $constantesI=Constantes::where('tipo','investigacion')->get();
        $costesArmas = CostesArmas::all();


        return view('juego.diseñar.diseñar', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'diseño', 'nivelImperio',
        'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas','investigaciones', 'armas', 'constantesI', 'costesArmas', 'factoresIndustrias',
        'planetasJugador', 'planetasAlianza'));
    }



    public function crearDiseño($id = false){  //////////////////////////////////////***************** */

        $armasTengo = ($_POST['armas']);
        $energiaArmas = ($_POST['energiaArmas']);
        $armasAlcance = ($_POST['armasAlcance']);
        $armasDispersion = ($_POST['armasDispersion']);
        $datosBasicos = ($_POST['datosBasicos']);

        $idFuselaje=$datosBasicos['id'];
        //  $jugadorActual = Jugadores::where('id', 1)->first(); $planetaActual = Planetas::where('id', 143)->first(); $investigaciones=$jugadorActual->investigaciones;

        $jugadorActual = Jugadores::where('id', session()->get('jugadores_id'))->first();
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $diseño = Fuselajes::find($idFuselaje);
        $constantesI=Constantes::where('tipo','investigacion')->get();
        $costesArmas = CostesArmas::all();
        $armas = Armas::all();

        function celdasMaximas($a,$b) { //saco la cantidad de celdas justas
            while ( ((int)($b/$a)-($b/$a)) !=0 ) {
            --$a;
            }
        return $a;
        }



        function sumaCostosMejoras($destinoCosto,$cte,$esteCosto,$sobrecosto){
            $destinoCosto['mineral']+=($esteCosto['mineral']/100)*$cte *$sobrecosto['mineral'];
            $destinoCosto['cristal']+=($esteCosto['cristal']/100)*$cte *$sobrecosto['cristal'];
            $destinoCosto['gas']+=($esteCosto['gas']/100)*$cte *$sobrecosto['gas'];
            $destinoCosto['plastico']+=($esteCosto['plastico']/100)*$cte *$sobrecosto['plastico'];
            $destinoCosto['ceramica']+=($esteCosto['ceramica']/100)*$cte *$sobrecosto['ceramica'];
            $destinoCosto['liquido']+=($esteCosto['liquido']/100)*$cte *$sobrecosto['liquido'];
            $destinoCosto['micros']+=($esteCosto['micros']/100)*$cte *$sobrecosto['micros'];
            $destinoCosto['personal']+=($esteCosto['personal']/100)*$cte *$sobrecosto['personal'];
            $destinoCosto['masa']+=($esteCosto['masa']/100)*$cte *$sobrecosto['masa'];

            return $destinoCosto;
        }

        function sumaCualidadesMejoras($destinoCosto,$cte,$esteCosto,$sobrecosto){
            $destinoCosto['fuel']+=($esteCosto['fuel']/100)*$cte *$sobrecosto['fuel'];
            $destinoCosto['municion']+=($esteCosto['municion']/100)*$cte *$sobrecosto['municion'];
            $destinoCosto['masa']+=($esteCosto['masa']/100)*$cte *$sobrecosto['masa'];
            $destinoCosto['energia']+=($esteCosto['energia']/100)*$cte *$sobrecosto['energia'];
            $destinoCosto['tiempo']+=($esteCosto['tiempo']/100)*$cte *$sobrecosto['tiempo'];
            $destinoCosto['mantenimiento']+=($esteCosto['mantenimiento']/100)*$cte *$sobrecosto['mantenimiento'];
            $destinoCosto['defensa']+=($esteCosto['defensa']/100)*$cte *$sobrecosto['defensa'];
            $destinoCosto['ataque']+=($esteCosto['ataque']/100)*$cte *$sobrecosto['ataque'];
            $destinoCosto['velocidad']+=($esteCosto['velocidad']/100)*$cte *$sobrecosto['velocidad'];
            $destinoCosto['carga']+=($esteCosto['carga']/100)*$cte *$sobrecosto['carga'];
            $destinoCosto['cargaPequeña']+=($esteCosto['cargaPequeña']/100)*$cte *$sobrecosto['cargaPequeña'];
            $destinoCosto['cargaMediana']+=($esteCosto['cargaMediana']/100)*$cte *$sobrecosto['cargaMediana'];
            $destinoCosto['cargaGrande']+=($esteCosto['cargaGrande']/100)*$cte *$sobrecosto['cargaGrande'];
            $destinoCosto['cargaEnorme']+=($esteCosto['cargaEnorme']/100)*$cte *$sobrecosto['cargaEnorme'];
            $destinoCosto['cargaMega']+=($esteCosto['cargaMega']/100)*$cte *$sobrecosto['cargaMega'];

            return $destinoCosto;
        }



        function sumaCostos($destinoCosto,$cte,$esteCosto){
            $destinoCosto['mineral']+=$esteCosto['mineral']*$cte;
            $destinoCosto['cristal']+=$esteCosto['cristal']*$cte;
            $destinoCosto['gas']+=$esteCosto['gas']*$cte;
            $destinoCosto['plastico']+=$esteCosto['plastico']*$cte;
            $destinoCosto['ceramica']+=$esteCosto['ceramica']*$cte;
            $destinoCosto['liquido']+=$esteCosto['liquido']*$cte;
            $destinoCosto['micros']+=$esteCosto['micros']*$cte;
            $destinoCosto['personal']+=$esteCosto['personal']*$cte;
            $destinoCosto['masa']+=$esteCosto['masa']*$cte;

            if ($destinoCosto['mineral']<0){$destinoCosto['mineral']=$diseño->costes->mineral;};
            if ($destinoCosto['cristal']<0){$destinoCosto['cristal']=$diseño->costes->cristal;};
            if ($destinoCosto['gas']<0){$destinoCosto['gas']=$diseño->costes->gas;};
            if ($destinoCosto['plastico']<0){$destinoCosto['plastico']=$diseño->costes->plastico;};
            if ($destinoCosto['ceramica']<0){$destinoCosto['ceramica']=$diseño->costes->ceramica;};
            if ($destinoCosto['liquido']<0){$destinoCosto['liquido']=$diseño->costes->liquido;};
            if ($destinoCosto['micros']<0){$destinoCosto['micros']=$diseño->costes->micros;};
            if ($destinoCosto['personal']<0){$destinoCosto['personal']=$diseño->costes->personal;};
            if ($destinoCosto['masa']<0){$destinoCosto['masa']=$diseño->costes->masa;};

            return $destinoCosto;
        }

        function sumaCualidades($destinoCualidad,$cte,$esteCualidad){
            $destinoCualidad['fuel']+=$esteCualidad['fuel']*$cte;
            $destinoCualidad['municion']+=$esteCualidad['municion']*$cte;
            $destinoCualidad['masa']+=$esteCualidad['masa']*$cte;
            $destinoCualidad['energia']+=$esteCualidad['energia']*$cte;
            $destinoCualidad['tiempo']+=$esteCualidad['tiempo']*$cte;
            $destinoCualidad['mantenimiento']+=$esteCualidad['mantenimiento']*$cte;
            $destinoCualidad['defensa']+=$esteCualidad['defensa']*$cte;
            $destinoCualidad['ataque']+=$esteCualidad['ataque']*$cte;
            $destinoCualidad['velocidad']+=$esteCualidad['velocidad']*$cte;
            $destinoCualidad['carga']+=$esteCualidad['carga']*$cte;
            $destinoCualidad['cargaPequeña']+=$esteCualidad['cargaPequeña']*$cte;
            $destinoCualidad['cargaMediana']+=$esteCualidad['cargaMediana']*$cte;
            $destinoCualidad['cargaGrande']+=$esteCualidad['cargaGrande']*$cte;
            $destinoCualidad['cargaEnorme']+=$esteCualidad['cargaEnorme']*$cte;
            $destinoCualidad['cargaMega']+=$esteCualidad['cargaMega']*$cte;

            return $destinoCualidad;
        }


        $filasCarga=10;


        $arrayArmasTengo=[
            'cantidadCLigeras'=>0,
            'cantidadCMedias'=>0,
            'cantidadCPesadas'=>0,
            'cantidadCInsertadas'=>0,
            'cantidadCMisiles'=>0,
            'cantidadCBombas'=>0
        ];

        $cualidades=[
            'fuel'=>0,
            'municion'=>0,
            'masa'=>0,
            'energia'=>0,
            'tiempo'=>0,
            'mantenimiento'=>0,
            'ataque'=>0,
            'defensa'=>0,
            'velocidad'=>0,
            'carga'=>0,
            'cargaPequeña'=>0,
            'cargaMediana'=>0,
            'cargaGrande'=>0,
            'cargaEnorme'=>0,
            'cargaMega'=>0,
        ];


        $costesDiseño=[
            'mineral'=> $diseño->costes->mineral,
            'cristal'=> $diseño->costes->cristal,
            'gas'=> $diseño->costes->gas,
            'plastico'=> $diseño->costes->plastico,
            'ceramica'=> $diseño->costes->ceramica,
            'liquido'=> $diseño->costes->liquido,
            'micros'=> $diseño->costes->micros,
            'personal'=> $diseño->costes->personal,
            'masa'=> $diseño->cualidades->masa,
        ];

        $cantiFocos=[0,0,0,0,0]; //cada fila
        $danoFocos=[1,1,1,1,1]; //cada fila
        $empujeT=0;
        $ctrlPunteria=0;
        $ariete=0;


        /// cantidades de cada elemento

        $cantidadMotores=$diseño->cualidades->motores;
        $multiplicadorMotores=1;
        if ($cantidadMotores>6){
            $cantidadMotores=celdasMaximas(6,$cantidadMotores);
            $multiplicadorMotores=($diseño->cualidades->motores/$cantidadMotores);
        }

        $cantidadblindajes=$diseño->cualidades->blindajes;
        $multiplicadorblindajes=1;
        if ($cantidadblindajes>14){
        $cantidadblindajes=celdasMaximas(14,$cantidadblindajes);
        $multiplicadorblindajes=($diseño->cualidades->blindajes/$cantidadblindajes);
        }

        $cantidadMejoras=$diseño->cualidades->mejoras;
        $multiplicadormejoras=1;

        $porcent=1;
        $cantidadCLigeras=$diseño->cualidades->armasLigeras;
        $multiplicadorCLigeras=1;
        if ($cantidadCLigeras>0){
            $arrayArmasTengo['cantidadCLigeras']=1;
        }
        if ($cantidadCLigeras>6){
            $cantidadCLigeras=celdasMaximas(6,$cantidadCLigeras);
            $multiplicadorCLigeras=($diseño->cualidades->armasLigeras/$cantidadCLigeras);
        }

        $cantidadCMedias=$diseño->cualidades->armasMedias;
        $multiplicadorCMedias=1;
        if ($cantidadCMedias>0){
            $arrayArmasTengo['cantidadCMedias']=1;
        }
        if ($cantidadCMedias>6){
            $cantidadCMedias=celdasMaximas(6,$cantidadCMedias);
            $multiplicadorCMedias=ceil ($diseño->cualidades->armasMedias/$cantidadCMedias);
        }

        $cantidadCPesadas=$diseño->cualidades->armasPesadas;
        $multiplicadorCPesadas=1;
        if ($cantidadCPesadas>0){
            $arrayArmasTengo['cantidadCPesadas']=1;
        }
        if ($cantidadCPesadas>6){
            $cantidadCPesadas=celdasMaximas(6,$cantidadCPesadas);
            $multiplicadorCPesadas=($diseño->cualidades->armasPesadas/$cantidadCPesadas);
        }

        $cantidadCInsertadas=$diseño->cualidades->armasInsertadas;
        $multiplicadorCInsertadas=1;
        if ($cantidadCInsertadas>0){
            $arrayArmasTengo['cantidadCInsertadas']=1;
        }
        if ($cantidadCInsertadas>6){
            $cantidadCInsertadas=celdasMaximas(6,$cantidadCInsertadas);
            $multiplicadorCInsertadas=($diseño->cualidades->armasInsertadas/$cantidadCInsertadas);
        }

        $cantidadCMisiles=$diseño->cualidades->armasMisiles;
        $multiplicadorCMisiles=1;
        if ($cantidadCMisiles>0){
            $arrayArmasTengo['cantidadCMisiles']=1;
        }
        if ($cantidadCMisiles>6){
            $cantidadCMisiles=celdasMaximas(6,$cantidadCMisiles);
            $multiplicadorCMisiles=($diseño->cualidades->armasMisiles/$cantidadCMisiles);
        }

        $cantidadCBombas=$diseño->cualidades->armasBombas;
        $multiplicadorCBombas=1;
        if ($cantidadCBombas>0){
            $arrayArmasTengo['cantidadCBombas']=1;
        }
        if ($cantidadCBombas>6){
            $cantidadCBombas=celdasMaximas(6,$cantidadCBombas);
            $multiplicadorCBombas=($diseño->cualidades->armasBombas/$cantidadCBombas);
        }


        $cantidadCargaPequeña=$diseño->cualidades->cargaPequeña;
        $multiplicadorCargaPequeña=1;
        if ($cantidadCargaPequeña>$filasCarga){
            $cantidadCargaPequeña=celdasMaximas($filasCarga,$cantidadCargaPequeña);
            $multiplicadorCargaPequeña=($diseño->cualidades->cargaPequeña/$cantidadCargaPequeña);
        }

        $cantidadCargaMedia=$diseño->cualidades->cargaMedia;
        $multiplicadorCargaMedia=1;
        if ($cantidadCargaMedia>$filasCarga){
        $cantidadCargaMedia=celdasMaximas($filasCarga,$cantidadCargaMedia);
        $multiplicadorCargaMedia=ceil ($diseño->cualidades->cargaMedia/$cantidadCargaMedia);
        }

        $cantidadCargaGrande=$diseño->cualidades->cargaGrande;
        $multiplicadorCargaGrande=1;
        if ($cantidadCargaGrande>$filasCarga){
        $cantidadCargaGrande=celdasMaximas($filasCarga,$cantidadCargaGrande);
        $multiplicadorCargaGrande=($diseño->cualidades->cargaGrande/$cantidadCargaGrande);
        }

        $cantidadCargaEnorme=$diseño->cualidades->cargaEnorme;
        $multiplicadorCargaEnorme=1;
        if ($cantidadCargaEnorme>$filasCarga){
        $cantidadCargaEnorme=celdasMaximas($filasCarga,$cantidadCargaEnorme);
        $multiplicadorCargaEnorme=($diseño->cualidades->cargaEnorme/$cantidadCargaEnorme);
        }

        $cantidadCargaMega=$diseño->cualidades->cargaMega;
        $multiplicadorCargaMega=1;
        if ($cantidadCargaMega>$filasCarga){
        $cantidadCargaMega=celdasMaximas($filasCarga,$cantidadCargaMega);
        $multiplicadorCargaMega=($diseño->cualidades->cargaMega/$cantidadCargaMega);
        }

        $multiplicadorArmas=[
            'armasLigera'=>$multiplicadorCLigeras,
            'armasMedia'=>$multiplicadorCMedias,
            'armasPesada'=>$multiplicadorCPesadas,
            'armasInsertada'=>$multiplicadorCInsertadas,
            'armasMisil'=>$multiplicadorCMisiles,
            'armasBomba'=>$multiplicadorCBombas
        ];

        $tiposArmas=[
            'armasLigera',
            'armasMedia',
            'armasPesada',
            'armasInsertada',
            'armasMisil',
            'armasBomba'
        ];

        $correcto=true; // comprobando ranuras
        $razonCorrecto=""; //que salio mal

        if ($cantidadMotores>0){
            if (count($armasTengo['motor'])!=$cantidadMotores){$correcto=false;$razonCorrecto="<br>cantidad de motores ".count($armasTengo['motor'])." != ".$cantidadMotores;};
        }
        if ($cantidadblindajes>0){
            if (count($armasTengo['blindaje'])!=$cantidadblindajes){$correcto=false;$razonCorrecto="<br>cantidad de blindaje ".count($armasTengo['blindaje'])." != ".$cantidadblindajes;};
        }
        if ($cantidadMejoras>0){
            if (count($armasTengo['mejora'])!=$cantidadMejoras){$correcto=false;$razonCorrecto="<br>cantidad de mejora ".count($armasTengo['mejora'])." != ".$cantidadMejoras;};
        }

        if ($cantidadCargaPequeña>0){
            if (count($armasTengo['cargaPequeña'])!=$cantidadCargaPequeña){$correcto=false;$razonCorrecto="<br>cantidad de cargaPequeña ".count($armasTengo['cargaPequeña'])." != ".$cantidadCargaPequeña;};
        }

        if ($cantidadCargaMedia>0){
            if (count($armasTengo['cargaMediana'])!=$cantidadCargaMedia){$correcto=false;$razonCorrecto="<br>cantidad de cargaMediana ".count($armasTengo['cargaMediana'])." != ".$cantidadCargaMedia;};
        }

        if ($cantidadCargaGrande>0){
            if (count($armasTengo['cargaGrande'])!=$cantidadCargaGrande){$correcto=false;$razonCorrecto="<br>cantidad de cargaGrande ".count($armasTengo['cargaGrande'])." != ".$cantidadCargaGrande;};
        }

        if ($cantidadCargaEnorme>0){
            if (count($armasTengo['cargaEnorme'])!=$cantidadCargaEnorme){$correcto=false;$razonCorrecto="<br>cantidad de cargaEnorme ".count($armasTengo['cargaEnorme'])." != ".$cantidadCargaEnorme;};
        }

        if ($cantidadCargaMega>0){
            if (count($armasTengo['cargaMega'])!=$cantidadCargaMega){$correcto=false;$razonCorrecto="<br>cantidad de cargaMega ".count($armasTengo['cargaMega'])." != ".$cantidadCargaMega;};
        }

        if ($cantidadCLigeras>0){
            if (count($armasTengo[$tiposArmas[0]])!=$cantidadCLigeras){$correcto=false;$razonCorrecto="<br>cantidad de armasLigera ".count($armasTengo['armasLigera'])." != ".$cantidadCLigeras;};
        } else {$armasTengo[$tiposArmas[0]]=[0];}
        if ($cantidadCMedias>0){
            if (count($armasTengo[$tiposArmas[1]])!=$cantidadCMedias){$correcto=false;$razonCorrecto="<br>cantidad de armasMedia ".count($armasTengo['armasMedia'])." != ".$cantidadCMedias;};
        } else {$armasTengo[$tiposArmas[1]]=[0];}
        if ($cantidadCPesadas>0){
            if (count($armasTengo[$tiposArmas[2]])!=$cantidadCPesadas){$correcto=false;$razonCorrecto="<br>cantidad de armasPesada ".count($armasTengo['armasPesada'])." != ".$cantidadCPesadas;};
        } else {$armasTengo[$tiposArmas[2]]=[0];}
        if ($cantidadCInsertadas>0){
            if (count($armasTengo[$tiposArmas[3]])!=$cantidadCInsertadas){$correcto=false;$razonCorrecto="<br>cantidad de armasInsertada ".count($armasTengo['armasInsertada'])." != ".$cantidadCInsertadas;};
        } else {$armasTengo[$tiposArmas[3]]=[0];}
        if ($cantidadCMisiles>0){
            if (count($armasTengo[$tiposArmas[4]])!=$cantidadCMisiles){$correcto=false;$razonCorrecto="<br>cantidad de armasMisil ".count($armasTengo['armasMisil'])." != ".$cantidadCMisiles;};
        } else {$armasTengo[$tiposArmas[4]]=[0];}
        if ($cantidadCBombas>0){
            if (count($armasTengo[$tiposArmas[5]])!=$cantidadCBombas){$correcto=false;$razonCorrecto="<br>cantidad de armasBomba ".count($armasTengo['armasBomba'])." != ".$cantidadCBombas;};
        } else {$armasTengo[$tiposArmas[5]]=[0];}

        $cualidadesFuselaje=$diseño->cualidades;

        $costesMisMotores=array("mineral"=>0,"cristal"=>0,"gas"=>0,"plastico"=>0,"ceramica"=>0,"liquido"=>0,"micros"=>0,"personal"=>0,"fuel"=>0,"ma"=>0,"municion"=>0,"masa"=>0,"energia"=>0,"tiempo"=>0,"mantenimiento"=>0,"defensa"=>0,"ataque"=>0,"velocidad"=>0,"carga"=>0,"cargaPequeña"=>0,"cargaMediana"=>0,"cargaGrande"=>0,"cargaEnorme"=>0,"cargaMega"=>0 );
        $costesMisMejoras=array("mineral"=>0,"cristal"=>0,"gas"=>0,"plastico"=>0,"ceramica"=>0,"liquido"=>0,"micros"=>0,"personal"=>0,"fuel"=>0,"ma"=>0,"municion"=>0,"masa"=>0,"energia"=>0,"tiempo"=>0,"mantenimiento"=>0,"defensa"=>0,"ataque"=>0,"velocidad"=>0,"carga"=>0,"cargaPequeña"=>0,"cargaMediana"=>0,"cargaGrande"=>0,"cargaEnorme"=>0,"cargaMega"=>0 );
        $costesMisCargas=array("mineral"=>0,"cristal"=>0,"gas"=>0,"plastico"=>0,"ceramica"=>0,"liquido"=>0,"micros"=>0,"personal"=>0,"fuel"=>0,"ma"=>0,"municion"=>0,"masa"=>0,"energia"=>0,"tiempo"=>0,"mantenimiento"=>0,"defensa"=>0,"ataque"=>0,"velocidad"=>0,"carga"=>0,"cargaPequeña"=>0,"cargaMediana"=>0,"cargaGrande"=>0,"cargaEnorme"=>0,"cargaMega"=>0 );
        $costesMisArmas=array("mineral"=>0,"cristal"=>0,"gas"=>0,"plastico"=>0,"ceramica"=>0,"liquido"=>0,"micros"=>0,"personal"=>0,"fuel"=>0,"ma"=>0,"municion"=>0,"masa"=>0,"energia"=>0,"tiempo"=>0,"mantenimiento"=>0,"defensa"=>0,"ataque"=>0,"velocidad"=>0,"carga"=>0,"cargaPequeña"=>0,"cargaMediana"=>0,"cargaGrande"=>0,"cargaEnorme"=>0,"cargaMega"=>0 );
        $costesMisBlindajes=array("mineral"=>0,"cristal"=>0,"gas"=>0,"plastico"=>0,"ceramica"=>0,"liquido"=>0,"micros"=>0,"personal"=>0,"fuel"=>0,"ma"=>0,"municion"=>0,"masa"=>0,"energia"=>0,"tiempo"=>0,"mantenimiento"=>0,"defensa"=>0,"ataque"=>0,"velocidad"=>0,"carga"=>0,"cargaPequeña"=>0,"cargaMediana"=>0,"cargaGrande"=>0,"cargaEnorme"=>0,"cargaMega"=>0 );

        // comprobando que tengo el fuselaje
        if(empty( $jugadorActual->fuselajes->where('id',$idFuselaje)->first() )) {$correcto=false; $razonCorrecto="<br>No tienes ese fuselaje";};

        /// comprobando sliders
        //energia
        $porcentT=0;
        foreach($energiaArmas as $valor){$porcentT+=$valor; }
        if ($porcentT>1){$correcto=false;};

        //alcance
        foreach($armasAlcance as $valor){
            if ($valor<-7){$correcto=false;};
            if ($valor>7){$correcto=false;};
        }
        foreach($armasDispersion as $valor){
            if ($valor<-7){$correcto=false;};
            if ($valor>7){$correcto=false;};
        }

        $empujeT=0;

        $empuje=[
            '59'=>100,
            '60'=>300000,
            '61'=>1000000,
            '62'=>1000000,
            '63'=>1400000,
            '64'=>2000000,
        ];

        $prueba="";

        if ($correcto){

            // añado energia
            $elemento='motor';
            $genera='energia';
            $misCostes=$costesMisMotores;
            $multiplicador=$multiplicadorMotores;
            foreach( $armasTengo[$elemento] as $e) {
                if ($e>0 and $correcto>0){

                    //$obj=array_search($e,$armas);
                    $obj=$armas->where('codigo',$e)->first();
                    $factorFuselaje=$diseño->cualidades->$genera;
                    $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];

                    //comprobando tengo la tecno necesaria
                    $clase=$obj['clase'];
                    $miNivelTecno= $investigaciones->where('codigo', $clase)->first()->nivel;
                    if ($obj['niveltec']>$miNivelTecno ){
                        $correcto=false;
                        $razonCorrecto+="<br>Tecnologia demasiado baja: "+$clase+" ";
                    };

                    // sumo costes
                    $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                    $misCostes=sumaCostos($misCostes,$multiplicador,$costeobj);// sumo recursos basicos
                    // sumo cualidades
                    $costesVacio[$genera]=$costeobj[$genera]*1*$factorFuselaje; //lo q mejora por esos niveles
                    $costesVacio['tiempo']=$costeobj['tiempo']*$factorFuselaje;
                    $costesVacio['mantenimiento']=$costeobj['mantenimiento']*$factorFuselaje;
                    $costesVacio['fuel']=$costeobj['fuel']*$factorFuselaje;
                    $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                    $empujeT+=$empuje[$obj['codigo']]*$multiplicador*$cualidadesFuselaje['velocidad'];
                    $costesMisMotores=$misCostes;
                }
            }
            // sin motores ya ni mires mas
            if ($empujeT<1){
                $correcto=false;
                $razonCorrecto+="<br>No hay motores";
            }

            // añado blindaje
            $elemento='blindaje';
            $genera='defensa';
            $misCostes=$costesMisBlindajes;
            $multiplicador=$multiplicadorblindajes;
            foreach( $armasTengo[$elemento] as $e) {
                if ($e>0 and $correcto>0){

                    //$obj=array_search($e,$armas);
                    $obj=$armas->where('codigo',$e)->first();
                    $factorFuselaje=$diseño->cualidades->$genera;
                    $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];

                    //comprobando tengo la tecno necesaria
                    $clase=$obj['clase'];
                    $miNivelTecno= $investigaciones->where('codigo', $clase)->first()->nivel;
                    if ($obj['niveltec']>$miNivelTecno ){
                        $correcto=false;
                        $razonCorrecto+="<br>Tecnologia demasiado baja: "+$clase+" ";
                    };

                    // sumo costes
                    $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                    $misCostes=sumaCostos($misCostes,$multiplicador,$costeobj);// sumo recursos basicos
                    // sumo cualidades
                    $costesVacio[$genera]=$costeobj[$genera]*1*$factorFuselaje; //lo q mejora por esos niveles
                    $costesVacio['tiempo']=$costeobj['tiempo']*$factorFuselaje;
                    $costesVacio['mantenimiento']=$costeobj['mantenimiento']*$factorFuselaje;
                    $costesVacio['energia']=$costeobj['energia']*$factorFuselaje;
                    $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                    $costesMisBlindajes=$misCostes;
                }
            }

            //// bucle de cargas
            for ($x=1;$x<6;$x++){
                $genera='carga';
                $misCostes=$costesMisCargas;
                $cantidad=0;
                switch($x){
                    case 1:
                        $elemento='cargaPequeña';
                        $multiplicador=$multiplicadorCargaPequeña;
                        $factorFuselaje=1;
                        $cantidad=$cantidadCargaPequeña;
                    break;
                    case 2:
                        $elemento='cargaMediana';
                        $multiplicador=$multiplicadorCargaMedia;
                        $factorFuselaje=1;
                        $cantidad=$cantidadCargaMedia;
                    break;
                    case 3:
                        $elemento='cargaGrande';
                        $multiplicador=$multiplicadorCargaGrande;
                        $factorFuselaje=1;
                        $cantidad=$cantidadCargaGrande;
                    break;
                    case 4:
                        $elemento='cargaEnorme';
                        $multiplicador=$multiplicadorCargaEnorme;
                        $factorFuselaje=1;
                        $cantidad=$cantidadCargaEnorme;
                    break;
                    case 5:
                        $elemento='cargaMega';
                        $multiplicador=$multiplicadorCargaMega;
                        $factorFuselaje=1;
                        $cantidad=$cantidadCargaMega;
                    break;
                    default:
                        $multiplicador=0;
                }
                $genera2=$elemento;

                if ($cantidad>0){
                    foreach( $armasTengo[$elemento] as $e) {
                        if ($e>0 and $correcto>0){

                            //$obj=array_search($e,$armas);
                            $obj=$armas->where('codigo',$e)->first();
                            //$factorFuselaje=$diseño->cualidades->$genera;
                            $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];

                            //comprobando tengo la tecno necesaria
                            $clase=$obj['clase'];
                            $miNivelTecno= $investigaciones->where('codigo', $clase)->first()->nivel;
                            if ($obj['niveltec']>$miNivelTecno ){
                                $correcto=false;
                                $razonCorrecto+="<br>Tecnologia demasiado baja: "+$clase+" ";
                            };

                            // sumo costes
                            $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                            $misCostes=sumaCostos($misCostes,$multiplicador,$costeobj);// sumo recursos basicos
                            // sumo cualidades
                            $costesVacio[$genera]=$costeobj[$genera]*1*$factorFuselaje; //lo q mejora por esos niveles
                            $costesVacio['tiempo']=$costeobj['tiempo']*$factorFuselaje;
                            $costesVacio['mantenimiento']=$costeobj['mantenimiento']*$factorFuselaje;
                            $costesVacio['energia']=$costeobj['energia']*$factorFuselaje;
                            if ($genera2!=""){$costesVacio[$genera2]=$costeobj[$genera2];} //hangares
                            $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                            $costesMisCargas=$misCostes;
                            //$prueba=$costeobj['energia']." ?".$factorFuselaje." ?";
                        }
                    }
                }
            }




///// mejoras
$elemento='mejora';
$genera='ia';
$multiplicador=1;
$misCostes=$costesMisMejoras;
foreach( $armasTengo[$elemento] as $e) {
    $costesVacio=['mineral'=>0, 'cristal'=>0, 'gas'=>0, 'plastico'=>0, 'ceramica'=>0, 'liquido'=>0, 'micros'=>0, 'personal'=>0, 'fuel'=>0, 'ma'=>0, 'municion'=>0, 'masa'=>0, 'energia'=>0, 'tiempo'=>0, 'mantenimiento'=>0, 'defensa'=>0, 'ataque'=>0, 'velocidad'=>0, 'carga'=>0, 'cargaPequeña'=>0, 'cargaMediana'=>0, 'cargaGrande'=>0, 'cargaEnorme'=>0, 'cargaMega'=>0];
    $sobreCostes=['mineral'=>0, 'cristal'=>0, 'gas'=>0, 'plastico'=>0, 'ceramica'=>0, 'liquido'=>0, 'micros'=>0, 'personal'=>0, 'fuel'=>0, 'ma'=>0, 'municion'=>0, 'masa'=>0, 'energia'=>0, 'tiempo'=>0, 'mantenimiento'=>0, 'defensa'=>0, 'ataque'=>0, 'velocidad'=>0, 'carga'=>0, 'cargaPequeña'=>0, 'cargaMediana'=>0, 'cargaGrande'=>0, 'cargaEnorme'=>0, 'cargaMega'=>0];

    $hazlo=0;
    if ($e>0){
        $obj=$armas->where('codigo',$e)->first();

        switch ($obj['codigo']){

        case 72: //escudos
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisBlindajes);
        break;
        case 75: //salvas
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisArmas);
        break;
        case 77: //standart
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMejoras);

            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMejoras);
        break;
        case 74:
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisArmas);
        break;
        case 76: //aleaciones
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMejoras);

            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMejoras);
        break;
        case 70: //compactador
        case 78: //plegado
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisCargas);
        break;
        case 73: //prop maniobra
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMotores);
        break;
        case 74: //nanos
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisMejoras);

            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMotores);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisBlindajes);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisArmas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisMejoras);
        break;
        case 73: //prop maniobra
        $hazlo++;
        $cte=1;
            $sobreCostes=sumaCostos($sobreCostes,$cte,$costesMisCargas);
            $sobreCostes=sumaCualidades($sobreCostes,$cte,$costesMisCargas);
        break;
        case 71: //ctrol punteria
            $ctrlPunteria++;
        break;
        case 79: //ariete
            $ariete++;
        break;
        case 80:    // foco-caza
            $cantiFocos[0]+=1;
        break;
        case 81:    // foco-ligera
            $cantiFocos[1]+=1;
        break;
        case 82:    //foco-media
            $cantiFocos[2]+=1;
        break;
        case 83:    // foco pesada
            $cantiFocos[3]+=1;
        break;
        case 84:    // foco bombas
            $cantiFocos[4]+=1;
        break;
        //$hazlo++;
        //$cte=1;
        //  sumaCostos($sobreCostes,$cte,costesMisArmas);
        // sumaCualidades($sobreCostes,$cte,costesMisArmas);
        break;



        }

        if ($hazlo>0){

            $costeobj=$costesArmas->where('armas_codigo',$e)->first();

        // sumaCostos($misCostes,$multiplicador,costeobj);// sumo recursos basicos
            $cte=1;//lo que varia por nivel de tecno
            $factorFuselaje=1;     // el factor que varia para cada fuselaje
            $costesVacio[$genera]=$costeobj[$genera]*$cte*$factorFuselaje; //lo q mejora por esos niveles
           // costesVacio['tiempo']=costeobj[genera]*factorFuselaje;
           // costesVacio['mantenimiento']=costeobj[genera]*factorFuselaje;
            //sumaCualidades($misCostes,$multiplicador,costesVacio);
            $costesDiseño=sumaCostosMejoras($costesDiseño,$multiplicador,$costeobj,$sobreCostes);
            $cualidades=sumaCualidadesMejoras($cualidades,$multiplicador,$costeobj,$sobreCostes);
        }
    }
};

$cteAriete=1;
$costoFocoA=1; //coste acumulado foco

        if($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0){
        //// armas ///////

        $energiaT=$costesMisMotores['energia']+$costesMisBlindajes['energia']+$costesMisCargas['energia']+$cualidades['energia']; // energia para armas total
        $misCostes=$costesMisArmas;
        //$armasTengoT=count($armasTengo[$tiposArmas[0]])+count($armasTengo[$tiposArmas[1]])+$armasTengo[$tiposArmas[2]]+$armasTengo[$tiposArmas[3]]+$armasTengo[$tiposArmas[4]]+$armasTengo[$tiposArmas[5]];



        // posicion del daño segun el arma

        $danoPosicion=[
            'armasLigera'=>[0,1],
            'armasMedia'=>[1,2],
            'armasPesada'=>[2,3],
            'armasInsertada'=>[3,4],
            'armasMisil'=>[3,5],
            'armasBomba'=>[4,2]
        ];

        $listaTecnos = [
            "invEnergia",
            "invPlasma",
            "invBalistica",
            "invMa"
        ];

        $danoinvEnergia=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
        $danoinvPlasma=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
        $danoinvBalistica=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
        $danoinvMa=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];

        $danoTotal=[
            'invEnergia'=>$danoinvEnergia,
            'invPlasma'=>$danoinvPlasma,
            'invBalistica'=>$danoinvBalistica,
            'invMa'=>$danoinvMa
        ];

        $cteFoco=1;
        $costoFoco=1;
        $energiaUsada=0;
        $costoFocoA=1;
        foreach( $tiposArmas as $elemento) {

            $hayalgo=1;
            $cteFoco=1;
            $costoFoco=1;

            // focos
            if($cantiFocos[$danoPosicion[$elemento][0]]>0){
                $e2=$danoPosicion[$elemento][0]+80;
                $costeobj2=$costesArmas->where('armas_codigo',$e2)->first();
                $cuantos2=$cantiFocos[$danoPosicion[$elemento][0]];
                $cteFoco=$cuantos2;//lo que varia por nivel de tecno
                $costoFoco=(1+($costeobj2['mineral']/100) )*$cuantos2; // es el que se usa para todos
                $danoFocos[$danoPosicion[$elemento][0]]=$costoFoco;
                $costoFocoA+=$costoFoco; //acumulado
            }
        }
        $prueba=$costoFocoA;


        foreach( $tiposArmas as $elemento) {

            $energiaArm=0;
            $dañoarmasArm=0;
            foreach( $armasTengo[$elemento] as $e) {
                    if ($e>0){
                        $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                        $energiaArm+=$costeobj['energia'];
                    }
                }

            if ($energiaArm!=0) {
                $energiaXarma=1/$energiaArm;
            } else {$energiaXarma=0;}

            $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];
            //$elemento='blindaje';
            //$genera='defensa';
            $misCostes=$costesMisArmas;
            $multiplicador=$multiplicadorblindajes;


            foreach( $armasTengo[$elemento] as $e) {

                    if ($e>0 and $correcto>0){

                        $hayalgo=1;

                        $costoPunteria=1;
                        $ctePunteria=1;
                        if ($ctrlPunteria>0){
                            $e2=71;
                            $costeobj2=$costesArmas->where('armas_codigo',$e2)->first();
                            $cuantos2=$ctrlPunteria;
                            $ctePunteria=($cuantos2);//lo que varia por nivel de tecno
                            $costoPunteria=(1+($costeobj2['mineral']/100) )*$cuantos2;
                        }
                        $costoAriete=1;
                        // cteAriete=1;
                        if ($ariete>0){
                            $e2=71;
                            $costeobj2=$costesArmas->where('armas_codigo',$e2)->first();
                            $cuantos2=$ariete;
                            $cteAriete=($cuantos2);//lo que varia por nivel de tecno
                            $costoAriete=(1+($costeobj2['mineral']/100) )*$cuantos2;
                        }


                        //$obj=array_search($e,$armas);
                        $obj=$armas->where('codigo',$e)->first();
                        $factorFuselaje=$diseño->cualidades->$genera;
                        $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];

                        //comprobando tengo la tecno necesaria
                        $clase=$obj['clase'];
                        $miNivelTecno= $investigaciones->where('codigo', $clase)->first()->nivel;
                        if ($obj['niveltec']>$miNivelTecno ){
                            $correcto=false;
                            $razonCorrecto+="<br>Tecnologia demasiado baja: "+$clase+" ";
                        };
                        $variacionAlcance=1;$variacionDispersion=1;

                        $cantidadArmas=$multiplicadorArmas[$elemento];
                        $estedano=$energiaArmas[$elemento]*$energiaT*$energiaXarma/$costeobj['energia']*$cantidadArmas;
                        //$prueba .=$costesMisMotores['energia']." ".$costesMisBlindajes['energia']." ".$costesMisCargas['energia']." ".$cualidades['energia'];;
                        //$prueba.=" <br> ".$energiaArmas[$elemento]." ".$energiaT." ".$energiaXarma." / ".$costeobj['energia'];
                        //$prueba.=" <br> ".$estedano;
                        $cte=1; //la tecno
                        $creceExpo=1+(($estedano/$costeobj['ataque'])*2000 );
                        $dañoarmasArm+=round($cteFoco*($cte*$estedano*100000/$creceExpo),0);// la tecno influye solo en el valor final del daño
                        $multiplicador=$estedano*10*$creceExpo;
                        $alcance=$danoPosicion[$elemento][1]+1*$armasAlcance[$elemento];
                        if ($alcance>7){$alcance=7;};
                        if ($alcance<0){$alcance=0;};
                        $variacionAlcance= pow(2.5,(1*$armasAlcance[$elemento]));
                        $variacionDispersion=pow(1.5,(1*$armasDispersion[$elemento]));

                        // sumo costes
                        $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                        $misCostes=sumaCostos($misCostes,$multiplicador*$variacionAlcance*$variacionDispersion*$costoFocoA*$costoPunteria*$costoAriete,$costeobj);// sumo recursos basicos
                        // sumo cualidades
                        $costesVacio[$genera]=$costeobj[$genera]*1*$factorFuselaje; //lo q mejora por esos niveles
                        $costesVacio['tiempo']=$costeobj['tiempo']*$factorFuselaje;
                        $costesVacio['mantenimiento']=$costeobj['mantenimiento']*$factorFuselaje;
                        $costesVacio['energia']=$costeobj['energia']*$factorFuselaje;
                        $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                        $costesMisArmas=$misCostes;

                        $danoTotal[$obj['clase']][$danoPosicion[$elemento][0]][$alcance]=$dañoarmasArm;
                }
            }
        }


    //suma de todos los costes:
        $cte=1;
        $costesDiseño=sumaCostos($costesDiseño,$cte,$costesMisMotores);
        $costesDiseño=sumaCostos($costesDiseño,$cte,$costesMisBlindajes);
        $costesDiseño=sumaCostos($costesDiseño,$cte,$costesMisArmas);
        $costesDiseño=sumaCostos($costesDiseño,$cte,$costesMisCargas);
        $costesDiseño=sumaCostos($costesDiseño,$cte,$costesMisMejoras);

        $cualidades=sumaCualidades($cualidades,$cte,$costesMisMotores);
        $cualidades=sumaCualidades($cualidades,$cte,$costesMisBlindajes);
        $cualidades=sumaCualidades($cualidades,$cte,$costesMisArmas);
        $cualidades=sumaCualidades($cualidades,$cte,$costesMisCargas);
        $cualidades=sumaCualidades($cualidades,$cte,$costesMisMejoras);

        // quitando decimales

        $costesDiseño['mineral']=round($costesDiseño['mineral'],0);
        $costesDiseño['cristal']=round($costesDiseño['cristal'],0);
        $costesDiseño['gas']=round($costesDiseño['gas'],0);
        $costesDiseño['plastico']=round($costesDiseño['plastico'],0);
        $costesDiseño['ceramica']=round($costesDiseño['ceramica'],0);
        $costesDiseño['liquido']=round($costesDiseño['liquido'],0);
        $costesDiseño['micros']=round($costesDiseño['micros'],0);
        $costesDiseño['personal']=round($costesDiseño['personal'],0);

        /// velocidad

        $pesoInicial=.0005*$diseño->cualidades->masa * ($diseño->costes->mineral * 50+$diseño->costes->cristal * 260+$diseño->costes->gas * 1000+$diseño->costes->plastico * 4000+$diseño->costes->ceramica * 600+$diseño->costes->liquido * 500+$diseño->costes->micros * 2000+$diseño->costes->personal * 500);

        $pesoTotal=($cualidades['masa']+$pesoInicial);
        $cualidades['velocidad']=min($empujeT/$pesoTotal,$cualidadesFuselaje['velocidadMax'],19.99);
        $cualidades['velocidad']=( round($cualidades['velocidad']*100,0))/100;



        //guardando diseño

        $diseñoS=new Diseños();
        $diseñoS->nombre=$datosBasicos['nombre'];
        if ($datosBasicos['descripcion']=""){
            $diseñoS->descripcion="";
        } else {
            $diseñoS->descripcion=$datosBasicos['descripcion'];
        }

        $position=$datosBasicos['posicion'];
        if ($position=""){
            $diseñoS->posicion=1;
        } else {
            if ((int)($position)<1){$position=1;}
            if ((int)($position)>9){$position=9;}
            $diseñoS->posicion=$position;
        }


        $diseñoS->codigo=$diseño->codigo;
        $diseñoS->skin=$datosBasicos['skin'];
        $diseñoS->save();
        $jugadorActual->diseños()->attach($diseñoS->id);


        $diseñoId=$diseñoS->id;

        /// guardando costes
        $costesDiseñoS=new CostesDiseños();
        $costesDiseñoS->mineral=$costesDiseño['mineral'];
        $costesDiseñoS->cristal=$costesDiseño['cristal'];
        $costesDiseñoS->gas=$costesDiseño['gas'];
        $costesDiseñoS->plastico=$costesDiseño['plastico'];
        $costesDiseñoS->ceramica=$costesDiseño['ceramica'];
        $costesDiseñoS->liquido=$costesDiseño['liquido'];
        $costesDiseñoS->micros=$costesDiseño['micros'];
        $costesDiseñoS->fuel=$cualidades['fuel'];
        $costesDiseñoS->ma=0;
        $costesDiseñoS->municion=$cualidades['fuel'];
        $costesDiseñoS->personal=$costesDiseño['personal'];
        $costesDiseñoS->mantenimiento=$cualidades['fuel'];
        $costesDiseñoS->masa=$pesoTotal;
        $costesDiseñoS->energia=0;
        $costesDiseñoS->defensa=$cualidades['defensa'];
        $costesDiseñoS->ataque=0;
        $costesDiseñoS->tiempo=$cualidades['tiempo'];
        $costesDiseñoS->velocidad=$cualidades['velocidad'];
        $costesDiseñoS->carga=$cualidades['carga'];
        $costesDiseñoS->cargaPequeña=$cualidades['cargaPequeña'];
        $costesDiseñoS->cargaMediana=$cualidades['cargaMediana'];
        $costesDiseñoS->cargaGrande=$cualidades['cargaGrande'];
        $costesDiseñoS->cargaEnorme=$cualidades['cargaEnorme'];
        $costesDiseñoS->cargaMega=$cualidades['cargaMega'];
        $costesDiseñoS->diseños_id=$diseñoId;
        $costesDiseñoS->save();


        //function dibujaDano($armasDispersion ){


            $sumaataque=0;
            $arrayDispersion=[
                (1*$armasDispersion['armasLigera'])+1,
                (1*$armasDispersion['armasMedia'])+1,
                (1*$armasDispersion['armasPesada'])+1,
                (1*$armasDispersion['armasInsertada'])+1,
                (1*$armasDispersion['armasMisil'])+1,
                (1*$armasDispersion['armasBomba'])+1
            ];

        foreach ($listaTecnos as $tecno ) {
            $danoTotalV=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
            for($F=0;$F<5;$F++){
                $dispersion=.2*$arrayDispersion[$F];
                for($C=7;$C>-1;$C--){
                    $valueAqui=$danoTotal[$tecno][$F][$C];
                    if ($valueAqui>0){
                        $danoTotalV[$F][$C]+=round($valueAqui,0);
                            for($c=$C-1;$c>-1;$c--){ //atras
                                $aAriete=1;
                                if ($c==0 && $ariete>0){$aAriete=$ariete*$cteAriete;}
                                $danoTotalV[$F][$c]+=round($aAriete*$valueAqui*(1+($dispersion*($C-$c) )),0);
                                $danoInf=$aAriete*$valueAqui*(1+($dispersion*($C-$c) ))/1.25;
                                for($f=$F+1;$f<4;$f++){ //atras abajo
                                    $danoTotalV[$f][$c]+=round($danoInf,0);
                                }
                                for($f=$F-1;$f>-1;$f--){ //atras arriba
                                    $danoTotalV[$f][$c]+=round($danoInf*.01*$f,0);
                                }
                            }
                            for($f=$F+1;$f<4;$f++){ // abajo
                                    $danoTotalV[$f][$C]+=round($valueAqui/1.25,0);
                            }
                            for($f=$F-1;$f>-1;$f--){ // arriba
                                $danoTotalV[$f][$C]+=round($valueAqui*.01*$f,0);
                            }

                    }
                    if ($danoTotalV[$F][$C]<1){$danoTotalV[$F][$C]=0;}
                    //$prueba.=$valueAqui." ";
                }
            // $prueba =$danoTotalV;

            }

            // guardando el daño
            for($F=0;$F<5;$F++){

                if ($danoTotalV[$F][0]>0){
                    $filaDaño=new DañosDiseños();
                    $n=0;
                    foreach($danoTotalV[$F] as $daño){
                        $distancia="distancia".$n;
                        $filaDaño->{$distancia}= $daño;
                        $n++;
                    }
                    $filaDaño->investigacion=$tecno;
                    $filaDaño->fila=$F;
                    $filaDaño->diseños_id=$diseñoId;
                    $filaDaño->save();
                }

            }
        }


        /// guardando elementos
        /*

        $armasTengo = ($_POST['armas']);
        $energiaArmas = ($_POST['energiaArmas']);
        $armasAlcance = ($_POST['armasAlcance']);
        $armasDispersion = ($_POST['armasDispersion']);
        */

        $armasCualidades=[];
        for ($x=0;$x<100;$x++){
            array_push($armasCualidades, 0);
        }

        foreach( $armasTengo as $elemento) {
            //$prueba=$elemento;
            foreach( $elemento as $e) {
                if ($e>0){
                    $armasCualidades[$e]++;
                }
            }
        }

        for ($x=0;$x<100;$x++){
            if ($armasCualidades[$x]>0){
                $filaCualidades=new CualidadesDiseños();
                $filaCualidades->codigo=$x;
                $filaCualidades->cantidad=$armasCualidades[$x];
                $filaCualidades->categoria="";

            }

        }

        //$prueba=$armasCualidades;
        //$prueba=$armasTengo;

    //use App\DañosDiseños;
    //use App\CostesDiseños;
    //use App\CualidadesDiseños;





    /*
        $interviniente = new MensajesIntervinientes();
        $interviniente->receptor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        $interviniente->leido = false;
        $interviniente->mensajes_id = $mensaje->id;
        $interviniente->save();
        */


    }

    }



        //$prueba = $danoTotal['invMa'];
        return compact('razonCorrecto','prueba');

    }
}