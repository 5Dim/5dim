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

$cantidadmejoras=$diseño->cualidades->mejoras;
$multiplicadormejoras=1;

$cantidadCLigeras=$diseño->cualidades->armasLigeras;
$multiplicador=1;
if ($cantidadCLigeras>6){
    $cantidadCLigeras=celdasMaximas(6,$cantidadCLigeras);
    $multiplicador=($diseño->cualidades->armasLigeras/$cantidadCLigeras);
}

$cantidadCMedias=$diseño->cualidades->armasMedias;
$multiplicador=1;
if ($cantidadCMedias>6){
    $cantidadCMedias=celdasMaximas(6,$cantidadCMedias);
    $multiplicador=ceil ($diseño->cualidades->armasMedias/$cantidadCMedias);
}

$cantidadCPesadas=$diseño->cualidades->armasPesadas;
$multiplicador=1;
if ($cantidadCPesadas>6){
    $cantidadCPesadas=celdasMaximas(6,$cantidadCPesadas);
    $multiplicador=($diseño->cualidades->armasPesadas/$cantidadCPesadas);
}

$cantidadCInsertadas=$diseño->cualidades->armasInsertadas;
$multiplicador=1;
if ($cantidadCInsertadas>6){
    $cantidadCInsertadas=celdasMaximas(6,$cantidadCInsertadas);
    $multiplicador=($diseño->cualidades->armasInsertadas/$cantidadCInsertadas);
}

$cantidadCMisiles=$diseño->cualidades->armasMisiles;
$multiplicador=1;
if ($cantidadCMisiles>6){
    $cantidadCMisiles=celdasMaximas(6,$cantidadCMisiles);
    $multiplicador=($diseño->cualidades->armasMisiles/$cantidadCMisiles);
}

$cantidadCBombas=$diseño->cualidades->armasBombas;
$multiplicador=1;
if ($cantidadCBombas>6){
    $cantidadCBombas=celdasMaximas(6,$cantidadCBombas);
    $multiplicador=($diseño->cualidades->armasBombas/$cantidadCBombas);
}

$cantidadCargaPequeña=$diseño->cualidades->cargaPequeña;
$multiplicador=1;
if ($cantidadCargaPequeña>$filasCarga){
    $cantidadCargaPequeña=celdasMaximas($filasCarga,$cantidadCargaPequeña);
    $multiplicador=($diseño->cualidades->cargaPequeña/$cantidadCargaPequeña);
}

$cantidadMedia=$diseño->cualidades->cargaMedia;
$multiplicador=1;
if ($cantidadMedia>$filasCarga){
$cantidadMedia=celdasMaximas($filasCarga,$cantidadMedia);
$multiplicador=ceil ($diseño->cualidades->cargaMedia/$cantidadMedia);
}

