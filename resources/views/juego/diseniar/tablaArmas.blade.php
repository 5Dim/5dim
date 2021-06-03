@php
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

    "invTitanio"=>$investigaciones->where("codigo","invTitanio")->first()->nivel,  //invBlindaje
    "invReactivo"=>$investigaciones->where("codigo","invReactivo")->first()->nivel,
    "invResinas"=>$investigaciones->where("codigo","invResinas")->first()->nivel,
    "invPlacas"=>$investigaciones->where("codigo","invPlacas")->first()->nivel,
    "invCarbonadio"=>$investigaciones->where("codigo","invCarbonadio")->first()->nivel,

    "invCarga"=>$investigaciones->where("codigo","invCarga")->first()->nivel,
    "invHangar"=>$investigaciones->where("codigo","invHangar")->first()->nivel,
    "invRecoleccion"=>$investigaciones->where("codigo","invRecoleccion")->first()->nivel,
    "invIa"=>$investigaciones->where("codigo","invIa")->first()->nivel
];



$arrayCss=[];
$arrayStart=[];
$arrayConnect=[];
$arrayTooltip=[];
$arrayArmasTengo=[
    'cantidadCLigeras'=>0,
    'cantidadCMedias'=>0,
    'cantidadCPesadas'=>0,
    'cantidadCInsertadas'=>0,
    'cantidadCMisiles'=>0,
    'cantidadCBombas'=>0
];




/// cantidades de cada elemento

$cantidadMotores=$disenio->cualidades->motores;
$multiplicadorMotores=1;
if ($cantidadMotores>6){
    $cantidadMotores=celdasMaximas(6,$cantidadMotores);
    $multiplicadorMotores=($disenio->cualidades->motores/$cantidadMotores);
}

$cantidadblindajes=$disenio->cualidades->blindajes;
$multiplicadorblindajes=1;
if ($cantidadblindajes>14){
$cantidadblindajes=celdasMaximas(14,$cantidadblindajes);
$multiplicadorblindajes=($disenio->cualidades->blindajes/$cantidadblindajes);
}

$cantidadMejoras=$disenio->cualidades->mejoras;
$multiplicadormejoras=1;

$porcentAcumulado=0;
$cantidadCLigeras=$disenio->cualidades->armasLigeras;
$multiplicadorCLigeras=1;
if ($cantidadCLigeras>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasLigera'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-1-color');
    array_push($arrayTooltip,'% de energía a cañones ligeros');
    $arrayArmasTengo['cantidadCLigeras']=1;
}
if ($cantidadCLigeras>6){
    $cantidadCLigeras=celdasMaximas(6,$cantidadCLigeras);
    $multiplicadorCLigeras=($disenio->cualidades->armasLigeras/$cantidadCLigeras);
}

$cantidadCMedias=$disenio->cualidades->armasMedias;
$multiplicadorCMedias=1;
if ($cantidadCMedias>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasMedia'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-2-color');
    array_push($arrayTooltip,'% de energía a cañones medios');
    $arrayArmasTengo['cantidadCMedias']=1;
}
if ($cantidadCMedias>6){
    $cantidadCMedias=celdasMaximas(6,$cantidadCMedias);
    $multiplicadorCMedias=ceil ($disenio->cualidades->armasMedias/$cantidadCMedias);
}

$cantidadCPesadas=$disenio->cualidades->armasPesadas;
$multiplicadorCPesadas=1;
if ($cantidadCPesadas>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasPesada'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-3-color');
    array_push($arrayTooltip,'% de energía a cañones pesados');
    $arrayArmasTengo['cantidadCPesadas']=1;
}
if ($cantidadCPesadas>6){
    $cantidadCPesadas=celdasMaximas(6,$cantidadCPesadas);
    $multiplicadorCPesadas=($disenio->cualidades->armasPesadas/$cantidadCPesadas);
}

$cantidadCInsertadas=$disenio->cualidades->armasInsertadas;
$multiplicadorCInsertadas=1;
if ($cantidadCInsertadas>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasInsertada'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-4-color');
    array_push($arrayTooltip,'% de energía a cañones insertados');
    $arrayArmasTengo['cantidadCInsertadas']=1;
}
if ($cantidadCInsertadas>6){
    $cantidadCInsertadas=celdasMaximas(6,$cantidadCInsertadas);
    $multiplicadorCInsertadas=($disenio->cualidades->armasInsertadas/$cantidadCInsertadas);
}

$cantidadCMisiles=$disenio->cualidades->armasMisiles;
$multiplicadorCMisiles=1;
if ($cantidadCMisiles>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasMisil'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-5-color');
    array_push($arrayTooltip,'% de energía a misiles');
    $arrayArmasTengo['cantidadCMisiles']=1;
}
if ($cantidadCMisiles>6){
    $cantidadCMisiles=celdasMaximas(6,$cantidadCMisiles);
    $multiplicadorCMisiles=($disenio->cualidades->armasMisiles/$cantidadCMisiles);
}

$cantidadCBombas=$disenio->cualidades->armasBombas;
$multiplicadorCBombas=1;
if ($cantidadCBombas>0){
    $porcentAcumulado+=$arrayEnergiaArmas['armasBomba'];
    array_push($arrayStart,$porcentAcumulado);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-6-color');
    array_push($arrayTooltip,'% de energía a bombas');
    $arrayArmasTengo['cantidadCBombas']=1;
}
if ($cantidadCBombas>6){
    $cantidadCBombas=celdasMaximas(6,$cantidadCBombas);
    $multiplicadorCBombas=($disenio->cualidades->armasBombas/$cantidadCBombas);
}


array_push($arrayConnect,true);
array_push($arrayCss,'c-7-color');


$cantidadCargaPequenia=$disenio->cualidades->cargaPequenia;
$multiplicadorCargaPequenia=1;
if ($cantidadCargaPequenia>$filasCarga){
    $cantidadCargaPequenia=celdasMaximas($filasCarga,$cantidadCargaPequenia);
    $multiplicadorCargaPequenia=($disenio->cualidades->cargaPequenia/$cantidadCargaPequenia);
}

$cantidadCargaMedia=$disenio->cualidades->cargaMedia;
$multiplicadorCargaMedia=1;
if ($cantidadCargaMedia>$filasCarga){
$cantidadCargaMedia=celdasMaximas($filasCarga,$cantidadCargaMedia);
$multiplicadorCargaMedia=ceil ($disenio->cualidades->cargaMedia/$cantidadCargaMedia);
}

$cantidadCargaGrande=$disenio->cualidades->cargaGrande;
$multiplicadorCargaGrande=1;
if ($cantidadCargaGrande>$filasCarga){
$cantidadCargaGrande=celdasMaximas($filasCarga,$cantidadCargaGrande);
$multiplicadorCargaGrande=($disenio->cualidades->cargaGrande/$cantidadCargaGrande);
}

$cantidadCargaEnorme=$disenio->cualidades->cargaEnorme;
$multiplicadorCargaEnorme=1;
if ($cantidadCargaEnorme>$filasCarga){
$cantidadCargaEnorme=celdasMaximas($filasCarga,$cantidadCargaEnorme);
$multiplicadorCargaEnorme=($disenio->cualidades->cargaEnorme/$cantidadCargaEnorme);
}

$cantidadCargaMega=$disenio->cualidades->cargaMega;
$multiplicadorCargaMega=1;
if ($cantidadCargaMega>$filasCarga){
$cantidadCargaMega=celdasMaximas($filasCarga,$cantidadCargaMega);
$multiplicadorCargaMega=($disenio->cualidades->cargaMega/$cantidadCargaMega);
}

//arrays que vienen
$motores=[];
for($n=0;$n<$cantidadMotores;$n++){ array_push($motores,$arrayObjetos['motor'][$n]);}

$blindajes=[];
for($n=0;$n<$cantidadblindajes;$n++){ array_push($blindajes,$arrayObjetos['blindaje'][$n]);}

$mejoras=[];
for($n=0;$n<$cantidadMejoras;$n++){ array_push($mejoras,1*$arrayObjetos['mejora'][$n]);}

$cargaPequenias=[];
for($n=0;$n<$cantidadCargaPequenia;$n++){  array_push($cargaPequenias,$arrayObjetos['cargaPequenia'][$n]);}

$cargaMedianas=[];
for($n=0;$n<$cantidadCargaMedia;$n++){  array_push($cargaMedianas,$arrayObjetos['cargaMediana'][$n]);}

$cargaGrandes=[];
for($n=0;$n<$cantidadCargaGrande;$n++){  array_push($cargaGrandes,$arrayObjetos['cargaGrande'][$n]);}

$cargaEnorme=[];
for($n=0;$n<$cantidadCargaEnorme;$n++){ array_push($cargaEnorme,$arrayObjetos['cargaEnorme'][$n]);}

$cargaMega=[];
for($n=0;$n<$cantidadCargaMega;$n++){  array_push($cargaMega,$arrayObjetos['cargaMega'][$n]);}

$armasLigeras=[];
for($n=0;$n<$cantidadCLigeras;$n++){ array_push($armasLigeras,$arrayObjetos['armasLigera'][$n]);}

$armasMedias=[];
for($n=0;$n<$cantidadCMedias;$n++){ array_push($armasMedias,$arrayObjetos['armasMedia'][$n]);}

$armasPesadas=[];
for($n=0;$n<$cantidadCPesadas;$n++){ array_push($armasPesadas,$arrayObjetos['armasPesada'][$n]);}

$armasInsertadas=[];
for($n=0;$n<$cantidadCInsertadas;$n++){ array_push($armasInsertadas,$arrayObjetos['armasInsertada'][$n]);}

$armasMisiles=[];
for($n=0;$n<$cantidadCMisiles;$n++){ array_push($armasMisiles,$arrayObjetos['armasMisil'][$n]);}

$armasBombas=[];
for($n=0;$n<$cantidadCBombas;$n++){ array_push($armasBombas,$arrayObjetos['armasBomba'][$n]);}




