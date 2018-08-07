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

    "invBlindaje"=>$investigaciones->where("codigo","invBlindaje")->first()->nivel,
    "invCarga"=>$investigaciones->where("codigo","invCarga")->first()->nivel,
    "invIa"=>$investigaciones->where("codigo","invIa")->first()->nivel
];



$arrayCss=[];
$arrayStart=[];
$arrayConnect=[];
$arrayTooltip=[];


if ($investNiveles["invEnergia"]>0){
    array_push($arrayStart,10);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-1-color');
    array_push($arrayTooltip,'% de energía a armas de energía');
}
if ($investNiveles["invPlasma"]>0){
    array_push($arrayStart,40);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-2-color');
    array_push($arrayTooltip,'% de energía a armas de plasma');
}
if ($investNiveles["invBalistica"]>0){
    array_push($arrayStart,60);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-3-color');
    array_push($arrayTooltip,'% de energía a armas de Balística');
}
if ($investNiveles["invMa"]>0){
    array_push($arrayStart,90);
    array_push($arrayConnect,true);
    array_push($arrayCss,'c-4-color');
    array_push($arrayTooltip,'% de energía a armas de MA');
}
array_push($arrayConnect,true);
array_push($arrayCss,'c-5-color');

/// cantidades de cada elemento

$cantidadMotores=$diseño->cualidades->motores;
$multiplicadorMotores=1;
if ($cantidadMotores>6){
    $cantidadMotores=celdasMaximas(6,$cantidadMotores);
    $multiplicadorMotores=($diseño->cualidades->motores/$cantidadMotores);
}

$cantidadblindajes=$diseño->cualidades->blindajes;
$multiplicadorblindajes=1;
if ($cantidadblindajes>12){
$cantidadblindajes=celdasMaximas(12,$cantidadblindajes);
$multiplicadorblindajes=($diseño->cualidades->blindajes/$cantidadblindajes);
}

$cantidadMejoras=$diseño->cualidades->mejoras;
$multiplicadormejoras=1;

$cantidadCLigeras=$diseño->cualidades->armasLigeras;
$multiplicadorCLigeras=1;
if ($cantidadCLigeras>6){
    $cantidadCLigeras=celdasMaximas(6,$cantidadCLigeras);
    $multiplicadorCLigeras=($diseño->cualidades->armasLigeras/$cantidadCLigeras);
}

$cantidadCMedias=$diseño->cualidades->armasMedias;
$multiplicadorCMedias=1;
if ($cantidadCMedias>6){
    $cantidadCMedias=celdasMaximas(6,$cantidadCMedias);
    $multiplicadorCMedias=ceil ($diseño->cualidades->armasMedias/$cantidadCMedias);
}

$cantidadCPesadas=$diseño->cualidades->armasPesadas;
$multiplicadorCPesadas=1;
if ($cantidadCPesadas>6){
    $cantidadCPesadas=celdasMaximas(6,$cantidadCPesadas);
    $multiplicadorCPesadas=($diseño->cualidades->armasPesadas/$cantidadCPesadas);
}

$cantidadCInsertadas=$diseño->cualidades->armasInsertadas;
$multiplicadorCInsertadas=1;
if ($cantidadCInsertadas>6){
    $cantidadCInsertadas=celdasMaximas(6,$cantidadCInsertadas);
    $multiplicadorCInsertadas=($diseño->cualidades->armasInsertadas/$cantidadCInsertadas);
}

$cantidadCMisiles=$diseño->cualidades->armasMisiles;
$multiplicadorCMisiles=1;
if ($cantidadCMisiles>6){
    $cantidadCMisiles=celdasMaximas(6,$cantidadCMisiles);
    $multiplicadorCMisiles=($diseño->cualidades->armasMisiles/$cantidadCMisiles);
}

$cantidadCBombas=$diseño->cualidades->armasBombas;
$multiplicadorCBombas=1;
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

//arrays que vienen
$motores=[];
for($n=0;$n<$cantidadMotores;$n++){ array_push($motores,0);}

$blindajes=[];
for($n=0;$n<$cantidadblindajes;$n++){ array_push($blindajes,0);}

$mejoras=[];
for($n=0;$n<$cantidadMejoras;$n++){ array_push($mejoras,0);}

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