$cantidadGrande=$diseño->cualidades->cargaGrande;
$multiplicador=1;
if ($cantidadGrande>$filasCarga){
$cantidadGrande=celdasMaximas($filasCarga,$cantidadGrande);
$multiplicador=($diseño->cualidades->cargaGrande/$cantidadGrande);
}




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
                                                    <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",59)->first()->nombre}}" src="{{ asset('img/fotos armas/arma59.jpg') }}" width="40" height="40">
                                                </td>
                                                @if ($investNiveles["invPropNuk"]>0)
                                                    <td>
                                                        <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",60)->first()->nombre}}" src="{{ asset('img/fotos armas/arma60.jpg') }}" width="40" height="40">
                                                    </td>
                                                @endif
                                                @if ($investNiveles["invPropIon"]>0)
                                                    <td>
                                                        <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",61)->first()->nombre}}" src="{{ asset('img/fotos armas/arma61.jpg') }}" width="40" height="40">
                                                    </td>
                                                @endif
                                                @if ($investNiveles["invPropPlasma"]>0)
                                                <td>
                                                    <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",62)->first()->nombre}}" src="{{ asset('img/fotos armas/arma62.jpg') }}" width="40" height="40">
                                                </td>
                                                @endif
                                                @if ($investNiveles["invPropMa"]>0)
                                                <td>
                                                    <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",63)->first()->nombre}}" src="{{ asset('img/fotos armas/arma63.jpg') }}" width="40" height="40">
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
                                            <div id="motores"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                        </td>
                        <td rowspan="2" colspan="2">
                            @if ($diseño->cualidades->armasLigeras+$diseño->cualidades->armasMedias+$diseño->cualidades->armasPesadas+$diseño->cualidades->armasInsertadas+$diseño->cualidades->armasMisiles+$diseño->cualidades->armasBombas >0)
                            <div class=" text-light" id="motorestxt" style="margin-bottom: 10px;">Armas: -151.225 e</div>
                            <div class="slider" id="slider-color"></div>

                                <nav style="margin-top: 17px;">
                                    <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                                    @if ($investNiveles["invEnergia"]>0)
                                        <a class="nav-item nav-link active" id="energia-tab" data-toggle="tab" href="#energia" role="tab" aria-controls="energia" aria-selected="true" onclick="cambiaInvest('invesEnergia')">
                                            Energía
                                        </a>
                                    @endif
                                    @if ($investNiveles["invPlasma"]>0)
                                        <a class="nav-item nav-link " id="plasma-tab" data-toggle="tab" href="#plasma" role="tab" aria-controls="plasma" aria-selected="false" onclick="cambiaInvest('invesPlasma')">
                                            Plasma
                                        </a>
                                    @endif
                                    @if ($investNiveles["invBalistica"]>0)
                                        <a class="nav-item nav-link" id="balistica-tab" data-toggle="tab" href="#balistica" role="tab" aria-controls="balistica" aria-selected="false" onclick="cambiaInvest('invesBalistica')" >
                                            Balística
                                        </a>
                                    @endif
                                    @if ($investNiveles["invMa"]>0)
                                        <a class="nav-item nav-link" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-controls="ma" aria-selected="false" onclick="cambiaInvest('invesMa')">
                                            M-A
                                        </a>
                                    @endif
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                        <div class="row rounded ">
                                            <div class="col-12 ">
                                                @if ($investNiveles["invEnergia"]+$investNiveles["invPlasma"]+$investNiveles["invBalistica"]+$investNiveles["invMa"]>0)
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>

                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Cañón ligero" src="{{ asset('img/fotos armas/ligera.jpg') }}" width="45" height="45" >
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Cañón medio" src="{{ asset('img/fotos armas/media.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Cañón pesado" src="{{ asset('img/fotos armas/pesada.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Cañón insertado" src="{{ asset('img/fotos armas/insertada.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Misiles" src="{{ asset('img/fotos armas/misil.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia armasI" data-toggle="tooltip" data-placement="auto" title="Bombas" src="{{ asset('img/fotos armas/bomba.jpg') }}" width="45" height="45">
                                                            </td>

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
                                                            <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"  src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
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

                                    <tr>
                                        @for ($i = 0 ; $i <7; $i++)
                                            <td>
                                                @if ($i<$cantidadblindajes/2)
                                                <div id="motores"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        @for ($i = 0 ; $i <7; $i++)
                                            <td>
                                                @if ($i<$cantidadblindajes/2)
                                                <div id="motores"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>
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
                                                                <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",$codigo)->first()->nombre}}" src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
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
                                                <div id="armasLigeras"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Cañones Ligeros
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
                                                <div id="armasMedias"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Cañones Medios
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
                                                <div id="armasPesadas"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Cañones Pesados
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
                                                <div id="armasInsertadas"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Cañones insertados
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
                                                <div id="armasMisiles"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Misiles
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
                                                <div id="armasBombas"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                                    x{{$multiplicador}}   Bombas
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
                                                    @if ($i<$cantidadmejoras-($n*14))
                                                        <div id="mejoras"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
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
                                    @if ($diseño->cualidades->cargaPequeña+$diseño->cualidades->cargaMedia+$diseño->cualidades->cargaGrande>0 && $investNiveles["invCarga"]>0)
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                                <div class="row rounded ">
                                                    <div class="col-12 ">
                                                        <div id="cuadro1" class="table-responsive cajita">
                                                            <div class=" text-light" id="cargatxt">Carga: -5.454</div>
                                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                                <tr>
                                                                    @for($codigo=90;$codigo<98;$codigo++)
                                                                        @if ($investNiveles["invCarga"]>=$armas->where("codigo",$codigo)->first()->niveltec)
                                                                            <td>
                                                                                <img class="rounded" data-toggle="tooltip" data-placement="auto" title="{{$armas->where("codigo",$codigo)->first()->nombre}}"src="{{ asset('img/fotos armas/arma'.$codigo.'.jpg') }}" width="40" height="40">
                                                                            </td>
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
                                                                <div id="cargaPequeña"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicador}}   Carga pequeña
                                                            </td>

                                                    @endif
                                                </tr>

                                                <tr >
                                                    @if ($diseño->cualidades->cargaMedia>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadMedia)
                                                                <div id="cargaMedia"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicador}}   Carga mediana
                                                            </td>
                                                    @endif
                                                </tr>
                                                <tr >
                                                    @if ($diseño->cualidades->cargaGrande>0)
                                                        @for ($i = $filasCarga ; $i >0; $i--)
                                                            <td>
                                                                @if ($i<=$cantidadGrande)
                                                                <div id="cargaGrande"+i style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                                @endif
                                                            </td>
                                                        @endfor
                                                            <td class="text-warning align-middle">
                                                                    x{{$multiplicador}}   Carga grande
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


        /// barra de investigaciones-armas

        // data-toggle="tooltip" data-placement="auto" title=""


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




        ///

    function cambiaInvest(invest){
        $(".armasI").prop('class','rounded armasI '+invest);


    }


        </script>