@endphp
<div class="row rounded">
    <div class="col-12 borderless">
        <div id="cuadro1" class="" style="background-color: #000000 !important;">
            <table id="tablaArmas" class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important; background: url('{{ asset('img/fotos naves/skin' . $disenio->skin . '/nave' . $disenio->id . '.png')}}') no-repeat  !important;">
                <tr>
                    <td>
                        <div class="row rounded">
                            <div class="col-12 ">
                                @if ($investNiveles["invPropQuimico"]+$investNiveles["invPropNuk"]+$investNiveles["invPropIon"]+$investNiveles["invPropPlasma"]+$investNiveles["invPropMa"]>0)
                                <div id="cuadro1" class=" cajita">
                                    <table class=" table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                        <tr>
                                            <td colspan="7">
                                                <div class=" text-light" id="motorestxt"> x{{$multiplicadorMotores}} Motores, &nbsp;&nbsp;&nbsp; Energía:  <span class="text-success" id ="energiamotor"></span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if ($investNiveles["invPropQuimico"]>0)
                                            <td>
                                                <img onClick="encajar('motor',59,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",59)->first()->nombre}}" src="{{ asset('img/fotos armas/arma59.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invPropIon"]>0)
                                            <td>
                                                <img onClick="encajar('motor',61,'aniade')"  class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",61)->first()->nombre}}" src="{{ asset('img/fotos armas/arma61.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invPropNuk"]>0)
                                            <td>
                                                <img onClick="encajar('motor',60,'aniade')"  class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",60)->first()->nombre}}" src="{{ asset('img/fotos armas/arma60.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invPropPlasma"]>0)
                                            <td>
                                                <img onClick="encajar('motor',62,'aniade')"  class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",62)->first()->nombre}}" src="{{ asset('img/fotos armas/arma62.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invPropMa"]>0)
                                            <td>
                                                <img onClick="encajar('motor',63,'aniade')"  class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",63)->first()->nombre}}" src="{{ asset('img/fotos armas/arma63.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if ($investNiveles["invPropQuimico"]+$investNiveles["invPropNuk"]+$investNiveles["invPropIon"]+$investNiveles["invPropPlasma"]+$investNiveles["invPropMa"]>0)
                                            @for ($i = 0 ; $i <7; $i++)
                                            <td>
                                                @if ($i<$cantidadMotores)
                                                <div  style="border: 1px solid white;width:42px;"><img onClick="encajar('motor',{{$i}},'quita')" id="motor{{$i}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                            @endfor
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td colspan="4">
                                    <div class=" text-light" id="">&nbsp;</div>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </td>
                    <td id="botonesCabeza" rowspan="5">
                        <button type="button" class="btn btn-primary col-12 btn-sm" onclick="changeSkin('{{$disenio->id}}')">
                        <i class="fa fa-arrows-alt-h" id="imagen{{$disenio->id}}" data-skin="1"> Cambiar aspecto</i>
                        </button>
                        <button id="botonlimpiar" type="button" class="btn btn-primary col-12 btn-sm" onclick="limpiar()">
                        <i class="fa fa-recycle" data-skin="1" id="botonlimpiartxt"> Limpiar diseño</i>
                        </button>
                    </td>
                    <td colspan="2">
                        @if ($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0)
                        @if ($investNiveles["invMa"]+$investNiveles["invEnergia"]+$investNiveles["invPlasma"]+$investNiveles["invBalistica"]>0)
                        <div class=" text-light" id="motorestxt" style="margin-bottom: 10px;">Armas, &nbsp;&nbsp;&nbsp;Energía: <span class="text-danger"  id ="energiaarma"></span></div>
                        <nav style="margin-top: 17px;">
                            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                                @if ($investNiveles["invEnergia"]>0)
                                <a class="nav-item nav-link active" id="energia-tab" data-bs-toggle="tab" href="#energia" role="tab" aria-controls="energia" aria-selected="true" >
                                Energía
                                </a>
                                @endif
                                @if ($investNiveles["invPlasma"]>0)
                                <a class="nav-item nav-link " id="plasma-tab" data-bs-toggle="tab" href="#plasma" role="tab" aria-controls="plasma" aria-selected="false">
                                Plasma
                                </a>
                                @endif
                                @if ($investNiveles["invBalistica"]>0)
                                <a class="nav-item nav-link" id="balistica-tab" data-bs-toggle="tab" href="#balistica" role="tab" aria-controls="balistica" aria-selected="false" >
                                Balística
                                </a>
                                @endif
                                @if ($investNiveles["invMa"]>0)
                                <a class="nav-item nav-link" id="max-tab" data-bs-toggle="tab" href="#max" role="tab" aria-controls="max" aria-selected="false" >
                                M-A
                                </a>
                                @endif
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                <div class="row rounded ">
                                    <div class="col-12 ">
                                        @if ($investNiveles["invEnergia"]>0)
                                        <div id="cuadro1" class=" cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    @if ($cantidadCLigeras>0)
                                                    <td>
                                                        <img onClick="encajar('armasLigera',11,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión ligero" src="{{ asset('img/fotos armas/arma11.jpg') }}" width="45" height="45" >
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMedias>0)
                                                    <td>
                                                        <img onClick="encajar('armasMedia',12,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión medio" src="{{ asset('img/fotos armas/arma12.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCPesadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasPesada',13,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión pesado" src="{{ asset('img/fotos armas/arma13.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCInsertadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasInsertada',14,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión insertado" src="{{ asset('img/fotos armas/arma14.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMisiles>0)
                                                    <td>
                                                        <img onClick="encajar('armasMisil',15,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma15.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCBombas>0)
                                                    <td>
                                                        <img onClick="encajar('armasBomba',16,'aniade')" class="rounded invesEnergia armasI" data-bs-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma16.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="plasma" role="tabpanel" aria-labelledby="plasma-tab">
                                <div class="row rounded ">
                                    <div class="col-12 ">
                                        @if ($investNiveles["invPlasma"]>0)
                                        <div id="cuadro1" class=" cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    @if ($cantidadCLigeras>0)
                                                    <td>
                                                        <img onClick="encajar('armasLigera',21,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión ligero" src="{{ asset('img/fotos armas/arma21.jpg') }}" width="45" height="45" >
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMedias>0)
                                                    <td>
                                                        <img onClick="encajar('armasMedia',22,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión medio" src="{{ asset('img/fotos armas/arma22.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCPesadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasPesada',23,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión pesado" src="{{ asset('img/fotos armas/arma23.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCInsertadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasInsertada',24,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión insertado" src="{{ asset('img/fotos armas/arma24.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMisiles>0)
                                                    <td>
                                                        <img onClick="encajar('armasMisil',25,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma25.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCBombas>0)
                                                    <td>
                                                        <img onClick="encajar('armasBomba',26,'aniade')" class="rounded invesPlasma armasI" data-bs-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma26.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="balistica" role="tabpanel" aria-labelledby="balistica-tab">
                                <div class="row rounded ">
                                    <div class="col-12 ">
                                        @if ($investNiveles["invBalistica"]>0)
                                        <div id="cuadro1" class=" cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    @if ($cantidadCLigeras>0)
                                                    <td>
                                                        <img onClick="encajar('armasLigera',31,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión ligero" src="{{ asset('img/fotos armas/arma31.jpg') }}" width="45" height="45" >
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMedias>0)
                                                    <td>
                                                        <img onClick="encajar('armasMedia',32,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión medio" src="{{ asset('img/fotos armas/arma32.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCPesadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasPesada',33,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión pesado" src="{{ asset('img/fotos armas/arma33.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCInsertadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasInsertada',34,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Canión insertado" src="{{ asset('img/fotos armas/arma34.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMisiles>0)
                                                    <td>
                                                        <img onClick="encajar('armasMisil',35,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma35.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCBombas>0)
                                                    <td>
                                                        <img onClick="encajar('armasBomba',36,'aniade')" class="rounded invesBalistica armasI" data-bs-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma36.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="max" role="tabpanel" aria-labelledby="max-tab">
                                <div class="row rounded ">
                                    <div class="col-12 ">
                                        @if ($investNiveles["invMa"]>0)
                                        <div id="cuadro1" class=" cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    @if ($cantidadCLigeras>0)
                                                    <td>
                                                        <img onClick="encajar('armasLigera',41,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Canión ligero" src="{{ asset('img/fotos armas/arma41.jpg') }}" width="45" height="45" >
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMedias>0)
                                                    <td>
                                                        <img onClick="encajar('armasMedia',42,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Canión medio" src="{{ asset('img/fotos armas/arma42.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCPesadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasPesada',43,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Canión pesado" src="{{ asset('img/fotos armas/arma43.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCInsertadas>0)
                                                    <td>
                                                        <img onClick="encajar('armasInsertada',44,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Canión insertado" src="{{ asset('img/fotos armas/arma44.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCMisiles>0)
                                                    <td>
                                                        <img onClick="encajar('armasMisil',45,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma45.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                    @if ($cantidadCBombas>0)
                                                    <td>
                                                        <img onClick="encajar('armasBomba',46,'aniade')" class="rounded invesMa armasI" data-container="body" data-bs-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma46.jpg') }}" width="45" height="45">
                                                    </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row rounded">
                            <div class="col-12 " rowspan="2">
                                @if ($investNiveles["invTitanio"]>0)
                                <div id="cuadro1" class=" cajita">
                                    <table class="table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                        <tr>
                                            <td colspan="7">
                                                <div class=" text-light" id="blindajestxt">x{{$multiplicadorblindajes}} Blindajes, &nbsp;&nbsp;&nbsp;Energía: <span class="text-danger"  id ="energiablindaje"></span></div>
                                            </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if ($investNiveles["invTitanio"]>=$armas->where("codigo",65)->first()->niveltec)
                                            <td>
                                                <img onClick="encajar('blindaje',65,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",65)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma65.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invReactivo"]>=$armas->where("codigo",66)->first()->niveltec)
                                            <td>
                                                <img onClick="encajar('blindaje',66,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",66)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma66.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invResinas"]>=$armas->where("codigo",67)->first()->niveltec)
                                            <td>
                                                <img onClick="encajar('blindaje',67,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",67)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma67.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invPlacas"]>=$armas->where("codigo",68)->first()->niveltec)
                                            <td>
                                                <img onClick="encajar('blindaje',68,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",68)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma68.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @if ($investNiveles["invCarbonadio"]>=$armas->where("codigo",69)->first()->niveltec)
                                            <td>
                                                <img onClick="encajar('blindaje',69,'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",69)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma69.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                        </tr>
                                        @for ($n=0 ; $n<3; $n++)
                                        <tr>
                                            @for ($i = 0 ; $i <7; $i++)
                                            <td>
                                                @if ($i<$cantidadblindajes-($n*7))
                                                <div  style="border: 1px solid white;width:42px;"><img  onClick="encajar('blindaje',{{$i+(7*$n)}},'quita')" id="blindaje{{$i+(7*$n)}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                            @endfor
                                        </tr>
                                        @endfor
                                    </table>
                                </div>
                            </div>
                        </div>
                    </td>
                    @endif
                    <td>
                    </td>
                    <td rowspan="2" colspan="2">
                        <div class="slider" id="slider-color"></div>
                        <br/>
                        @if ($investNiveles["invEnergia"]+$investNiveles["invPlasma"]+$investNiveles["invBalistica"]+$investNiveles["invMa"]>0)
                        <table>
                            <tr >
                                @if ($disenio->cualidades->armasLigeras>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCLigeras)
                                    <div id="armasLigeras{{$i-1}}" style="border: 1px solid white;"><img onClick="encajar('armasLigera',{{$i-1}},'quita')" id="armasLigera{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasLigeras"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasLigeras"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCLigeras}}   Cañones Ligeros <br>(energía=<span id="energiaarmasLigera"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasLigeras'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasLigeras'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                            <tr >
                                @if ($disenio->cualidades->armasMedias>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCMedias)
                                    <div id="armasMedias"+i style="border: 1px solid white;"><img onClick="encajar('armasMedia',{{$i-1}},'quita')" id="armasMedia{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasMedias"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasMedias"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCMedias}}   Cañones Medios <br>(energía=<span id="energiaarmasMedia"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasMedias'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasMedias'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                            <tr >
                                @if ($disenio->cualidades->armasPesadas>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCPesadas)
                                    <div id="armasPesadas"+i style="border: 1px solid white;"><img onClick="encajar('armasPesada',{{$i-1}},'quita')" id="armasPesada{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasPesadas"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasPesadas"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCPesadas}}   Cañones Pesados<br>(energía=<span id="energiaarmasPesada"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasPesadas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasPesadas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                            <tr >
                                @if ($disenio->cualidades->armasInsertadas>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCInsertadas)
                                    <div id="armasInsertadas"+i style="border: 1px solid white;"><img onClick="encajar('armasInsertada',{{$i-1}},'quita')" id="armasInsertada{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasInsertadas"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasInsertadas"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCInsertadas}}   Cañones insertados<br>(energía=<span id="energiaarmasInsertada"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasInsertadas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasInsertadas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                            <tr >
                                @if ($disenio->cualidades->armasMisiles>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCMisiles)
                                    <div id="armasMisiles"+i style="border: 1px solid white;"><img onClick="encajar('armasMisil',{{$i-1}},'quita')" id="armasMisil{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasMisiles"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasMisiles"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCMisiles}}   Misiles<br>(energía=<span id="energiaarmasMisil"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasMisiles'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasMisiles'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                            <tr >
                                @if ($disenio->cualidades->armasBombas>0)
                                @for ($i = 6 ; $i >0; $i--)
                                <td>
                                    @if ($i<=$cantidadCBombas)
                                    <div id="armasBombas"+i style="border: 1px solid white;"><img onClick="encajar('armasBomba',{{$i-1}},'quita')" id="armasBomba{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    @endif
                                </td>
                                @endfor
                                <td colspan="2" class="text-light align-middle ">
                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                    <div class="slider" id="alcanceArmasBombas"></div>
                                </td>
                                <td colspan="2" class="text-light align-middle">
                                    dispersión
                                    <div class="slider" id="dispersionArmasBombas"></div>
                                </td>
                                <td class="text-warning align-middle">
                                    x{{$multiplicadorCBombas}}   Bombas<br>(energía=<span id="energiaarmasBomba"></span>)
                                </td>
                                <script>
                                    noUiSlider.create(document.getElementById('alcanceArmasBombas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                    noUiSlider.create(document.getElementById('dispersionArmasBombas'), {
                                        start: 0,
                                        step: 1,
                                        range: {
                                            'min': -7,
                                            'max': 7
                                        }
                                    });
                                </script>
                                @endif
                            </tr>
                        </table>
                        @endif
                        @if ($cantidadCargaPequenia+$cantidadCargaMedia+$cantidadCargaGrande>0 && $investNiveles["invCarga"]>0)
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                <div class="row rounded ">
                                    <div class="col-12 ">
                                        <div id="cuadro1" class=" cajita">
                                            <div class=" text-light" id="cargatxt">Carga, &nbsp;&nbsp;&nbsp;Energía: <span class="text-danger"  id ="energiacarga"></span></div>
                                            <table class=" table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    @for($codigo=90;$codigo<104;$codigo++)
                                                        @if ($cantidadCargaPequenia>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaPequenia")
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invCarga" && $investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                                <td>
                                                                    <img style="border: 1px solid white;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invHangar" && $investNiveles["invHangar"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid white;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invRecoleccion" && $investNiveles["invRecoleccion"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid white;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                        @endif
                                                        @if ($cantidadCargaMedia>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaMediana")
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invCarga" && $investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid yellow;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invHangar" && $investNiveles["invHangar"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid yellow;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invRecoleccion" && $investNiveles["invRecoleccion"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid yellow;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                        @endif
                                                        @if ($cantidadCargaGrande>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaGrande")
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invCarga" && $investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid green;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invHangar" && $investNiveles["invHangar"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid green;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invRecoleccion" && $investNiveles["invRecoleccion"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid green;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                        @endif
                                                        @if ($cantidadCargaEnorme>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaEnorme")
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invCarga" && $investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid cyan;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invHangar" && $investNiveles["invHangar"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid cyan;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invRecoleccion" && $investNiveles["invRecoleccion"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid cyan;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                        @endif
                                                        @if ($cantidadCargaMega>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaMega")
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invCarga" && $investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid brown;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invHangar" && $investNiveles["invHangar"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid brown;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                            @if ($armas->where("codigo",$codigo)->first()->clase=="invRecoleccion" && $investNiveles["invRecoleccion"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img style="border: 1px solid brown;" onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'aniade')"class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                            @endif
                                                        @endif
                                                    @endfor
                                                </tr>
                                                <tr>

                                                        <tr >
                                                            @if ($disenio->cualidades->cargaPequenia>0)
                                                            @for ($i = $filasCarga ; $i >0; $i--)

                                                            <td>
                                                                @if ($i<=$cantidadCargaPequenia)
                                                                <div  style="border: 1px solid white;width: 42px;"><img onClick="encajar('cargaPequenia',{{$i-1}},'quita')" id="cargaPequenia{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>

                                                            @endfor
                                                            <td class="text-warning align-middle"  colspan="3"  >
                                                                x{{$multiplicadorCargaPequenia}}   Carga pequeña
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr >
                                                            @if ($disenio->cualidades->cargaMedia>0)
                                                            @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaMedia)
                                                                <div  style="border: 1px solid yellow;width: 42px;"><img onClick="encajar('cargaMediana',{{$i-1}},'quita')" id="cargaMediana{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                            @endfor
                                                            <td class="text-warning align-middle" colspan="3"  >
                                                                x{{$multiplicadorCargaMedia}}   Carga ligera
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr >
                                                            @if ($disenio->cualidades->cargaGrande>0)
                                                            @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaGrande)
                                                                <div style="border: 1px solid green;width: 42px;"><img onClick="encajar('cargaGrande',{{$i-1}},'quita')" id="cargaGrande{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                            @endfor
                                                            <td class="text-warning align-middle" colspan="3"  >
                                                                x{{$multiplicadorCargaGrande}}   Carga media
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr >
                                                            @if ($disenio->cualidades->cargaEnorme>0)
                                                            @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaEnorme)
                                                                <div style="border: 1px solid cyan;width: 42px;"><img onClick="encajar('cargaEnorme',{{$i-1}},'quita')" id="cargaEnorme{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                            @endfor
                                                            <td class="text-warning align-middle" colspan="3"  >
                                                                x{{$multiplicadorCargaEnorme}}   Carga pesada
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr >
                                                            @if ($disenio->cualidades->cargaMega>0)
                                                            @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaMega)
                                                                <div style="border: 1px brown white;width: 42px;"><img onClick="encajar('cargaMega',{{$i-1}},'quita')" id="cargaMega{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                            @endfor
                                                            <td class="text-warning align-middle" colspan="3"  >
                                                                x{{$multiplicadorCargaMega}}   Carga estación
                                                            </td>
                                                            @endif
                                                        </tr>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="row rounded">
                            <div class="col-12 ">
                                @if ($investNiveles["invIa"]>0)
                                <div id="cuadro1" class=" cajita" style="max-width: 800px">
                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                        <tr>
                                            <td colspan="8">
                                                <div class=" text-light" id="mejorastxt">x{{$multiplicadormejoras}} Mejoras, &nbsp;&nbsp;&nbsp;Energía: <span class="text-danger"  id ="energiamejora"></span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            @for($codigo=70;$codigo<85;$codigo++)
                                            @if ($investNiveles["invIa"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                            <td id="mejora{{$codigo}}" name="mejora{{$codigo}}">
                                                <img onClick="encajar('mejora',{{$codigo}},'aniade')" class="rounded" data-bs-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}" src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                            </td>
                                            @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td colspan="2" rowspan="2">
                                                @if ($investNiveles["invIa"]>0)
                                                <table>
                                                    @for ($n=0 ; $n<5; $n++)
                                                    <tr>
                                                        @for ($i = 0 ; $i <14; $i++)
                                                        <td>
                                                            @if ($i<$cantidadMejoras-($n*14))
                                                            <div  style="border: 1px solid white;"><img  onClick="encajar('mejora',{{$i+(14*$n)}},'quita')" id="mejora{{$i+(14*$n)}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                            @endif
                                                        </td>
                                                        @endfor
                                                    </tr>
                                                    @endfor
                                                </table>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </td>

                </tr>
            </table>
        </div>
    </div>
</div>



    <div class="modal hide"></div>




<script>


var motores={!!json_encode($motores)!!};
var blindajes={!!json_encode($blindajes)!!};
var mejoras={!!json_encode($mejoras)!!};
var cargaPequenias={!!json_encode($cargaPequenias)!!};
var cargaMedianas={!!json_encode($cargaMedianas)!!};
var cargaGrandes={!!json_encode($cargaGrandes)!!};
var cargaEnormes={!!json_encode($cargaEnorme)!!};
var cargaMegas={!!json_encode($cargaMega)!!};

var armasLigeras={!!json_encode($armasLigeras)!!};
var armasMedias={!!json_encode($armasMedias)!!};
var armasPesadas={!!json_encode($armasPesadas)!!};
var armasInsertadas={!!json_encode($armasInsertadas)!!};
var armasMisiles={!!json_encode($armasMisiles)!!};
var armasBombas={!!json_encode($armasBombas)!!};
var armasTengo={!!json_encode($arrayArmasTengo)!!};

var armasAlcance ={!!json_encode($arrayAlcance)!!};
var armasDispersion ={!!json_encode($arrayDispersion)!!};
var energiaArmas={!!json_encode($arrayEnergiaArmas)!!};
var esteDisenio={!!json_encode($esteDisenio)!!};
var tamanoEstaNave={!!json_encode($disenio->tamanio)!!};

var investigadasArmas={{$investNiveles["invEnergia"]+$investNiveles["invPlasma"]+$investNiveles["invBalistica"]}};
var investigadasMotores={{$investNiveles["invPropQuimico"]+$investNiveles["invPropNuk"]+$investNiveles["invPropIon"]+$investNiveles["invPropPlasma"]+$investNiveles["invPropMa"]}};

if (investigadasMotores<1){
    $("#botonlimpiartxt").text("Se requieren investigaciones para diseñar");
    $("#botonlimpiar")
                .removeClass("btn-primary")
                .addClass("btn-warning");
    $("#crearDisenio").prop("disabled", true);
}

    var armas={
        motor:motores,
        blindaje:blindajes,
        mejora:mejoras,
        cargaPequenia:cargaPequenias,
        cargaMediana:cargaMedianas,
        cargaGrande:cargaGrandes,
        cargaEnorme:cargaEnormes,
        cargaMega:cargaMegas,

        armasLigera:armasLigeras,
        armasMedia:armasMedias,
        armasPesada:armasPesadas,
        armasInsertada:armasInsertadas,
        armasMisil:armasMisiles,
        armasBomba:armasBombas,
    }

    var elementosEncajar=['motor','blindaje','mejora','armasLigera','armasMedia','armasPesada','armasInsertada','armasMisil','armasBomba','cargaPequenia','cargaMediana','cargaGrande','cargaEnorme','cargaMega'];

function limpiar(){

    $.each( armas, function( key, elemento ) {
        n=0;
        $.each(elemento, function(key2,e) {
            img = "../../../img/fotos armas/vacio.png" ;
            $('#'+ key + n).attr("src", img);
            armas[key][key2]=0;
            n++;
        });
    });


    calculoTotalR();
}

// pasar armas a huecos
//Array [ 72, 81 ]   armas['mejora'].includes(72)

    function encajar(elemento,id,qhago){
        if (qhago=='aniade'){
            if (!armas['mejora'].includes(id)){//una mejora igual
                for (n=0;n<armas[elemento].length;n++) {
                    if (armas[elemento][n]==0){ armas[elemento][n]=id; break;  }
                };
            }

        } else if (qhago=='quita'){
            armas[elemento][id]=0;
        }

        n=0;
        armas[elemento].forEach(function(e) {
            if (e==0){
                img = "../../../img/fotos armas/vacio.png";
            } else {
                img = "../../../img/fotos armas/arma" + e + ".jpg" ;
            }
            $('#'+ elemento + n).attr("src", img);
            n++;
        });

        MejorasVisibles();
        calculoTotalR();
    }

    function MejorasVisibles(){
        for (n=70;n<91;n++)
        {
            $("#mejora"+n).show();
        };

        armas['mejora'].forEach(function(e) {
            if (e>69){
                $("#mejora"+e).hide();
            }

        });

    }




    function encajarTodo(){

        elementosEncajar.forEach(function(elemento) {
            n=0;
            armas[elemento].forEach(function(e) {
                if (e==0){
                    img = "../../../img/fotos armas/vacio.png";
                } else {
                    img = "../../../img/fotos armas/arma" + e + ".jpg" ;
                }
                $('#'+ elemento + n).attr("src", img);
                n++;
            });
        });

        MejorasVisibles();
        calculoTotalR();
    }


        /// barra de investigaciones-armas

        // data-bs-toggle="tooltip" data-placement="top" title=""

@if ($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0)
        // creando el slider
        var slider = document.getElementById('slider-color');

        noUiSlider.create(slider, {
                start: {!!json_encode($arrayStart)!!},
                connect: {!!json_encode($arrayConnect)!!},

            range: {
                'min': [  0 ],
                'max': [ 100 ]
            }
        });

            var classes = {!!json_encode($arrayCss)!!};

            for ( var i = 1; i < classes.length+1; i++ ) {
                $("div.noUi-connect:nth-child("+i+")").addClass(classes[i-1]);
            }

//tooltip de slider

        var arrayTooltip={!!json_encode($arrayTooltip)!!};
        var repartoInicial=100/arrayTooltip.length;
        var repartoarray=new Array();
        var a=1;
        arrayTooltip.forEach(function(n){
            repartoarray[a-1]=repartoInicial*a;
                a++;
                if(a==2){
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("data-bs-toggle","tooltip");
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("data-placement","auto");
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("title",n);
                } else {
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("data-bs-toggle","tooltip");
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("data-placement","auto");
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("title",n);
                }

            })
            slider.noUiSlider.set(repartoarray); //reparte a partes iguales las barras
@endif




    //////////// superformula de calculo total ///

var armasL={!!json_encode($armas)!!};
var cualidadesFuselaje={!!json_encode($disenio->cualidades)!!};
var costesFuselaje={!!json_encode($disenio->costes)!!};
var constantesI={!!json_encode($constantesI)!!};
var constantesF={!!json_encode($constantesF)!!};
var investigaciones={!!json_encode($investigaciones)!!};
var tnave= {!!json_encode($disenio->tnave)!!};


var costesDisenio={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    masa:0,
};

var cualidades={
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    ataque:0,
    defensa:0,
    velocidad:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};

var multiplicadorMotores={{$multiplicadorMotores}};
var multiplicadorBlindajes={{$multiplicadorblindajes}};
var multiplicadorMejoras={{$multiplicadormejoras}};
var multiplicadorCLigeras={{$multiplicadorCLigeras}};
var multiplicadorCMedias={{$multiplicadorCMedias}};
var multiplicadorCPesadas={{$multiplicadorCPesadas}};
var multiplicadorCInsertadas={{$multiplicadorCInsertadas}};
var multiplicadorCMisiles={{$multiplicadorCMisiles}};
var multiplicadorCBombas={{$multiplicadorCBombas}};
var multiplicadorCargaPequenia={{$multiplicadorCargaPequenia}};
var multiplicadorCargaMedia={{$multiplicadorCargaMedia}};
var multiplicadorCargaGrande={{$multiplicadorCargaGrande}};
var multiplicadorCargaEnorme={{$multiplicadorCargaEnorme}};
var multiplicadorCargaMega={{$multiplicadorCargaMega}};



// posicion del danio segun el arma

var danoPosicion={
    'armasLigera':[0,1],
    'armasMedia':[1,2],
    'armasPesada':[2,3],
    'armasInsertada':[3,4],
    'armasMisil':[3,5],
    'armasBomba':[4,5]
}

var tiposArmas=[
    'armasLigera',
    'armasMedia',
    'armasPesada',
    'armasInsertada',
    'armasMisil',
    'armasBomba'
    ];

 energiaArmas={
    'armasLigera':0,
    'armasMedia':0,
    'armasPesada':0,
    'armasInsertada':0,
    'armasMisil':0,
    'armasBomba':0
};

var multiplicadorArmas={
    'armasLigera':multiplicadorCLigeras,
    'armasMedia':multiplicadorCMedias,
    'armasPesada':multiplicadorCPesadas,
    'armasInsertada':multiplicadorCInsertadas,
    'armasMisil':multiplicadorCMisiles,
    'armasBomba':multiplicadorCBombas
};

// efectos de politicas
var factorConstantesMantenimiento=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveMantenimientoTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveMantenimiento'+tamanoEstaNave;})[0].valor;
var factorConstantesCombustible=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveCombustibleTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveCombustible'+tamanoEstaNave;})[0].valor;
var factorConstantesEnergia=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveEnergiaTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveEnergia'+tamanoEstaNave;})[0].valor;
var factorConstantesDefensa=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveDefensaTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveDefensa'+tamanoEstaNave;})[0].valor;
var factorConstantesRecursos=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveRecursosTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveRecursos'+tamanoEstaNave;})[0].valor;
var factorConstantesTiempo=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveConstruccionTiempoTodas';})[0].valor * $.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveConstruccionTiempo'+tamanoEstaNave;})[0].valor;


//var nivelIa=$.grep(investigaciones, function(nivelInv){return nivelInv.codigo == 'invIa'})[0]['nivel']; //para mejoras

function calculoTotalR(){

    // valores a 0 de la tabla de danio, de cada investigacion
danoinvEnergia=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
danoinvPlasma=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
danoinvBalistica=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
danoinvMa=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
danoTotal={
'invEnergia':danoinvEnergia,
'invPlasma':danoinvPlasma,
'invBalistica':danoinvBalistica,
'invMa':danoinvMa
};

cantiFocos=[0,0,0,0,0]; //cada fila
danoFocos=[1,1,1,1,1]; //cada fila
empujeT=0;
ctrlPunteria=0;
ariete=0;
maniobraT=0;

costesArmas= {!!json_encode($costesArmas)!!};

costesDisenio={
    mineral:costesFuselaje['mineral'],
    cristal:costesFuselaje['cristal'],
    gas:costesFuselaje['gas'],
    plastico:costesFuselaje['plastico'],
    ceramica:costesFuselaje['ceramica'],
    liquido:costesFuselaje['liquido'],
    micros:costesFuselaje['micros'],
    personal:costesFuselaje['personal'],
    masa:{{$disenio->cualidades->masa}},
};

cualidades={
    fuel:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    ataque:0,
    defensa:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};


costesMisMotores={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    fuel:0,
    ma:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    defensa:0,
    ataque:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};


costesMisMejoras={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    fuel:0,
    ma:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    defensa:0,
    ataque:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};

costesMisCargas={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    fuel:0,
    ma:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    defensa:0,
    ataque:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};


costesMisArmas={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    fuel:0,
    ma:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    defensa:0,
    ataque:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};
costesMisBlindajes={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
    fuel:0,
    ma:0,
    municion:0,
    masa:0,
    energia:0,
    tiempo:0,
    mantenimiento:0,
    defensa:0,
    ataque:0,
    velocidad:0,
    maniobra:0,
    carga:0,
    cargaPequenia:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
    extractor:0,
    recolector:0,
};
ataques={
    ligera:0,
    media:0,
    pesada:0,
    estacion:0,
    defensa:0,
};


// añado energia
elemento='motor';
genera='energia';
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};

    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0];  // busca costes este objeto entre las armas
        var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
        var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        sumaCostos(costesMisMotores,multiplicadorMotores,costeobj);// sumo recursos basicos
        var cte=1+(miConstanteI*nivelInv); //lo que varia por nivel de tecno  //la aenergia no sube con nivel de motores
        var factorFuselaje=cualidadesFuselaje[genera];     // el factor que varia para cada fuselaje
        costesVacio[genera]=costeobj[genera]*1*factorFuselaje; //lo q mejora por esos niveles
        costesVacio['tiempo']=costeobj['tiempo']*factorFuselaje;
        costesVacio['mantenimiento']=costeobj['mantenimiento']*factorFuselaje;
        costesVacio['fuel']=costeobj['fuel']*factorFuselaje;
        sumaCualidades(costesMisMotores,multiplicadorMotores,costesVacio);
        empujeT = empujeT + costeobj['velocidad']*multiplicadorMotores*cualidadesFuselaje['velocidad']*cte; //el empuje del motor por la cantidad por el factor de fuselaje
        maniobraT = maniobraT + costeobj['maniobra']*multiplicadorMotores*cualidadesFuselaje['maniobra']*cte; //el empuje del motor por la cantidad por el factor de fuselaje
    }
});
valueF=formatNumber (Math.round (costesMisMotores['energia']));
$("#energia"+elemento).text(valueF);


elemento='blindaje';
genera='defensa';
multiplicador=multiplicadorBlindajes;
misCostes=costesMisBlindajes;
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};

    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas
        var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
        var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        sumaCostos(misCostes,multiplicador,costeobj);// sumo recursos basicos
        var cte=1+(miConstanteI*nivelInv);//lo que varia por nivel de tecno
        var factorFuselaje=cualidadesFuselaje[genera];     // el factor que varia para cada fuselaje
        costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
        costesVacio['tiempo']=costeobj['tiempo']*factorFuselaje;
        costesVacio['mantenimiento']=costeobj['mantenimiento']*factorFuselaje;
        costesVacio['energia']=costeobj['energia']*factorFuselaje;
        sumaCualidades(misCostes,multiplicador,costesVacio);
    }
});

