@extends('juego.recursosFrame') 
@section('content')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
            <div class="col-12">
                <div id="cuadro1" class="table-responsive-sm">
                    <table class="table table-borderless borderless table-sm text-center anchofijo" style="table-layout: fixed">
                        <tr>
                            <td class=" text-warning borderless">Edificio</td>
                            <td class=" text-warning borderless">Accion</td>
                            <td class=" text-warning borderless">Nivel</td>
                            <td class=" text-warning borderless">Personal</td>
                            <td class=" text-warning borderless">Duración</td>
                            <td class=" text-warning borderless">Acaba a las</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class=" text-light align-middle borderless">Mina de mineral</td>
                            <td class=" text-success align-middle borderless">Construyendo</td>
                            <td class=" text-light align-middle borderless">12</td>
                            <td class=" text-light align-middle borderless">12.254.325</td>
                            <td class=" text-light align-middle borderless">5m 33s</td>
                            <td class=" text-light align-middle borderless">23:05:22</td>
                            <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Cancelar</button></td>
                        </tr>
                        <tr>
                            <td class=" text-light align-middle borderless">Mina de cristal</td>
                            <td class=" text-danger align-middle borderless">Reciclando</td>
                            <td class=" text-light align-middle borderless">13</td>
                            <td class=" text-light align-middle borderless">12.254.325</td>
                            <td class=" text-light align-middle borderless">5m 33s</td>
                            <td class=" text-light align-middle borderless">23:05:22</td>
                            <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Cancelar</button></td>
                        </tr>
                        <tr>
                            <td class=" text-light align-middle borderless">Mina de mineral</td>
                            <td class=" text-danger align-middle borderless">Reciclando</td>
                            <td class=" text-light align-middle borderless">13</td>
                            <td class=" text-light align-middle borderless">12.254</td>
                            <td class=" text-light align-middle borderless">5m 33s</td>
                            <td class=" text-light align-middle borderless">23:10:55</td>
                            <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Cancelar</button></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <nav>
            <div class="nav nav-tabs text-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="mina-tab" data-toggle="tab" href="#mina" role="tab" aria-controls="mina" aria-selected="true">
                    Minas
                </a>
                <a class="nav-item nav-link" id="industria-tab" data-toggle="tab" href="#industria" role="tab" aria-controls="industria"
                    aria-selected="false">
                    Industrias
                </a>
                <a class="nav-item nav-link" id="almacenes-tab" data-toggle="tab" href="#almacenes" role="tab" aria-controls="almacenes"
                    aria-selected="false">
                    Almacenes
                </a>
                <a class="nav-item nav-link" id="militares-tab" data-toggle="tab" href="#militares" role="tab" aria-controls="militares"
                    aria-selected="false">
                    Militares
                </a>
                <a class="nav-item nav-link" id="desarrollo-tab" data-toggle="tab" href="#desarrollo" role="tab" aria-controls="desarrollo"
                    aria-selected="false">
                    Desarrollo
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion"
                    aria-selected="false">
                    Observacion
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                @for ($i = 0 ; $i
                < 5 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive-sm">
                            <table class="table table-borderless borderless table-sm text-center anchofijo">
                                <tr>
                                    <td colspan="4" class="text-success text-center borderless align-middle">{{ $construcciones[$i]->codigo }} nivel {{ $construcciones[$i]->nivel }} (de 90)</td>
                                    <td colspan="3" class="text-success text-center borderless align-middle">Termina: Hoy a las 20:20</td>
                                    <td colspan="3" class="text-success text-center borderless align-middle">Tiempo: 0h 20m 50s</td>
                                    <td colspan="2" class="text-success text-right borderless align-middle"><input type="number" class="personal1" placeholder="Personal"></td>
                                </tr>
                                <tr>
                                    <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90"
                                            height="90"></td>
                                    <td colspan="11" class="borderless">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="anchofijo text-warning borderless">Mineral</td>
                                    <td class="anchofijo text-warning borderless">cristal</td>
                                    <td class="anchofijo text-warning borderless">Gas</td>
                                    <td class="anchofijo text-warning borderless">Plástico</td>
                                    <td class="anchofijo text-warning borderless">Cerámica</td>
                                    <td class="anchofijo text-warning borderless">Liquido</td>
                                    <td class="anchofijo text-warning borderless">Micros</td>
                                    <td class="anchofijo text-warning borderless">Fuel</td>
                                    <td class="anchofijo text-muted borderless">M-A</td>
                                    <td class="anchofijo text-muted borderless">Munición</td>
                                    <td class="anchofijo text-warning borderless">Personal</td>
                                </tr>
                                <tr>
                                    <td class="anchofijo text-white borderless">11.111</td>
                                    <td class="anchofijo text-white borderless">11.111</td>
                                    <td class="anchofijo text-white borderless">2.222</td>
                                    <td class="anchofijo text-white borderless">3.333</td>
                                    <td class="anchofijo text-white borderless">444.000</td>
                                    <td class="anchofijo text-danger borderless">55.050</td>
                                    <td class="anchofijo text-white borderless">66.006</td>
                                    <td class="anchofijo text-white borderless">777.000</td>
                                    <td class="anchofijo text-muted borderless"></td>
                                    <td class="anchofijo text-muted borderless"></td>
                                    <td class="anchofijo text-white borderless">99.999</td>
                                </tr>
                                <tr>
                                    <td colspan="11" class="borderless">&nbsp;</td>

                                    {{--
                                    <td class="anchofijo text-white borderless">11.111</td>
                                    <td class="anchofijo text-white borderless">11.111</td>
                                    <td class="anchofijo text-white borderless">2.222</td>
                                    <td class="anchofijo text-white borderless">3.333</td>
                                    <td class="anchofijo text-white borderless">444.000</td>
                                    <td class="anchofijo text-white borderless">55.050</td>
                                    <td class="anchofijo text-white borderless">66.006</td>
                                    <td class="anchofijo text-white borderless">777.000</td>
                                    <td class="anchofijo text-white borderless">88.888</td>
                                    <td class="anchofijo text-white borderless">99.999</td>
                                    <td class="anchofijo text-white borderless">99.999</td> --}}
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 borderless">
                        <div id="cuadro1" class="table-responsive-sm ">
                            <table class="table table-sm table-borderless text-center anchofijo">
                                <tr>
                                    <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                                    <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                                    <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                                    <td><button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        <div class="tab-pane fade" id="industria" role="tabpanel" aria-labelledby="industria-tab">
            @for ($i = 5 ; $i
            < 11 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
                <div class="col-12">
                    <div id="cuadro1" class="table-responsive-sm">
                        <table class="table table-borderless borderless table-sm text-center anchofijo">
                            <tr>
                                <td colspan="4" class="text-success text-center borderless align-middle">{{ $construcciones[$i]->codigo }} nivel {{ $construcciones[$i]->nivel }} (de 90)</td>
                                <td colspan="3" class="text-success text-center borderless align-middle">Termina: Hoy a las 20:20</td>
                                <td colspan="3" class="text-success text-center borderless align-middle">Tiempo: 0h 20m 50s</td>
                                <td colspan="2" class="text-success text-right borderless align-middle"><input type="number" class="personal1" placeholder="Personal"></td>
                            </tr>
                            <tr>
                                <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90"
                                        height="90"></td>
                                <td colspan="11" class="borderless">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning borderless">Mineral</td>
                                <td class="anchofijo text-warning borderless">cristal</td>
                                <td class="anchofijo text-warning borderless">Gas</td>
                                <td class="anchofijo text-warning borderless">Plástico</td>
                                <td class="anchofijo text-warning borderless">Cerámica</td>
                                <td class="anchofijo text-warning borderless">Liquido</td>
                                <td class="anchofijo text-warning borderless">Micros</td>
                                <td class="anchofijo text-warning borderless">Fuel</td>
                                <td class="anchofijo text-muted borderless">M-A</td>
                                <td class="anchofijo text-muted borderless">Munición</td>
                                <td class="anchofijo text-warning borderless">Personal</td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-white borderless">11.111</td>
                                <td class="anchofijo text-white borderless">11.111</td>
                                <td class="anchofijo text-white borderless">2.222</td>
                                <td class="anchofijo text-white borderless">3.333</td>
                                <td class="anchofijo text-white borderless">444.000</td>
                                <td class="anchofijo text-danger borderless">55.050</td>
                                <td class="anchofijo text-white borderless">66.006</td>
                                <td class="anchofijo text-white borderless">777.000</td>
                                <td class="anchofijo text-muted borderless"></td>
                                <td class="anchofijo text-muted borderless"></td>
                                <td class="anchofijo text-white borderless">99.999</td>
                            </tr>
                            <tr>
                                <td colspan="11" class="borderless">&nbsp;</td>

                                {{--
                                <td class="anchofijo text-white borderless">11.111</td>
                                <td class="anchofijo text-white borderless">11.111</td>
                                <td class="anchofijo text-white borderless">2.222</td>
                                <td class="anchofijo text-white borderless">3.333</td>
                                <td class="anchofijo text-white borderless">444.000</td>
                                <td class="anchofijo text-white borderless">55.050</td>
                                <td class="anchofijo text-white borderless">66.006</td>
                                <td class="anchofijo text-white borderless">777.000</td>
                                <td class="anchofijo text-white borderless">88.888</td>
                                <td class="anchofijo text-white borderless">99.999</td>
                                <td class="anchofijo text-white borderless">99.999</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 borderless">
                    <div id="cuadro1" class="table-responsive-sm ">
                        <table class="table table-sm table-borderless text-center anchofijo">
                            <tr>
                                <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                                <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                                <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                                <td><button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div class="tab-pane fade" id="almacenes" role="tabpanel" aria-labelledby="almacenes-tab">
        @for ($i = 13 ; $i
        < 20 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
            <div class="col-12">
                <div id="cuadro1" class="table-responsive-sm">
                    <table class="table table-borderless borderless table-sm text-center anchofijo">
                        <tr>
                            <td colspan="4" class="text-success text-center borderless align-middle">{{ $construcciones[$i]->codigo }} nivel {{ $construcciones[$i]->nivel }} (de 90)</td>
                            <td colspan="3" class="text-success text-center borderless align-middle">Termina: Hoy a las 20:20</td>
                            <td colspan="3" class="text-success text-center borderless align-middle">Tiempo: 0h 20m 50s</td>
                            <td colspan="2" class="text-success text-right borderless align-middle"><input type="number" class="personal1" placeholder="Personal"></td>
                        </tr>
                        <tr>
                            <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90"
                                    height="90"></td>
                            <td colspan="11" class="borderless">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">Mineral</td>
                            <td class="anchofijo text-warning borderless">cristal</td>
                            <td class="anchofijo text-warning borderless">Gas</td>
                            <td class="anchofijo text-warning borderless">Plástico</td>
                            <td class="anchofijo text-warning borderless">Cerámica</td>
                            <td class="anchofijo text-warning borderless">Liquido</td>
                            <td class="anchofijo text-warning borderless">Micros</td>
                            <td class="anchofijo text-warning borderless">Fuel</td>
                            <td class="anchofijo text-muted borderless">M-A</td>
                            <td class="anchofijo text-muted borderless">Munición</td>
                            <td class="anchofijo text-warning borderless">Personal</td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-white borderless">11.111</td>
                            <td class="anchofijo text-white borderless">11.111</td>
                            <td class="anchofijo text-white borderless">2.222</td>
                            <td class="anchofijo text-white borderless">3.333</td>
                            <td class="anchofijo text-white borderless">444.000</td>
                            <td class="anchofijo text-danger borderless">55.050</td>
                            <td class="anchofijo text-white borderless">66.006</td>
                            <td class="anchofijo text-white borderless">777.000</td>
                            <td class="anchofijo text-muted borderless"></td>
                            <td class="anchofijo text-muted borderless"></td>
                            <td class="anchofijo text-white borderless">99.999</td>
                        </tr>
                        <tr>
                            <td colspan="11" class="borderless">&nbsp;</td>

                            {{--
                            <td class="anchofijo text-white borderless">11.111</td>
                            <td class="anchofijo text-white borderless">11.111</td>
                            <td class="anchofijo text-white borderless">2.222</td>
                            <td class="anchofijo text-white borderless">3.333</td>
                            <td class="anchofijo text-white borderless">444.000</td>
                            <td class="anchofijo text-white borderless">55.050</td>
                            <td class="anchofijo text-white borderless">66.006</td>
                            <td class="anchofijo text-white borderless">777.000</td>
                            <td class="anchofijo text-white borderless">88.888</td>
                            <td class="anchofijo text-white borderless">99.999</td>
                            <td class="anchofijo text-white borderless">99.999</td> --}}
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 borderless">
                <div id="cuadro1" class="table-responsive-sm ">
                    <table class="table table-sm table-borderless text-center anchofijo">
                        <tr>
                            <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                            <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                            <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                            <td><button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
    @endfor
</div>
<div class="tab-pane fade" id="militares" role="tabpanel" aria-labelledby="militares-tab">

</div>
<div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">

</div>
<div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">

</div>
</div>

</div>
</div>
@endsection