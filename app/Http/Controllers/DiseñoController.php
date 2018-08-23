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

class DiseñoController extends Controller
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

        return view('juego.diseño', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones', 'factoresIndustrias'));
    }
    public function diseñar ($idFuselaje)
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


        return view('juego.diseñar.diseñar', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'diseño', 'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas','investigaciones', 'armas', 'constantesI', 'costesArmas', 'factoresIndustrias'));
    }



    public function crearDiseño($id = false){

        $armas = ($_POST['armas']);
        $energiaArmas = ($_POST['energiaArmas']);
        $armasAlcance = ($_POST['armasAlcance']);
        $armasDispersion = ($_POST['armasDispersion']);
        $datosBasicos = ($_POST['datosBasicos']);

        $idFuselaje=$datosBasicos['id'];

        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $diseño = Fuselajes::find($idFuselaje);
        $constantesI=Constantes::where('tipo','investigacion')->get();
        $costesArmas = CostesArmas::all();

        function celdasMaximas($a,$b) { //saco la cantidad de celdas justas
            while ( ((int)($b/$a)-($b/$a)) !=0 ) {
            --$a;
            }
        return $a;
        }

        $filasCarga=10;

        $investNiveles=[
            "invEnergia"=>$investigaciones->where("codigo","invEnergia")->first()->nivel,
            "invPlasma"=>$investigaciones->where("codigo","invPlasma")->first()->nivel,
            "invBalistica"=>$investigaciones->where("codigo","invBalistica")->first()->nivel,
            "invMa"=>$investigaciones->where("codigo","invMa")->first()->nivel,

            "invPropQuimico"=>$investigaciones->where("codigo","invPropQuimico")->first()->nivel,
            "invPropNuk"=>$investigaciones->where("codigo","invPropNuk")->first()->nivel,
            "invPropIon"=>$investigaciones->where("codigo","invPropIon")->first()->nivel,
            "invPropPlasma"=>$investigaciones->where("codigo","invPropPlasma")->first()->nivel,
            "invPropMa"=>$investigaciones->where("codigo","invPropMa")->first()->nivel,

            "invBlindaje"=>$investigaciones->where("codigo","invBlindaje")->first()->nivel,
            "invCarga"=>$investigaciones->where("codigo","invCarga")->first()->nivel,
            "invIa"=>$investigaciones->where("codigo","invIa")->first()->nivel
        ];


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

        if (count($armas['motor'])!=$cantidadMotores){$correcto=false;};
        if (count($armas['blindaje'])!=$cantidadblindajes){$correcto=false;};
        if (count($armas['mejora'])!=$cantidadMejoras){$correcto=false;};

        if ($cantidadCargaPequeña>0){
            if (count($armas['cargaPequeña'])!=$cantidadCargaPequeña){$correcto=false;};
        }


        $cargaPequeñas=[];
        for($n=0;$n<$cantidadCargaPequeña;$n++){ array_push($cargaPequeñas,0);}

        $cargaMedianas=[];
        for($n=0;$n<$cantidadCargaMedia;$n++){ array_push($cargaMedianas,0);}

        $cargaGrandes=[];
        for($n=0;$n<$cantidadCargaGrande;$n++){ array_push($cargaGrandes,0);}

        $cargaEnorme=[];
        for($n=0;$n<$cantidadCargaEnorme;$n++){ array_push($cargaEnorme,0);}

        $cargaMega=[];
        for($n=0;$n<$cantidadCargaMega;$n++){ array_push($cargaMega,0);}

        $armasLigeras=[];
        for($n=0;$n<$cantidadCLigeras;$n++){ array_push($armasLigeras,0);}

        $armasMedias=[];
        for($n=0;$n<$cantidadCMedias;$n++){ array_push($armasMedias,0);}

        $armasPesadas=[];
        for($n=0;$n<$cantidadCPesadas;$n++){ array_push($armasPesadas,0);}

        $armasInsertadas=[];
        for($n=0;$n<$cantidadCInsertadas;$n++){ array_push($armasInsertadas,0);}

        $armasMisiles=[];
        for($n=0;$n<$cantidadCMisiles;$n++){ array_push($armasMisiles,0);}

        $armasBombas=[];
        for($n=0;$n<$cantidadCBombas;$n++){ array_push($armasBombas,0);}



        $bool = count($armas['motor']);

        return compact('bool');

    }
}