valueF=formatNumber (Math.round (costesMisBlindajes['energia']));
$("#energia"+elemento).text(valueF);

//// bucle de cargas
for (x=1;x<6;x++){
    genera='carga';
    misCostes=costesMisCargas;

    switch(x){
        case 1:
            elemento='cargaPequenia';
            multiplicador=multiplicadorCargaPequenia;
            factorFuselaje=1;
        break;
        case 2:
            elemento='cargaMediana';
            multiplicador=multiplicadorCargaMedia;
            factorFuselaje=1;
        break;
        case 3:
            elemento='cargaGrande';
            multiplicador=multiplicadorCargaGrande;
            factorFuselaje=1;
        break;
        case 4:
            elemento='cargaEnorme';
            multiplicador=multiplicadorCargaEnorme;
            factorFuselaje=1;
        break;
        case 5:
            elemento='cargaMega';
            multiplicador=multiplicadorCargaMega;
            factorFuselaje=1;
        break;
        default:
            multiplicador=0;
    };
    genera2=elemento;

    if (multiplicador>0){  //realmente hay de esto
        $.each( armas[elemento], function( key, e ) {
            costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};

            if (e>0){
                var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
                var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas
                var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
                var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
                sumaCostos(misCostes,multiplicador,costeobj);// sumo recursos basicos
                var cte=1+(miConstanteI*nivelInv); //lo que varia por nivel de tecno
                costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
                costesVacio['tiempo']=costeobj['tiempo']*factorFuselaje;
                costesVacio['mantenimiento']=costeobj['mantenimiento']*factorFuselaje;
                costesVacio['energia']=costeobj['energia']*factorFuselaje;
                costesVacio['recolector']=costeobj['recolector']*factorFuselaje;
                costesVacio['extractor']=costeobj['extractor']*factorFuselaje;
                if (genera2!=""){costesVacio[genera2]=costeobj[genera2]*cte;} //hangares
                sumaCualidades(misCostes,multiplicador,costesVacio);
            }
        });
    }
};