@endphp

<div class="row rounded">
    <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive" style="background-color: #000000 !important;">
                <table id="tablaArmas" class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important; background: url('{{ asset('img/fotos naves/skin1/nave' . $diseño->id . '.jpg')}}') no-repeat center !important;">
                    <tr>
                        <td>
                            <div class="row rounded">
                                <div class="col-12 ">
                                    <div id="cuadro1" class="table-responsive cajita">
                                        <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                            <tr>
                                                <td colspan="4">
                                                    <div class=" text-light" id="motorestxt">x{{$multiplicadorMotores}} Motores: +151.225</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img onClick="encajar('motor',59,'añade')" class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",59)->first()->nombre}}" src="{{ asset('img/fotos armas/arma59.jpg') }}" width="40" height="40">
                                                </td>
                                                @if ($investNiveles["invPropNuk"]>0)
                                                    <td>
                                                        <img onClick="encajar('motor',60,'añade')"  class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",60)->first()->nombre}}" src="{{ asset('img/fotos armas/arma60.jpg') }}" width="40" height="40">
                                                    </td>
                                                @endif
                                                @if ($investNiveles["invPropIon"]>0)
                                                    <td>
                                                        <img onClick="encajar('motor',61,'añade')"  class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",61)->first()->nombre}}" src="{{ asset('img/fotos armas/arma61.jpg') }}" width="40" height="40">
                                                    </td>
                                                @endif
                                                @if ($investNiveles["invPropPlasma"]>0)
                                                <td>
                                                    <img onClick="encajar('motor',62,'añade')"  class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",62)->first()->nombre}}" src="{{ asset('img/fotos armas/arma62.jpg') }}" width="40" height="40">
                                                </td>
                                                @endif
                                                @if ($investNiveles["invPropMa"]>0)
                                                <td>
                                                    <img onClick="encajar('motor',63,'añade')"  class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",63)->first()->nombre}}" src="{{ asset('img/fotos armas/arma63.jpg') }}" width="40" height="40">
                                                </td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
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
                                    @for ($i = 0 ; $i <7; $i++)
                                        <td>
                                            @if ($i<$cantidadMotores)
                                        <div  style="border: 1px solid white;"><img onClick="encajar('motor',{{$i}},'quita')" id="motor{{$i}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            </table>
                        </td>
                        <td rowspan="5">
                            <button type="button" class="btn btn-outline-success btn-block btn-sm" onclick="changeSkin('{{$diseño->id}}')">
                                <i class="fa fa-arrows-alt-h" id="imagen{{$diseño->id}}" data-skin="1"> Cambiar aspecto</i>
                            </button>
                            <button type="button" class="btn btn-outline-success btn-block btn-sm" onclick="limpiar()">
                                <i class="fa fa-recycle" data-skin="1"> Limpiar diseño</i>
                            </button>
                        </td>
                        <td rowspan="2" colspan="2">
                            @if ($cantidadCLigeras+$cantidadCMedias+$cantidadCPesadas+$cantidadCInsertadas+$cantidadCMisiles+$cantidadCBombas >0)
                            <div class=" text-light" id="motorestxt" style="margin-bottom: 10px;">Armas: -151.225 e</div>
                            <div class="slider" id="slider-color"></div>
                                <nav style="margin-top: 17px;">
                                    <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                                    @if ($investNiveles["invEnergia"]>0)
                                        <a class="nav-item nav-link active" id="energia-tab" data-toggle="tab" href="#energia" role="tab" aria-controls="energia" aria-selected="true" >
                                            Energía
                                        </a>
                                    @endif
                                    @if ($investNiveles["invPlasma"]>0)
                                        <a class="nav-item nav-link " id="plasma-tab" data-toggle="tab" href="#plasma" role="tab" aria-controls="plasma" aria-selected="false">
                                            Plasma
                                        </a>
                                    @endif
                                    @if ($investNiveles["invBalistica"]>0)
                                        <a class="nav-item nav-link" id="balistica-tab" data-toggle="tab" href="#balistica" role="tab" aria-controls="balistica" aria-selected="false" >
                                            Balística
                                        </a>
                                    @endif
                                    @if ($investNiveles["invMa"]>0)
                                        <a class="nav-item nav-link" id="max-tab" data-toggle="tab" href="#max" role="tab" aria-controls="max" aria-selected="false" >
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
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>
                                                            @if ($cantidadCLigeras>0)
                                                                <td>
                                                                    <img onClick="encajar('armasLigera',1,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Cañón ligero" src="{{ asset('img/fotos armas/arma1.jpg') }}" width="45" height="45" >
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMedias>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMedia',2,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Cañón medio" src="{{ asset('img/fotos armas/arma2.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCPesadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasPesada',3,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Cañón pesado" src="{{ asset('img/fotos armas/arma3.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCInsertadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasInsertada',4,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Cañón insertado" src="{{ asset('img/fotos armas/arma4.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMisiles>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMisil',5,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma5.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCBombas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasBomba',6,'añade')" class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma6.jpg') }}" width="45" height="45">
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
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>
                                                            @if ($cantidadCLigeras>0)
                                                                <td>
                                                                    <img onClick="encajar('armasLigera',11,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Cañón ligero" src="{{ asset('img/fotos armas/arma11.jpg') }}" width="45" height="45" >
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMedias>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMedia',12,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Cañón medio" src="{{ asset('img/fotos armas/arma12.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCPesadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasPesada',13,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Cañón pesado" src="{{ asset('img/fotos armas/arma13.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCInsertadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasInsertada',14,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Cañón insertado" src="{{ asset('img/fotos armas/arma14.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMisiles>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMisil',15,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma15.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCBombas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasBomba',16,'añade')" class="rounded invesPlasma armasI" data-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma16.jpg') }}" width="45" height="45">
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
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>
                                                            @if ($cantidadCLigeras>0)
                                                                <td>
                                                                    <img onClick="encajar('armasLigera',21,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Cañón ligero" src="{{ asset('img/fotos armas/arma21.jpg') }}" width="45" height="45" >
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMedias>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMedia',22,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Cañón medio" src="{{ asset('img/fotos armas/arma22.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCPesadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasPesada',23,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Cañón pesado" src="{{ asset('img/fotos armas/arma23.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCInsertadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasInsertada',24,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Cañón insertado" src="{{ asset('img/fotos armas/arma24.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMisiles>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMisil',25,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma25.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCBombas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasBomba',26,'añade')" class="rounded invesBalistica armasI" data-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma26.jpg') }}" width="45" height="45">
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
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>
                                                            @if ($cantidadCLigeras>0)
                                                                <td>
                                                                    <img onClick="encajar('armasLigera',31,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Cañón ligero" src="{{ asset('img/fotos armas/arma31.jpg') }}" width="45" height="45" >
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMedias>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMedia',32,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Cañón medio" src="{{ asset('img/fotos armas/arma32.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCPesadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasPesada',33,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Cañón pesado" src="{{ asset('img/fotos armas/arma33.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCInsertadas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasInsertada',34,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Cañón insertado" src="{{ asset('img/fotos armas/arma34.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCMisiles>0)
                                                                <td>
                                                                    <img onClick="encajar('armasMisil',35,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Misiles" src="{{ asset('img/fotos armas/arma35.jpg') }}" width="45" height="45">
                                                                </td>
                                                            @endif
                                                            @if ($cantidadCBombas>0)
                                                                <td>
                                                                    <img onClick="encajar('armasBomba',36,'añade')" class="rounded invesMa armasI" data-toggle="tooltip" data-placement="top" title="Bombas" src="{{ asset('img/fotos armas/arma36.jpg') }}" width="45" height="45">
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
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row rounded">
                                <div class="col-12 ">
                                    @if ($investNiveles["invBlindaje"]>0)
                                        <div id="cuadro1" class="table-responsive cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    <td colspan="4">
                                                            <div class=" text-light" id="blindajestxt">x{{$multiplicadorblindajes}} Blindajes: +225</div>
                                                        </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                @for($codigo=65;$codigo<70;$codigo++)
                                                    @if ($investNiveles["invBlindaje"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                        <td>
                                                            <img onClick="encajar('blindaje',{{$codigo}},'añade')" class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                        </td>
                                                    @endif
                                                @endfor
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <table>
                                    @for ($n=0 ; $n<3; $n++)
                                        <tr>
                                            @for ($i = 0 ; $i <7; $i++)
                                            <td>
                                                @if ($i<$cantidadblindajes-($n*7))
                                                    <div  style="border: 1px solid white;"><img  onClick="encajar('blindaje',{{$i+(7*$n)}},'quita')" id="blindaje{{$i+(7*$n)}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </table>
                            @endif
                        </td>

                    </tr>
                    <tr>
                            <td colspan="2">
                                    <div class="row rounded">
                                        <div class="col-12 ">
                                            @if ($investNiveles["invIa"]>0)
                                            <div id="cuadro1" class="table-responsive cajita" style="max-width: 725px">
                                                <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                    <tr>
                                                        <td colspan="8">
                                                            <div class=" text-light" id="mejorastxt">x{{$multiplicadormejoras}} Mejoras: +11.205 e</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    @for($codigo=70;$codigo<88;$codigo++)
                                                        @if ($investNiveles["invIa"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                            <td>
                                                                <img onClick="encajar('mejora',{{$codigo}},'añade')" class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}" src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                            </td>
                                                        @endif
                                                    @endfor
                                                    </tr>
                                                </table>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </td>
                        <td rowspan="2" colspan="2">
                            @if ($investNiveles["invEnergia"]+$investNiveles["invPlasma"]+$investNiveles["invBalistica"]+$investNiveles["invMa"]>0)
                            <table>
                                <tr >
                                    @if ($diseño->cualidades->armasLigeras>0)
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
                                                    x{{$multiplicadorCLigeras}}   Cañones Ligeros
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
                                    @if ($diseño->cualidades->armasMedias>0)
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
                                                    x{{$multiplicadorCMedias}}   Cañones Medios
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
                                    @if ($diseño->cualidades->armasPesadas>0)
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
                                                    x{{$multiplicadorCPesadas}}   Cañones Pesados
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
                                    @if ($diseño->cualidades->armasInsertadas>0)
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
                                                    x{{$multiplicadorCInsertadas}}   Cañones insertados
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
                                    @if ($diseño->cualidades->armasMisiles>0)
                                        @for ($i = 6 ; $i >0; $i--)
                                            <td>
                                                @if ($i<=$cantidadCMisiles)
                                                <div id="armasMisiles"+i style="border: 1px solid white;"><img onClick="encajar('armasMisil',{{$i-1}},'quita')" id="armasMisil{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                        @endfor

                                            <td colspan="2" class="text-light align-middle ">
                                                    &nbsp;&nbsp;alcance&nbsp;&nbsp;
                                            <div class="slider" id="alcancearmasMisiles"></div>
                                            </td>
                                            <td colspan="2" class="text-light align-middle">
                                                dispersión
                                            <div class="slider" id="dispersionarmasMisiles"></div>
                                            </td>
                                            <td class="text-warning align-middle">
                                                    x{{$multiplicadorCMisiles}}   Misiles
                                            </td>

                                        <script>
                                            noUiSlider.create(document.getElementById('alcancearmasMisiles'), {
                                                start: 0,
                                                step: 1,
                                                range: {
                                                    'min': -7,
                                                    'max': 7
                                                }
                                            });
                                            noUiSlider.create(document.getElementById('dispersionarmasMisiles'), {
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
                                    @if ($diseño->cualidades->armasBombas>0)
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
                                                    x{{$multiplicadorCBombas}}   Bombas
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
                        </td>
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
                    <tr>
                            <td  colspan="2">
                                    @if ($cantidadCargaPequeña+$cantidadCargaMedia+$cantidadCargaGrande>0 && $investNiveles["invCarga"]>0)
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                                <div class="row rounded ">
                                                    <div class="col-12 ">
                                                        <div id="cuadro1" class="table-responsive cajita">
                                                            <div class=" text-light" id="cargatxt">Carga: -5.454</div>
                                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                                <tr>
                                                                    @for($codigo=90;$codigo<102;$codigo++)
                                                                        @if ($investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                                            @if ($cantidadCargaPequeña>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaPequeña")
                                                                                <td>
                                                                                    <img onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'añade')"class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                                </td>
                                                                            @endif
                                                                            @if ($cantidadCargaMedia>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaMediana")
                                                                                <td>
                                                                                    <img onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'añade')"class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                                </td>
                                                                            @endif
                                                                            @if ($cantidadCargaGrande>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaGrande")
                                                                                <td>
                                                                                    <img onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'añade')"class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                                </td>
                                                                            @endif
                                                                            @if ($cantidadCargaEnorme>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaEnorme")
                                                                            <td>
                                                                                <img onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'añade')"class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                            </td>
                                                                            @endif
                                                                            @if ($cantidadCargaMega>0 and $armas->where("codigo",$codigo)->first()->ranura=="cargaMega")
                                                                            <td>
                                                                                <img onClick="encajar('{{$armas->where("codigo",$codigo)->first()->ranura}}',{{$codigo}},'añade')"class="rounded" data-toggle="tooltip" data-placement="top" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                            </td>
                                                                            @endif
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table>
                                                <tr >
                                                    @if ($diseño->cualidades->cargaPequeña>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaPequeña)
                                                                <div  style="border: 1px solid white;"><img onClick="encajar('cargaPequeña',{{$i-1}},'quita')" id="cargaPequeña{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicadorCargaPequeña}}   Carga pequeña
                                                            </td>

                                                    @endif
                                                </tr>

                                                <tr >
                                                    @if ($diseño->cualidades->cargaMedia>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaMedia)
                                                                <div  style="border: 1px solid white;"><img onClick="encajar('cargaMediana',{{$i-1}},'quita')" id="cargaMediana{{$i-1}}" src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicadorCargaMedia}}   Carga mediana
                                                            </td>
                                                    @endif
                                                </tr>
                                                <tr >
                                                    @if ($diseño->cualidades->cargaGrande>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaGrande)
                                                                <div style="border: 1px solid white;"><img onClick="encajar('cargaGrande',{{$i-1}},'quita')" id="cargaGrande{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicadorCargaGrande}}   Carga grande
                                                            </td>
                                                    @endif
                                                </tr>

                                                <tr >
                                                    @if ($diseño->cualidades->cargaEnorme>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaEnorme)
                                                                <div style="border: 1px solid white;"><img onClick="encajar('cargaEnorme',{{$i-1}},'quita')" id="cargaEnorme{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicadorCargaEnorme}}   Carga Enorme
                                                            </td>
                                                    @endif
                                                </tr>

                                                <tr >
                                                    @if ($diseño->cualidades->cargaMega>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadCargaMega)
                                                                <div style="border: 1px solid white;"><img onClick="encajar('cargaMega',{{$i-1}},'quita')" id="cargaMega{{$i-1}}"  src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicadorCargaMega}}   Carga Mega
                                                            </td>
                                                    @endif
                                                </tr>
                                            </table>
                                    @endif
                            </td>

                    </tr>


                </table>
            </div>
        </div>
    </div>












    <script>



var motores={!!json_encode($motores)!!};
var blindajes={!!json_encode($blindajes)!!};
var mejoras={!!json_encode($mejoras)!!};
var cargaPequeñas={!!json_encode($cargaPequeñas)!!};
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




    var armas={
        motor:motores,
        blindaje:blindajes,
        mejora:mejoras,
        cargaPequeña:cargaPequeñas,
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

    function encajar(elemento,id,qhago){
        if (qhago=='añade'){
            for (n=0;n<armas[elemento].length;n++) {
                if (armas[elemento][n]==0){ armas[elemento][n]=id; break;  }
            };
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

        calculoTotalR();
    }


        /// barra de investigaciones-armas

        // data-toggle="tooltip" data-placement="top" title=""

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
        var a=1;
        arrayTooltip.forEach(function(n){
                a++;
                if(a==2){
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("data-toggle","tooltip");
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("data-placement","auto");
                    $("#slider-color > div:nth-child(1) > div:nth-child(2) > div:nth-child(1)").prop("title",n);
                } else {
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("data-toggle","tooltip");
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("data-placement","auto");
                    $("div.noUi-origin:nth-child("+a+") > div:nth-child(1)").prop("title",n);
                }

            })
@endif
        ///
    /*
    function cambiaInvest(invest){ $(".armasI").prop('class','rounded armasI '+invest);  }
    */

    //////////// superformula de calculo total ///

var armasL={!!json_encode($armas)!!};
var cualidadesFuselaje={!!json_encode($diseño->cualidades)!!};
var costesFuselaje={!!json_encode($diseño->costes)!!};
var constantesI={!!json_encode($constantesI)!!};
var investigaciones={!!json_encode($investigaciones)!!};
var tnave= {!!json_encode($diseño->tnave)!!};



var costesDiseño={
    mineral:0,
    cristal:0,
    gas:0,
    plastico:0,
    ceramica:0,
    liquido:0,
    micros:0,
    personal:0,
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
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
};

var multiplicadorMotores={{$multiplicadorMotores}};
var multiplicadorBlindajes={{$multiplicadorblindajes}};
var multiplicadorMejoras={{$multiplicadormejoras}};
var multiplicadorCLigeras={{$multiplicadorCLigeras}};
var multiplicadorCMedias={{$multiplicadorCMedias}};
var multiplicadorCPesadas={{$multiplicadorCPesadas}};
var multiplicadorCInsertadas={{$multiplicadorCInsertadas}};
var multiplicadorCMisiles={{$multiplicadorCMisiles}};
var multiplicadorCargaPequeña={{$multiplicadorCargaPequeña}};
var multiplicadorCargaMedia={{$multiplicadorCargaMedia}};
var multiplicadorCargaGrande={{$multiplicadorCargaGrande}};
var multiplicadorCargaEnorme={{$multiplicadorCargaEnorme}};
var multiplicadorCargaMega={{$multiplicadorCargaMega}};


function calculoTotalR(){

costesArmas= {!!json_encode($costesArmas)!!};

costesDiseño={
    mineral:costesFuselaje['mineral'],
    cristal:costesFuselaje['cristal'],
    gas:costesFuselaje['gas'],
    plastico:costesFuselaje['plastico'],
    ceramica:costesFuselaje['ceramica'],
    liquido:costesFuselaje['liquido'],
    micros:costesFuselaje['micros'],
    personal:costesFuselaje['personal'],
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
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
    carga:0,
    cargaPequeña:0,
    cargaMediana:0,
    cargaGrande:0,
    cargaEnorme:0,
    cargaMega:0,
};


// añado energia
elemento='motor';
genera='energia';
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequeña:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,};

    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.id == obj['id'];})[0]; // busca costes este objeto entre las armas
        var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
        var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        sumaCostos(costesMisMotores,multiplicadorMotores,costeobj);// sumo recursos basicos
        var cte=(1+miConstanteI)*nivelInv; //lo que varia por nivel de tecno
        var factorFuselaje=cualidadesFuselaje[genera];     // el factor que varia para cada fuselaje
        costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
        sumaCualidades(costesMisMotores,multiplicadorMotores,costesVacio);
    }
});

