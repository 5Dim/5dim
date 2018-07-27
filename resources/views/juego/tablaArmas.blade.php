@php
function celdasMaximas($a,$b) { //saco la cantidad de celdas justas
    while ( ((int)($b/$a)-($b/$a)) !=0 ) {
    --$a;
    }
return $a;
}
@endphp

<div class="row rounded">
    <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important; background: url('{{ asset('img/fotos naves/skin1/nave' . $diseño->id . '.jpg') }}') no-repeat center !important">
                    <tr>
                        <td>
                            <div class="row rounded">
                                <div class="col-12 ">
                                    <div id="cuadro1" class="table-responsive cajita">
                                        <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                            <tr>
                                                <td colspan="4">
                                                    <div class=" text-light" id="motorestxt">Motores: +151.225 e</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                </td>
                                                <td>
                                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                </td>
                                                <td>
                                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                </td>
                                                <td>
                                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                </td>
                                                <td>
                                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                </td>
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
                                    <td>
                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    </td>
                                    <td>
                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    </td>
                                    <td>
                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    </td>
                                    <td>
                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td rowspan="4">
                        </td>
                        <td rowspan="2" colspan="2">
                            <div class=" text-light" id="motorestxt">Armas: -151.225 e</div>
                            <div class="slider" id="slider-color"></div>

                                <nav>
                                    <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                                        <a class="nav-item nav-link active" id="energia-tab" data-toggle="tab" href="#energia" role="tab" aria-controls="energia" aria-selected="true">
                                            Energía
                                        </a>
                                        <a class="nav-item nav-link " id="plasma-tab" data-toggle="tab" href="#plasma" role="tab" aria-controls="plasma" aria-selected="false" onclick="cambiaInvest('plasma')">
                                            Plasma
                                        </a>
                                        <a class="nav-item nav-link" id="balistica-tab" data-toggle="tab" href="#balistica" role="tab" aria-controls="balistica" aria-selected="false">
                                            Balística
                                        </a>
                                        <a class="nav-item nav-link" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-controls="ma" aria-selected="false">
                                            M-A
                                        </a>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade active" id="energia" role="tabpanel" aria-labelledby="energia-tab">
                                        <div class="row rounded ">
                                            <div class="col-12 ">
                                                <div id="cuadro1" class="table-responsive cajita">
                                                    <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                        <tr>
                                                            <td>
                                                                <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/ligera.jpg') }}" width="45" height="45" >
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/media.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/pesada.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/insertada.jpg') }}" width="45" height="45">
                                                            </td>
                                                            <td>
                                                                    <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/misil.jpg') }}" width="45" height="45">
                                                                </td>
                                                                <td>
                                                                        <img class="rounded invesEnergia" src="{{ asset('img/fotos armas/bomba.jpg') }}" width="45" height="45">
                                                                    </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                                <div class="row rounded">
                                    <div class="col-12 ">
                                        <div id="cuadro1" class="table-responsive cajita">
                                            <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                <tr>
                                                    <td colspan="4">
                                                        <div class=" text-light" id="motorestxt">Blindajes: -51.225 e</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                    </td>
                                                    <td>
                                                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                    </td>
                                                    <td>
                                                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                    </td>
                                                    <td>
                                                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                    </td>
                                                    <td>
                                                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <table>

                                    <tr>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                        </td>
                                        <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                    </tr>
                                </table>

                        </td>

                    </tr>
                    <tr>
                            <td colspan="2">
                                    <div class="row rounded">
                                        <div class="col-12 ">
                                            <div id="cuadro1" class="table-responsive cajita">
                                                <table class="table table-borderless borderless table-sm text-center anchofijo cajita" style="margin-top: 5px !important; ">
                                                    <tr>
                                                        <td colspan="4">
                                                            <div class=" text-light" id="motorestxt">Mejoras: +11.205 e</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                        </td>
                                                        <td>
                                                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                        </td>
                                                        <td>
                                                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                        </td>
                                                        <td>
                                                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                        </td>
                                                        <td>
                                                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="40" height="40">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                        <td rowspan="2" colspan="2">
                            <table>
                                <tr >
                                    @if ($diseño->cualidades->armasLigeras>0)
                                        @php
                                            $cantidad=$diseño->cualidades->armasLigeras;
                                            $multiplicador=1;
                                            if ($cantidad>6){
                                                $cantidad=celdasMaximas(6,$cantidad);
                                                $multiplicador=($diseño->cualidades->armasLigeras/$cantidad);
                                            }
                                            @endphp
                                        @for ($i = 6 ; $i >0; $i--)
                                            <td>
                                                @if ($i<=$cantidad)
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
                                        @php
                                            $cantidad=$diseño->cualidades->armasMedias;
                                            $multiplicador=1;
                                            if ($cantidad>6){
                                                $cantidad=celdasMaximas(6,$cantidad);
                                                $multiplicador=ceil ($diseño->cualidades->armasMedias/$cantidad);
                                            }

                                        @endphp
                                        @for ($i = 6 ; $i >0; $i--)
                                            <td>
                                                @if ($i<=$cantidad)
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
                                        @php
                                            $cantidad=$diseño->cualidades->armasPesadas;
                                            $multiplicador=1;
                                            if ($cantidad>6){
                                                $cantidad=celdasMaximas(6,$cantidad);
                                                $multiplicador=($diseño->cualidades->armasPesadas/$cantidad);
                                            }
                                            @endphp
                                        @for ($i = 6 ; $i >0; $i--)
                                            <td>
                                                @if ($i<=$cantidad)
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

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                                <table>
                                        <tr>
                                            <td colspan="4">
                                                <div class=" text-light" id="">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                            <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                    <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                                <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                        <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                    <td>
                                                            <div id="motores1" style="border: 1px solid white;"><img src="{{ asset('img/fotos armas/vacio.png') }}" width="40" height="40"></div>
                                                    </td>
                                                </tr>
                                    </table>
                        </td>

                    </tr>


                </table>
            </div>
        </div>
    </div>












    <script>
        /// barra de investigaciones
            var slider = document.getElementById('slider-color');

                noUiSlider.create(slider, {
                start: [ 10, 40, 80, 90 ],
                connect: [true, true, true, true, true],
                range: {
                    'min': [  0 ],
                    'max': [ 100 ]
                }
            });

            var classes = ['c-1-color', 'c-2-color', 'c-3-color', 'c-4-color', 'c-5-color'];

            for ( var i = 1; i < classes.length+1; i++ ) {
                $("div.noUi-connect:nth-child("+i+")").addClass(classes[i-1]);
            }

        ///


            var keyboardSlider = document.getElementById('keyboard');

            noUiSlider.create(keyboardSlider, {
                start: 0,
                step: 1,
                range: {
                    'min': -7,
                    'max': 7
                }
            });


            noUiSlider.create(document.getElementById('keyboard2'), {
                start: 0,
                step: 1,
                range: {
                    'min': -7,
                    'max': 7
                }
            });


        </script>