valueF=formatNumber (Math.round (costesMisCargas['energia']));
$("#energiacarga").text(valueF);


///// mejoras
elemento='mejora';
genera='ia';
multiplicador=1;
misCostes=costesMisMejoras;
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};
    sobreCostes={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};

    hazlo=0;
    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas

        switch (1 * obj['codigo']){

        case 72: //escudos
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisBlindajes);
            sumaCostos(sobreCostes,cte,costesMisMejoras);

            sumaCualidades(sobreCostes,cte,costesMisBlindajes);
            sumaCualidades(sobreCostes,cte,costesMisMejoras);
        break;
        case 75: //prop hyper
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisMotores);
            sumaCualidades(sobreCostes,cte,costesMisMotores);
        break;
        case 77: //standart
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisMotores);
            sumaCostos(sobreCostes,cte,costesMisBlindajes);
            sumaCostos(sobreCostes,cte,costesMisArmas);
            sumaCostos(sobreCostes,cte,costesMisCargas);
            sumaCostos(sobreCostes,cte,costesMisMejoras);

            sumaCualidades(sobreCostes,cte,costesMisMotores);
            sumaCualidades(sobreCostes,cte,costesMisBlindajes);
            sumaCualidades(sobreCostes,cte,costesMisArmas);
            sumaCualidades(sobreCostes,cte,costesMisCargas);
            sumaCualidades(sobreCostes,cte,costesMisMejoras);
        break;
        case 76: //aleaciones
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisMotores);
            sumaCostos(sobreCostes,cte,costesMisBlindajes);
            sumaCostos(sobreCostes,cte,costesMisArmas);
            sumaCostos(sobreCostes,cte,costesMisCargas);
            sumaCostos(sobreCostes,cte,costesMisMejoras);

            sumaCualidades(sobreCostes,cte,costesMisMotores);
            sumaCualidades(sobreCostes,cte,costesMisBlindajes);
            sumaCualidades(sobreCostes,cte,costesMisArmas);
            sumaCualidades(sobreCostes,cte,costesMisCargas);
            sumaCualidades(sobreCostes,cte,costesMisMejoras);
        break;
        case 70: //compactador
        case 78: //plegado
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisCargas);
            sumaCualidades(sobreCostes,cte,costesMisCargas);
        break;
        case 73: //prop maniobra
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisMotores);
            sumaCualidades(sobreCostes,cte,costesMisMotores);
        break;
        case 74: //nanos
        hazlo++;
        cte=1;
            sumaCostos(sobreCostes,cte,costesMisMotores);
            sumaCostos(sobreCostes,cte,costesMisBlindajes);
            sumaCostos(sobreCostes,cte,costesMisArmas);
            sumaCostos(sobreCostes,cte,costesMisCargas);
            sumaCostos(sobreCostes,cte,costesMisMejoras);

            sumaCualidades(sobreCostes,cte,costesMisMotores);
            sumaCualidades(sobreCostes,cte,costesMisBlindajes);
            sumaCualidades(sobreCostes,cte,costesMisArmas);
            sumaCualidades(sobreCostes,cte,costesMisCargas);
            sumaCualidades(sobreCostes,cte,costesMisMejoras);
        break;
        case 71: //ctrol punteria
            ctrlPunteria++;
        break;
        case 79: //ariete
            ariete++;
        break;
        case 80:    // foco-caza
            cantiFocos[0]+=1;
        break;
        case 81:    // foco-ligera
            cantiFocos[1]+=1;
        break;
        case 82:    //foco-media
            cantiFocos[2]+=1;
        break;
        case 83:    // foco pesada
            cantiFocos[3]+=1;
        break;
        case 84:    // foco bombas
            cantiFocos[4]+=1;
        break;
        //hazlo++;
        //cte=1;
          //  sumaCostos(sobreCostes,cte,costesMisArmas);
          // sumaCualidades(sobreCostes,cte,costesMisArmas);
        break;



        }

        if (hazlo>0){
            var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas
            var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
            var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        // sumaCostos(misCostes,multiplicador,costeobj);// sumo recursos basicos
            var cte=1+(miConstanteI*nivelInv);//lo que varia por nivel de tecno
            var factorFuselaje=1;     // el factor que varia para cada fuselaje
            costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
           // costesVacio['tiempo']=costeobj[genera]*factorFuselaje;
           // costesVacio['mantenimiento']=costeobj[genera]*factorFuselaje;
            //sumaCualidades(misCostes,multiplicador,costesVacio);
            sumaCostosMejoras(costesDisenio,multiplicador,costeobj,sobreCostes);
            sumaCualidadesMejoras(cualidades,multiplicador,costeobj,sobreCostes);
        }
    }
});