elemento='blindaje';
genera='defensa';
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequeña:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,};

    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.id == obj['id'];})[0]; // busca costes este objeto entre las armas
        var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
        var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        sumaCostos(costesMisBlindajes,multiplicadorBlindajes,costeobj);// sumo recursos basicos
        var cte=(1+miConstanteI)*nivelInv; //lo que varia por nivel de tecno
        var factorFuselaje=cualidadesFuselaje[genera];     // el factor que varia para cada fuselaje
        costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
        sumaCualidades(costesMisBlindajes,multiplicadorBlindajes,costesVacio);
    }
});


elemento='cargaPequeña';
genera='carga';
$.each( armas[elemento], function( key, e ) {
    costesVacio={mineral:0, cristal:0, gas:0, plastico:0, ceramica:0, liquido:0, micros:0, personal:0, fuel:0, ma:0, municion:0, masa:0, energia:0, tiempo:0, mantenimiento:0, defensa:0, ataque:0, velocidad:0, carga:0, cargaPequeña:0, cargaMediana:0, cargaGrande:0, cargaEnorme:0, cargaMega:0,};

    if (e>0){
        var obj=$.grep(armasL, function(obj){return obj.codigo == e;})[0]; // busca este objeto entre las armas
        var costeobj=$.grep(costesArmas, function(costeobj){return costeobj.id == obj['id'];})[0]; // busca costes este objeto entre las armas
        var miConstanteI=$.grep(constantesI, function(miConstanteI){return miConstanteI.codigo == 'mejora'+obj['clase'];})[0]['valor']; //la constante relacionada con cuanto sube popr el nivel de tecno que le coprresponde
        var nivelInv= $.grep(investigaciones, function(nivelInv){return nivelInv.codigo == obj['clase']})[0]['nivel']; //sacamos nivel de tecno que corresponde a este objeto
        sumaCostos(costesMisCargas,multiplicadorCargaPequeña,costeobj);// sumo recursos basicos
        var cte=(1+miConstanteI)*nivelInv; //lo que varia por nivel de tecno
        var factorFuselaje=cualidadesFuselaje[genera];     // el factor que varia para cada fuselaje
        costesVacio[genera]=costeobj[genera]*cte*factorFuselaje; //lo q mejora por esos niveles
        sumaCualidades(costesMisCargas,multiplicadorCargaPequeña,costesVacio);
    }
});







