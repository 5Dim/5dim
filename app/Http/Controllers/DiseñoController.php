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

class DiseñoController extends Controller
{
    public function index ()
    {
        //Inicio recursos
        //Buscamos el jugador actual
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        //Listado de plantas propios y de alianza
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();

        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;

        //Comprobamos si el usuario tiene alianza para devolver los planetas
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
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

        //Investigaciones
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);

        //Tecnologias para mostrar y calcular los puntos
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeNaves = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeNaves')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);

        //Calculo de mejora de las industrias
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

        return view('juego.diseño', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio',
        'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones', 'factoresIndustrias',
        'planetasJugador', 'planetasAlianza'));
    }
    public function diseñar ($idFuselaje)
    {
        //Inicio recursos
        //Buscamos el jugador actual
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        //Listado de plantas propios y de alianza
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();

        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;

        //Comprobamos si el usuario tiene alianza para devolver los planetas
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
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

        //Investigaciones
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);

        //Tecnologias para mostrar y calcular los puntos
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeNaves = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeNaves')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);

        //Calculo de mejora de las industrias
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



    public function crearDiseño($id = false){

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
            if (count($armasTengo['armasLigera'])!=$cantidadCLigeras){$correcto=false;$razonCorrecto="<br>cantidad de armasLigera ".count($armasTengo['armasLigera'])." != ".$cantidadCLigeras;};
        }
        if ($cantidadCMedias>0){
            if (count($armasTengo['armasMedia'])!=$cantidadCMedias){$correcto=false;$razonCorrecto="<br>cantidad de armasMedia ".count($armasTengo['armasMedia'])." != ".$cantidadCMedias;};
        }
        if ($cantidadCPesadas>0){
            if (count($armasTengo['armasPesada'])!=$cantidadCPesadas){$correcto=false;$razonCorrecto="<br>cantidad de armasPesada ".count($armasTengo['armasPesada'])." != ".$cantidadCPesadas;};
        }
        if ($cantidadCInsertadas>0){
            if (count($armasTengo['armasInsertada'])!=$cantidadCInsertadas){$correcto=false;$razonCorrecto="<br>cantidad de armasInsertada ".count($armasTengo['armasInsertada'])." != ".$cantidadCInsertadas;};
        }
        if ($cantidadCMisiles>0){
            if (count($armasTengo['armasMisil'])!=$cantidadCMisiles){$correcto=false;$razonCorrecto="<br>cantidad de armasMisil ".count($armasTengo['armasMisil'])." != ".$cantidadCMisiles;};
        }
        if ($cantidadCBombas>0){
            if (count($armasTengo['armasBomba'])!=$cantidadCBombas){$correcto=false;$razonCorrecto="<br>cantidad de armasBomba ".count($armasTengo['armasBomba'])." != ".$cantidadCBombas;};
        }

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

        $prueba="nada";

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
                            if ($genera2!=""){$costesVacio[$genera2]=$costeobj[$genera2];} //hangares
                            $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                            $costesMisCargas=$misCostes;
                        }
                    }
                }
            }

        if($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0){
        //// armas ///////

        $energiaT=$costesMisMotores['energia']+$costesMisBlindajes['energia']+$costesMisCargas['energia']+$cualidades['energia']; // energia para armas total
        $misCostes=$costesMisArmas;
        $armasTengoT=$armasTengo['cantidadCLigeras']+$armasTengo['cantidadCMedias']+$armasarmasTengo['cantidadCPesadas']+$armasTengo['cantidadCInsertadas']+$armasTengo['cantidadCMisiles']+$armasTengo['cantidadCBombas'];



        // posicion del daño segun el arma

        $danoPosicion=[
            'armasLigera'=>[0,1],
            'armasMedia'=>[1,2],
            'armasPesada'=>[2,3],
            'armasInsertada'=>[3,4],
            'armasMisil'=>[3,5],
            'armasBomba'=>[4,2]
        ];

        $tiposArmas=[
            'armasLigera',
            'armasMedia',
            'armasPesada',
            'armasInsertada',
            'armasMisil',
            'armasBomba'
        ];



        $energiaUsada=0;

        foreach( $tiposArmas as $elemento) {

            $costesVacio=["mineral"=>0, "cristal"=>0, "gas"=>0, "plastico"=>0, "ceramica"=>0, "liquido"=>0, "micros"=>0, "personal"=>0, "fuel"=>0, "ma"=>0, "municion"=>0, "masa"=>0, "energia"=>0, "tiempo"=>0, "mantenimiento"=>0, "defensa"=>0, "ataque"=>0, "velocidad"=>0, "carga"=>0, "cargaPequeña"=>0, "cargaMediana"=>0, "cargaGrande"=>0, "cargaEnorme"=>0, "cargaMega"=>0,];
            //$elemento='blindaje';
            //$genera='defensa';
            $misCostes=$costesMisArmas;
            $multiplicador=$multiplicadorblindajes;

            foreach( $armasTengo[$elemento] as $e) {

                    if ($e>0 and $correcto>0){
                        $hayalgo=1;
                        $cteFoco=1;
                        $costoFoco=1;

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

                        $cantidadArmas=$multiplicadorArmas[$elemento];
                        $estedano=$energiaArmas[$elemento]*$energiaT*$energiaXarma/$costeobj['energia']*$cantidadArmas;
                        // sumo costes
                        $costeobj=$costesArmas->where('armas_codigo',$e)->first();
                        $misCostes=sumaCostos($misCostes,$multiplicador,$costeobj);// sumo recursos basicos
                        // sumo cualidades
                        $costesVacio[$genera]=$costeobj[$genera]*1*$factorFuselaje; //lo q mejora por esos niveles
                        $costesVacio['tiempo']=$costeobj['tiempo']*$factorFuselaje;
                        $costesVacio['mantenimiento']=$costeobj['mantenimiento']*$factorFuselaje;
                        $costesVacio['energia']=$costeobj['energia']*$factorFuselaje;
                        $misCostes=sumaCualidades($misCostes,$multiplicador,$costesVacio);
                        $costesMisArmas=$misCostes;


                }
            }
        }


    /*
        $interviniente = new MensajesIntervinientes();
        $interviniente->receptor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        $interviniente->leido = false;
        $interviniente->mensajes_id = $mensaje->id;
        $interviniente->save();
        */


    }

    }

        $prueba = $costesMisCargas;
        return compact('razonCorrecto','prueba');

    }
}