valueF=formatNumber (Math.round (cualidades['energia']));
$("#energiamejora").text(valueF);
cteAriete=1;
costoFocoA=1; //coste acumulado foco

@if($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0)
//// armas ///////

energiaT=costesMisMotores['energia']+costesMisBlindajes['energia']+costesMisCargas['energia']+cualidades['energia']; // energia para armas total

misCostes=costesMisArmas;  //arrayArmasTengo['cantidadCPesadas']
armasTengoT=armasTengo['cantidadCLigeras']+armasTengo['cantidadCMedias']+armasTengo['cantidadCPesadas']+armasTengo['cantidadCInsertadas']+armasTengo['cantidadCMisiles']+armasTengo['cantidadCBombas'];

energiaArmas={
    'armasLigera':0,
    'armasMedia':0,
    'armasPesada':0,
    'armasInsertada':0,
    'armasMisil':0,
    'armasBomba':0
};

n=0;
    porcentAcum=0;
if(investigadasArmas>0){  // tengo investigadas armas
    if (armasTengo['cantidadCLigeras']==0){energialigera=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasLigera']=slider.noUiSlider.get()/100; // un solo slider no tiene array de datos
        } else {
            energiaArmas['armasLigera']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        porcentAcum=energiaArmas['armasLigera'];
        armasAlcance['armasLigera']=alcanceArmasLigeras.noUiSlider.get();
        armasDispersion['armasLigera']=dispersionArmasLigeras.noUiSlider.get();
    }
    if (armasTengo['cantidadCMedias']==0){energiamedia=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasMedia']=slider.noUiSlider.get()/100;
        } else {
            energiaArmas['armasMedia']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        energiaArmas['armasMedia']-=porcentAcum;
        porcentAcum=energiaArmas['armasLigera']+energiaArmas['armasMedia'];
        armasAlcance['armasMedia']=alcanceArmasMedias.noUiSlider.get();
        armasDispersion['armasMedia']=dispersionArmasMedias.noUiSlider.get();
    }
    if (armasTengo['cantidadCPesadas']==0){energiapesada=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasPesada']=slider.noUiSlider.get()/100;
        } else {
            energiaArmas['armasPesada']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        energiaArmas['armasPesada']-=porcentAcum;
        porcentAcum=energiaArmas['armasLigera']+energiaArmas['armasMedia']+energiaArmas['armasPesada'];
        armasAlcance['armasPesada']=alcanceArmasPesadas.noUiSlider.get();
        armasDispersion['armasPesada']=dispersionArmasPesadas.noUiSlider.get();
    }
    if (armasTengo['cantidadCInsertadas']==0){energiainsertada=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasInsertada']=slider.noUiSlider.get()/100;
        } else {
            energiaArmas['armasInsertada']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        energiaArmas['armasInsertada']-=porcentAcum;
        porcentAcum=energiaArmas['armasLigera']+energiaArmas['armasMedia']+energiaArmas['armasPesada']+energiaArmas['armasInsertada'];
        armasAlcance['armasInsertada']=alcanceArmasInsertadas.noUiSlider.get();
        armasDispersion['armasInsertada']=dispersionArmasInsertadas.noUiSlider.get();
    }
    if (armasTengo['cantidadCMisiles']==0){energiamisil=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasMisil']=slider.noUiSlider.get()/100;
        } else {
            energiaArmas['armasMisil']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        energiaArmas['armasMisil']-=porcentAcum;
        porcentAcum=energiaArmas['armasLigera']+energiaArmas['armasMedia']+energiaArmas['armasPesada']+energiaArmas['armasInsertada']+energiaArmas['armasMisil'];
        armasAlcance['armasMisil']=alcanceArmasMisiles.noUiSlider.get();
        armasDispersion['armasMisil']=dispersionArmasMisiles.noUiSlider.get();
    }
    if (armasTengo['cantidadCBombas']==0){energiabomba=0;} else {
        if (armasTengoT==1){
            energiaArmas['armasBomba']=slider.noUiSlider.get()/100;
        } else {
            energiaArmas['armasBomba']=slider.noUiSlider.get()[n]/100;
            n++;
        }
        energiaArmas['armasBomba']-=porcentAcum;
        porcentAcum=energiaArmas['armasLigera']+energiaArmas['armasMedia']+energiaArmas['armasPesada']+energiaArmas['armasInsertada']+energiaArmas['armasMisil']+energiaArmas['armasBomba'];
        armasAlcance['armasBomba']=alcanceArmasBombas.noUiSlider.get();
        armasDispersion['armasBomba']=dispersionArmasBombas.noUiSlider.get();
    }
} else {
    EsconderPorId("slider-color");
}