//suma de todos los costes:
cte=1;
sumaCostos(costesDiseño,cte,costesMisMotores);
sumaCostos(costesDiseño,cte,costesMisBlindajes);
sumaCostos(costesDiseño,cte,costesMisArmas);
sumaCostos(costesDiseño,cte,costesMisCargas);
sumaCostos(costesDiseño,cte,costesMisMejoras);

sumaCualidades(cualidades,cte,costesMisMotores);
sumaCualidades(cualidades,cte,costesMisBlindajes);
sumaCualidades(cualidades,cte,costesMisArmas);
sumaCualidades(cualidades,cte,costesMisCargas);
sumaCualidades(cualidades,cte,costesMisMejoras);


mostrarResultado();
    }

function sumaCostos(destinoCosto,cte,esteCosto){
    destinoCosto['mineral']+=esteCosto['mineral']*cte;
    destinoCosto['cristal']+=esteCosto['cristal']*cte;
    destinoCosto['gas']+=esteCosto['gas']*cte;
    destinoCosto['plastico']+=esteCosto['plastico']*cte;
    destinoCosto['ceramica']+=esteCosto['ceramica']*cte;
    destinoCosto['liquido']+=esteCosto['liquido']*cte;
    destinoCosto['micros']+=esteCosto['micros']*cte;
    destinoCosto['personal']+=esteCosto['personal']*cte;
}