$.each(tiposArmas,function(key,elemento){
            // focos
            cteFoco=1;
            costoFoco=1;
            if(cantiFocos[danoPosicion[elemento][0]]>0){
                e2=danoPosicion[elemento][0]+80;
                var obj2=$.grep(armasL, function(obj2){return obj2.codigo == e2;})[0];
                var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj2['codigo'];})[0]; // busca costes este objeto entre las armas
                var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj2['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
                var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj2['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
                cuantos=cantiFocos[danoPosicion[elemento][0]];
                cteFoco=1+(miConstanteI*nivelInv*cuantos);//lo que varia por nivel de tecno
                costoFoco=(1+(costeobj['mineral']/100) )*cuantos; //es el que se usa para todos
                danoFocos[danoPosicion[elemento][0]]=costoFoco;
                costoFocoA+=costoFoco; //acumulado

            }
    });

// sumamos la energia que gasta cada arma de su tipo
//elemento='armasLigera';
energiaUsada=0;
$.each(tiposArmas,function(key,elemento){

energiaArm=0;
danioarmasArm=0;
    $.each( armas[elemento], function( key, e ) {
        if (e>0){
            var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
            var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas
            energiaArm=(1 * energiaArm) + (1*  costeobj['energia']);
        }
    })

    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequenia:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,recolector:0, extractor:0};
    energiaXarma=1/energiaArm;

/// danio del arma por unidad de energia y costo


    hayalgo=0;
    $.each( armas[elemento], function( key, e ) {

        if (e>0){
        hayalgo=1;

            costoPunteria=1;
            ctePunteria=1;
            if (ctrlPunteria>0){
                e2=71;
                var obj2=$.grep(armasL, function(obj2){return obj2.codigo == e2;})[0];
                var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj2['codigo'];})[0]; // busca costes este objeto entre las armas
                var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj2['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
                var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj2['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
                cuantos=ctrlPunteria;
                ctePunteria=1+(miConstanteI*nivelInv*cuantos);//lo que varia por nivel de tecno
                costoPunteria=(1+(costeobj['mineral']/100) )*cuantos;
            }
            costoAriete=1;
            // cteAriete=1;
            if (ariete>0){
                e2=71;
                var obj2=$.grep(armasL, function(obj2){return obj2.codigo == e2;})[0];
                var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj2['codigo'];})[0]; // busca costes este objeto entre las armas
                var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj2['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
                var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj2['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
                cuantos=ariete;
                cteAriete=1+(miConstanteI*nivelInv*cuantos);//lo que varia por nivel de tecno
                costoAriete=(1+(costeobj['mineral']/100) )*cuantos;
            }
            var cantidadArmas=multiplicadorArmas[elemento];
            var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
            var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas
            var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
            var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
            var cte=1+(miConstanteI*nivelInv); //lo que varia por nivel de tecno
            estedano=energiaArmas[elemento]*energiaT*energiaXarma/costeobj['energia']*cantidadArmas;
            creceExpo=1+((estedano/costeobj['ataque'])*2000 );
            danioarmasArm+=Math.round(1*(cte*estedano*100000/creceExpo),0);// la tecno influye solo en el valor final del danio
            multiplicador=estedano*10*creceExpo;
            alcance=danoPosicion[elemento][1]+1*armasAlcance[elemento];
                if (alcance>7){alcance=7;};
                if (alcance<0){alcance=0;};
                variacionAlcance= Math.pow(2.5,(1*armasAlcance[elemento]));
            variacionDispersion=Math.pow(1.5,(1*armasDispersion[elemento]));

            sumaCostos(misCostes,multiplicador*variacionAlcance*variacionDispersion*costoFocoA*costoPunteria*costoAriete,costeobj);// sumo recursos basicos
            costesVacio['mantenimiento']=costeobj['mantenimiento']*variacionAlcance*variacionDispersion;
            costesVacio['masa']=costeobj['masa'];//limitamos su peso en relacion a su energia
            costesVacio['municion']=costeobj['municion']*variacionAlcance*variacionDispersion/ctePunteria;
            sumaCualidades(misCostes,multiplicador,costesVacio);

            danoTotal[obj['clase']][danoPosicion[elemento][0]][alcance]=danioarmasArm;
        }
    })

    estaEnergia=(Math.round (energiaArmas[elemento]*energiaT*hayalgo));
    energiaUsada+=estaEnergia;
    cualidades['energia']-=estaEnergia;
    valueF=formatNumber (estaEnergia);
    $("#energia"+elemento).text(valueF);

})

valueF=formatNumber (Math.round (-1*energiaUsada));
$("#energiaarma").text(valueF);

//valueF=formatNumber (Math.round (1*danioarmasLigera));
//$("#03").text(valueF);


//$("#nombre").val("energia A.Ligeras="+energialigera*energiaT);
//$("#descripcion").val("Masa Total="+pesoTotal);

@endif

//suma de todos los costes:
cte=1;
sumaCostos(costesDisenio,cte,costesMisMotores);
sumaCostos(costesDisenio,cte,costesMisBlindajes);
sumaCostos(costesDisenio,cte,costesMisArmas);
sumaCostos(costesDisenio,cte,costesMisCargas);
sumaCostos(costesDisenio,cte,costesMisMejoras);

sumaCualidades(cualidades,cte,costesMisMotores);
sumaCualidades(cualidades,cte,costesMisBlindajes);
sumaCualidades(cualidades,cte,costesMisArmas);
sumaCualidades(cualidades,cte,costesMisCargas);
sumaCualidades(cualidades,cte,costesMisMejoras);


////// velocidad  //