function sumaCualidades(destinoCualidad,cte,esteCualidad){
    destinoCualidad['fuel']+=esteCualidad['fuel']*cte;
    destinoCualidad['municion']+=esteCualidad['municion']*cte;
    destinoCualidad['masa']+=esteCualidad['masa']*cte;
    destinoCualidad['energia']+=esteCualidad['energia']*cte;
    destinoCualidad['tiempo']+=esteCualidad['tiempo']*cte;
    destinoCualidad['mantenimiento']+=esteCualidad['mantenimiento']*cte;
    destinoCualidad['defensa']+=esteCualidad['defensa']*cte;
    destinoCualidad['ataque']+=esteCualidad['ataque']*cte;
    destinoCualidad['velocidad']+=esteCualidad['velocidad']*cte;
    destinoCualidad['carga']+=esteCualidad['carga']*cte;
    destinoCualidad['cargaPequeña']+=esteCualidad['cargaPequeña']*cte;
    destinoCualidad['cargaMediana']+=esteCualidad['cargaMediana']*cte;
    destinoCualidad['cargaGrande']+=esteCualidad['cargaGrande']*cte;
    destinoCualidad['cargaEnorme']+=esteCualidad['cargaEnorme']*cte;
    destinoCualidad['cargaMega']+=esteCualidad['cargaMega']*cte;
}

function mostrarResultado(){

    $.each( costesDiseño, function( key, value ) {
        valueF=formatNumber (Math.round (value));
        $("#"+key+"D").text(valueF);
    })
    $.each( cualidades, function( key, value ) {
    valueF=formatNumber (Math.round (value));
        $("#"+key+"D").text(valueF);
    })

}

$( document ).ready(function() {
    calculoTotalR();
    });

        </script>