pesoInicial=.0005*{{$disenio->cualidades->masa}} * (costesFuselaje['mineral']*50+costesFuselaje['cristal']*260+costesFuselaje['gas']*1000+costesFuselaje['plastico']*4000+costesFuselaje['ceramica']*600+costesFuselaje['liquido']*500+costesFuselaje['micros']*2000+costesFuselaje['personal']*500);

pesoTotal=(cualidades['masa']+pesoInicial);
var velmaxTodas=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveVelocidadMaximaTodas';})[0].valor;
var velmaxEsteTamano=$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveVelocidadMaxima'+tamanoEstaNave;})[0].valor;
var factorVelocidadConstantes=Math.min($.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveVelocidadTodas';})[0].valor,$.grep(constantesF, function(obj){return obj.codigo == 'fuselajenaveVelocidad'+tamanoEstaNave;})[0].valor);


//// contando las mejoras que modifican velocidad y masa

///// mejoras
elemento='mejora';
genera='ia';
mejoraPeso=0;
mejoraManiobra=0;
mejoraVelocidad=0;

$.each( armas[elemento], function( key, e ) {
    hazlo=0;
    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.armas_codigo == obj['codigo'];})[0]; // busca costes este objeto entre las armas

        switch (1 * obj['codigo']){
            case 75: //prop hyper
            mejoraVelocidad = (1*mejoraVelocidad) + (1  * costeobj["velocidad"]/100);

            break;
            case 76: //aleaciones
            mejoraPeso =(1* mejoraPeso) + (1 * costeobj["masa"]/100);

            break;
            case 73: //prop maniobra
            mejoraManiobra =(1*mejoraManiobra) + (1 * costeobj["maniobra"]/100);

            break;
        }
    }
});

pesoTotal/=1+mejoraPeso;

cualidades['velocidad']=Math.min((Math.pow(empujeT*(1+mejoraVelocidad),1.33)/pesoTotal)*factorVelocidadConstantes,velmaxTodas,velmaxEsteTamano);
cualidades['velocidad']=( Math.round(cualidades['velocidad'])); //reondeo a 0

//////  maniobra //

cualidades['maniobra']=Math.min((Math.pow(maniobraT*(1+mejoraManiobra),1.33)/pesoTotal)*factorVelocidadConstantes,velmaxTodas,velmaxEsteTamano);
cualidades['maniobra']=( Math.round(cualidades['maniobra'])); //reondeo a 0

// efectos de politicas

cualidades['velocidad'] *= factorConstantesMantenimiento;
cualidades['Combustible'] *= factorConstantesCombustible;
cualidades['Energia'] *= factorConstantesEnergia;
cualidades['Defensa'] *= factorConstantesDefensa;
cualidades['Tiempo'] *= factorConstantesTiempo;

    costesDisenio['mineral'] *= factorConstantesRecursos;
    costesDisenio['cristal'] *= factorConstantesRecursos;
    costesDisenio['gas'] *= factorConstantesRecursos;
    costesDisenio['plastico'] *= factorConstantesRecursos;
    costesDisenio['ceramica'] *= factorConstantesRecursos;
    costesDisenio['liquido'] *= factorConstantesRecursos;
    costesDisenio['micros'] *= factorConstantesRecursos;
    costesDisenio['personal'] *= factorConstantesRecursos;


mostrarResultado();
dibujaDano();
}

function dibujaDano(){
danoTotalV=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
sumaataque=0;
arrayDispersion=[
    (1*armasDispersion['armasLigera'])+1,
    (1*armasDispersion['armasMedia'])+1,
    (1*armasDispersion['armasPesada'])+1,
    (1*armasDispersion['armasInsertada'])+1,
    (1*armasDispersion['armasMisil'])+1,
    (1*armasDispersion['armasBomba'])+1
]

for(F=0;F<5;F++){
    dispersion=.2*arrayDispersion[F];
    for(C=7;C>-1;C--){
        valueAqui=danoTotal['invEnergia'][F][C]+danoTotal['invPlasma'][F][C]+danoTotal['invBalistica'][F][C]+danoTotal['invMa'][F][C];
        if (valueAqui>0){

            danoTotalV[F][C]+=valueAqui; //*danoFocos[F];
                for(c=C-1;c>-1;c--){ //atras
                    aAriete=1;
                    if (c==0 && ariete>0){aAriete=ariete*cteAriete;}
                    danoTotalV[F][c]+=aAriete*valueAqui*(1+(dispersion*(C-c) )); //*danoFocos[F];
                    danoInf=aAriete*valueAqui*(1+(dispersion*(C-c) ))/1.25;
                    for(f=F+1;f<5;f++){ //atras abajo
                        danoTotalV[f][c]+=danoInf;
                    }
                    for(f=F-1;f>-1;f--){ //atras arriba
                        danoTotalV[f][c]+=danoInf*.01*f;
                    }
                }
                for(f=F+1;f<5;f++){ // abajo
                        danoTotalV[f][C]+=valueAqui/1.25;
                }
                for(f=F-1;f>-1;f--){ // arriba
                    danoTotalV[f][C]+=valueAqui*.01*f;
                }

        }
        if (danoTotalV[F][C]<1){danoTotalV[F][C]=0;}

    }
}

// focos
for(F=0;F<5;F++){
    for(C=7;C>-1;C--){
        danoTotalV[F][C]= Math.round (danoTotalV[F][C])*danoFocos[F];

    }
}

// pintado
for(F=0;F<5;F++){
    sumaF=0;
    for(C=7;C>-1;C--){
        sumaataque+=Math.round (danoTotalV[F][C]);
        valueF=formatNumber (Math.round (danoTotalV[F][C]));
        $("#"+F+C).text(valueF);
        sumaF+=(Math.round (danoTotalV[F][C]));
    }
    $("#filaDT"+F).text(formatNumber (sumaF));
}

    valueF=formatNumber (sumaataque);
    $("#ataqueD").text(valueF);
}


function sumaCostosMejoras(destinoCosto,cte,esteCosto,sobrecosto){
    destinoCosto['mineral'] = (1*destinoCosto['mineral']) + ((esteCosto['mineral']/100)*cte *sobrecosto['mineral']);
    destinoCosto['cristal'] = (1*destinoCosto['cristal']) + ((esteCosto['cristal']/100)*cte *sobrecosto['cristal']);
    destinoCosto['gas'] = (1*destinoCosto['gas']) + ((esteCosto['gas']/100)*cte *sobrecosto['gas']);
    destinoCosto['plastico'] = (1*destinoCosto['plastico']) + ((esteCosto['plastico']/100)*cte *sobrecosto['plastico']);
    destinoCosto['ceramica'] = (1*destinoCosto['ceramica']) + ((esteCosto['ceramica']/100)*cte *sobrecosto['ceramica']);
    destinoCosto['liquido'] = (1*destinoCosto['liquido']) + ((esteCosto['liquido']/100)*cte *sobrecosto['liquido']);
    destinoCosto['micros'] = (1*destinoCosto['micros']) + ((esteCosto['micros']/100)*cte *sobrecosto['micros']);
    destinoCosto['personal'] = (1*destinoCosto['personal']) + ((esteCosto['personal']/100)*cte *sobrecosto['personal']);
    destinoCosto['masa'] = (1*destinoCosto['masa']) + ((esteCosto['masa']/100)*cte *sobrecosto['masa']);
}

function sumaCualidadesMejoras(destinoCosto,cte,esteCosto,sobrecosto){
    destinoCosto['fuel'] =(1 * destinoCosto['fuel'] ) + ((esteCosto['fuel']/100)*cte *sobrecosto['fuel']);
    destinoCosto['municion'] =(1 * destinoCosto['municion'] ) + ((esteCosto['municion']/100)*cte *sobrecosto['municion']);
    destinoCosto['masa'] =(1 * destinoCosto['masa'] ) + ((esteCosto['masa']/100)*cte *sobrecosto['masa']);
    destinoCosto['energia'] =(1 * destinoCosto['energia'] ) + ((esteCosto['energia']/100)*cte *sobrecosto['energia']);
    destinoCosto['tiempo'] =(1 * destinoCosto['tiempo'] ) + ((esteCosto['tiempo']/100)*cte *sobrecosto['tiempo']);
    destinoCosto['mantenimiento'] =(1 * destinoCosto['mantenimiento'] ) + ((esteCosto['mantenimiento']/100)*cte *sobrecosto['mantenimiento']);
    destinoCosto['defensa'] =(1 * destinoCosto['defensa'] ) + ((esteCosto['defensa']/100)*cte *sobrecosto['defensa']);
    destinoCosto['ataque'] =(1 * destinoCosto['ataque'] ) + ((esteCosto['ataque']/100)*cte *sobrecosto['ataque']);
    destinoCosto['velocidad'] =(1 * destinoCosto['velocidad'] ) + ((esteCosto['velocidad']/100)*cte *sobrecosto['velocidad']);
    destinoCosto['carga'] =(1 * destinoCosto['carga'] ) + ((esteCosto['carga']/100)*cte *sobrecosto['carga']);
    destinoCosto['cargaPequenia'] =(1 * destinoCosto['cargaPequenia'] ) + ((esteCosto['cargaPequenia']/100)*cte *sobrecosto['cargaPequenia']);
    destinoCosto['cargaMediana'] =(1 * destinoCosto['cargaMediana'] ) + ((esteCosto['cargaMediana']/100)*cte *sobrecosto['cargaMediana']);
    destinoCosto['cargaGrande'] =(1 * destinoCosto['cargaGrande'] ) + ((esteCosto['cargaGrande']/100)*cte *sobrecosto['cargaGrande']);
    destinoCosto['cargaEnorme'] =(1 * destinoCosto['cargaEnorme'] ) + ((esteCosto['cargaEnorme']/100)*cte *sobrecosto['cargaEnorme']);
    destinoCosto['cargaMega'] =(1 * destinoCosto['cargaMega'] ) + ((esteCosto['cargaMega']/100)*cte *sobrecosto['cargaMega']);
    destinoCosto['recolector'] =(1 * destinoCosto['recolector'] ) + ((esteCosto['recolector']/100)*cte *sobrecosto['recolector']);
    destinoCosto['extractor'] =(1 * destinoCosto['extractor'] ) + ((esteCosto['extractor']/100)*cte *sobrecosto['extractor']);

}



function sumaCostos(destinoCosto,cte,esteCosto){
    destinoCosto['mineral'] = (1 * destinoCosto['mineral'] ) + (esteCosto['mineral']*cte);
    destinoCosto['cristal'] = (1 * destinoCosto['cristal'] ) + (esteCosto['cristal']*cte);
    destinoCosto['gas'] = (1 * destinoCosto['gas'] ) + (esteCosto['gas']*cte);
    destinoCosto['plastico'] = (1 * destinoCosto['plastico'] ) + (esteCosto['plastico']*cte);
    destinoCosto['ceramica'] = (1 * destinoCosto['ceramica'] ) + (esteCosto['ceramica']*cte);
    destinoCosto['liquido'] = (1 * destinoCosto['liquido'] ) + (esteCosto['liquido']*cte);
    destinoCosto['micros'] = (1 * destinoCosto['micros'] ) + (esteCosto['micros']*cte);
    destinoCosto['personal'] = (1 * destinoCosto['personal'] ) + (esteCosto['personal']*cte);
    destinoCosto['masa'] = (1 * destinoCosto['masa'] ) + (esteCosto['masa']*cte);

    if (destinoCosto['mineral']<0){destinoCosto['mineral']=costesFuselaje['mineral'];};
    if (destinoCosto['cristal']<0){destinoCosto['cristal']=costesFuselaje['cristal'];};
    if (destinoCosto['gas']<0){destinoCosto['gas']=costesFuselaje['gas'];};
    if (destinoCosto['plastico']<0){destinoCosto['plastico']=costesFuselaje['plastico'];};
    if (destinoCosto['ceramica']<0){destinoCosto['ceramica']=costesFuselaje['ceramica'];};
    if (destinoCosto['liquido']<0){destinoCosto['liquido']=costesFuselaje['liquido'];};
    if (destinoCosto['micros']<0){destinoCosto['micros']=costesFuselaje['micros'];};
    if (destinoCosto['personal']<0){destinoCosto['personal']=costesFuselaje['personal'];};
    if (destinoCosto['masa']<0){destinoCosto['masa']=costesFuselaje['masa'];};


}

function sumaCualidades(destinoCualidad,cte,esteCualidad){
    destinoCualidad['fuel'] = ( 1*destinoCualidad['fuel']) + (esteCualidad['fuel']*cte);
    destinoCualidad['municion'] = ( 1*destinoCualidad['municion']) + (esteCualidad['municion']*cte);
    destinoCualidad['masa'] = ( 1*destinoCualidad['masa']) + (esteCualidad['masa']*cte);
    destinoCualidad['energia'] = ( 1*destinoCualidad['energia']) + (esteCualidad['energia']*cte);
    destinoCualidad['tiempo'] = ( 1*destinoCualidad['tiempo']) + (esteCualidad['tiempo']*cte);
    destinoCualidad['mantenimiento'] = ( 1*destinoCualidad['mantenimiento']) + (esteCualidad['mantenimiento']*cte);
    destinoCualidad['defensa'] = ( 1*destinoCualidad['defensa']) + (esteCualidad['defensa']*cte);
    destinoCualidad['ataque'] = ( 1*destinoCualidad['ataque']) + (esteCualidad['ataque']*cte);
    destinoCualidad['velocidad'] = ( 1*destinoCualidad['velocidad']) + (esteCualidad['velocidad']*cte);
    destinoCualidad['carga'] = ( 1*destinoCualidad['carga']) + (esteCualidad['carga']*cte);
    destinoCualidad['cargaPequenia'] = ( 1*destinoCualidad['cargaPequenia']) + (esteCualidad['cargaPequenia']*cte);
    destinoCualidad['cargaMediana'] = ( 1*destinoCualidad['cargaMediana']) + (esteCualidad['cargaMediana']*cte);
    destinoCualidad['cargaGrande'] = ( 1*destinoCualidad['cargaGrande']) + (esteCualidad['cargaGrande']*cte);
    destinoCualidad['cargaEnorme'] = ( 1*destinoCualidad['cargaEnorme']) + (esteCualidad['cargaEnorme']*cte);
    destinoCualidad['cargaMega'] = ( 1*destinoCualidad['cargaMega']) + (esteCualidad['cargaMega']*cte);
    destinoCualidad['recolector'] = ( 1*destinoCualidad['recolector']) + (esteCualidad['recolector']*cte);
    destinoCualidad['extractor'] = ( 1*destinoCualidad['extractor']) + (esteCualidad['extractor']*cte);
}

function mostrarResultado(){

    $.each( costesDisenio, function( key, value ) {
        valueF=formatNumber (Math.round (value));
        $("#"+key+"D").text(valueF);
    })
    $.each( cualidades, function( key, value ) {
    valueF=formatNumber (Math.floor (value));
        $("#"+key+"D").text(valueF);
    })

//pesoTotalF=formatNumber (Math.round (pesoTotal/1000));
//$("#pesoTotalD").text(pesoTotalF);  // pinta la masa masaT

// velocidad que lleva decimales
$("#velocidadD").text(cualidades['velocidad']);
// el tiempo en horas
timeDura(cualidades['tiempo'],'tiempoD');

}

$( document ).ready(function() {

        if (armasAlcance['armasLigera']!=0){alcanceArmasLigeras.noUiSlider.set(armasAlcance['armasLigera']);}
        if (armasAlcance['armasMedia']!=0){alcanceArmasMedias.noUiSlider.set(armasAlcance['armasMedia']);}
        if (armasAlcance['armasPesada']!=0){alcanceArmasPesadas.noUiSlider.set(armasAlcance['armasPesada']);}
        if (armasAlcance['armasMisil']!=0){alcanceArmasMisiles.noUiSlider.set(armasAlcance['armasMisil']);}
        if (armasAlcance['armasInsertada']!=0){alcanceArmasInsertadas.noUiSlider.set(armasAlcance['armasInsertada']);}
        if (armasAlcance['armasBomba']!=0){alcanceArmasBombas.noUiSlider.set(armasAlcance['armasBomba']);}

        if (armasDispersion['armasLigera']!=0){dispersionArmasLigeras.noUiSlider.set(armasDispersion['armasLigera']);}
        if (armasDispersion['armasMedia']!=0){dispersionArmasMedias.noUiSlider.set(armasDispersion['armasMedia']);}
        if (armasDispersion['armasPesada']!=0){dispersionArmasPesadas.noUiSlider.set(armasDispersion['armasPesada']);}
        if (armasDispersion['armasMisil']!=0){dispersionArmasMisiles.noUiSlider.set(armasDispersion['armasMisil']);}
        if (armasDispersion['armasInsertada']!=0){dispersionArmasInsertadas.noUiSlider.set(armasDispersion['armasInsertada']);}
        if (armasDispersion['armasBomba']!=0){dispersionArmasBombas.noUiSlider.set(armasDispersion['armasBomba']);}

        $("#nombre").val(esteDisenio['nombre']);
        $("#descripcion").val(esteDisenio['descripcion']);
        $("#posicionCombate").val(esteDisenio['posicion']);

        id={{$disenio->id}};
        eval("imagen=imagen" + id + ";");
        sumask=esteDisenio['skin'];
        imagen.dataset.skin = sumask;
        img = "background: url('/img/fotos naves/skin" + sumask + "/nave" + id + ".png') no-repeat center  !important;";
        $("#tablaArmas").prop("style", img);

        encajarTodo(); //todas las armas que traigo

        calculoTotalR();

    @if($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0)
        slider.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
    @endif
    if(investigadasArmas){

        @if($cantidadCLigeras>0){
            alcanceArmasLigeras.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasLigeras.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
        @if($cantidadCMedias>0){
            alcanceArmasMedias.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasMedias.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
        @if($cantidadCPesadas>0){
            alcanceArmasPesadas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasPesadas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
        @if($cantidadCInsertadas>0){
            alcanceArmasInsertadas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasInsertadas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
        @if($cantidadCMisiles>0){
            alcanceArmasMisiles.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasMisiles.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
        @if($cantidadCBombas>0){
            alcanceArmasBombas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
            dispersionArmasBombas.noUiSlider.on('update', function(){  'change',calculoTotalR();   });
        }@endif
    }

});




function crearDisenio() {
    imagen=imagen{{$disenio->id }};
    error=0;
    elerror="";
    if ($("#nombre").val()==""){
        elerror=("El disenio necesita un nombre.");
        error++;
    }
    if ($("#energiamotor").text()=="0"){
        elerror+=(" La nave necesita algún motor.");
        error++;
    }

    if (error>0){
        $("#datosContenido").html(elerror);
        $("#ModalTitulo").html("Diseño no creado");
    } else {

    datosBasicos={
        "id":{{$disenio->id }},
        "nombre":$("#nombre").val(),
        "descripcion":$("#descripcion").val(),
        "posicion":$("#posicionCombate").val(),
        "skin":imagen.dataset.skin
    }

    $.ajax({
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/juego/disenio/crearDisenio",
        data: {"armas": armas,"energiaArmas":energiaArmas,"armasAlcance":armasAlcance,"armasDispersion":armasDispersion,"datosBasicos":datosBasicos},
        beforeSend: function() {
                $("#crearDisenio").prop("disabled", true);
                var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
                $("#crearDisenio").html(spinner);
            },
        success: function (data) {
            console.log(data);
            $("#crearDisenio").prop("disabled", false);
            $("#crearDisenio").text("Crear Diseño");
            if (data.razonCorrecto=="") {
                //$('.modal').empty().append("Diseño creado").modal(); //data.payload
                //alert("Diseño creado");
                $("#ModalTitulo").html("Diseño creado");
                $("#datosContenido").html("Diseño disponible para ser construido");
            } else {
                $("#ModalTitulo").html("Diseño no creado");
                $("#datosContenido").html(data.razonCorrecto);
            }

        },
        error: function (xhr, textStatus, thrownError) {
            console.log("status", xhr.status);
            console.log("error", thrownError);
            //alert(textStatus);
        }
    });

    }

}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}


        </script>
