@extends('juego.recursosFrame') 
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaConstruccion) > 0)
        <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
            <div class="col-12">
                <div id="cuadro1" class="table-responsive-sm">
                    <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-bottom: 15px !important;">
                        <tr>
                            <td class=" text-warning">Edificio</td>
                            <td class=" text-warning">Accion</td>
                            <td class=" text-warning">Nivel</td>
                            <td class=" text-warning">Personal</td>
                            <td class=" text-warning">Empeza a las</td>
                            <td class=" text-warning">Acaba a las</td>
                            <td>&nbsp;</td>
                        </tr>
                        @for ($i = 0 ; $i
                        < count($colaConstruccion) ; $i++) <tr>
                            <td class=" text-light align-middle borderless">{{ trans('construccion.' . $colaConstruccion[$i]->construcciones->codigo) }}</td>
                            <td class=" text-success align-middle borderless">{{ $colaConstruccion[$i]->accion }}</td>
                            <td class=" text-light align-middle borderless">{{ $colaConstruccion[$i]->nivel }}</td>
                            <td class=" text-light align-middle borderless">{{ number_format($colaConstruccion[$i]->personal, 0,",",".") }}</td>
                            <td class=" text-light align-middle borderless">{{ $colaConstruccion[$i]->created_at }}</td>
                            <td class=" text-light align-middle borderless">{{ $colaConstruccion[$i]->finished_at }}</td>
                            <td class=" text-light align-middle borderless"><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Cancelar</button></td>
                            </tr>
                            @endfor
                    </table>
                </div>
            </div>
        </div>
        @endif

        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link  active" id="mina-tab" data-toggle="tab" href="#mina" role="tab" aria-controls="mina" aria-selected="true">
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
                < 5 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive-sm">
                            <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                                <tr>
                                    <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel
                                        }} (de 90)</td>
                                    <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                                    <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                                    <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1"
                                        placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                                </tr>
                                <tr>
                                    <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                            width="90" height="90"></td>
                                    <td colspan="11" class="borderless">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                                    <td class="anchofijo text-muted borderless">Fuel</td>
                                    <td class="anchofijo text-muted borderless">M-A</td>
                                    <td class="anchofijo text-muted borderless">Munición</td>
                                    <td class="anchofijo text-muted borderless">Personal</td>
                                </tr>
                                <tr>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                                        {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                                    </td>
                                    <td class="anchofijo text-white borderless"></td>
                                    <td class="anchofijo text-muted borderless"></td>
                                    <td class="anchofijo text-muted borderless"></td>
                                    <td class="anchofijo text-white borderless"></td>
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
            < 11 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
                <div class="col-12">
                    <div id="cuadro1" class="table-responsive-sm">
                        <table class="table table-borderless borderless table-sm text-center anchofijo">
                            <tr>
                                <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel
                                    }} (de 90)</td>
                                <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                                <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                                <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1"
                                        placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                            </tr>
                            <tr>
                                <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                        width="90" height="90"></td>
                                <td colspan="11" class="borderless">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                                <td class="anchofijo text-muted borderless">Fuel</td>
                                <td class="anchofijo text-muted borderless">M-A</td>
                                <td class="anchofijo text-muted borderless">Munición</td>
                                <td class="anchofijo text-muted borderless">Personal</td>
                            </tr>
                            <tr>
                                <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                                    {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                                </td>
                                <td class="anchofijo text-white borderless"></td>
                                <td class="anchofijo text-muted borderless"></td>
                                <td class="anchofijo text-muted borderless"></td>
                                <td class="anchofijo text-white borderless"></td>
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
        < 21 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
            <div class="col-12">
                <div id="cuadro1" class="table-responsive-sm">
                    <table class="table table-borderless borderless table-sm text-center anchofijo">
                        <tr>
                            <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel
                                }} (de 90)</td>
                            <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                            <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                            <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1" placeholder="personal"
                                placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                            </tr>
                        <tr>
                            <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                    width="90" height="90"></td>
                            <td colspan="11" class="borderless">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                            <td class="anchofijo text-muted borderless">Fuel</td>
                            <td class="anchofijo text-muted borderless">M-A</td>
                            <td class="anchofijo text-muted borderless">Munición</td>
                            <td class="anchofijo text-muted borderless">Personal</td>
                        </tr>
                        <tr>
                            <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                                {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                            </td>
                            <td class="anchofijo text-white borderless"></td>
                            <td class="anchofijo text-muted borderless"></td>
                            <td class="anchofijo text-muted borderless"></td>
                            <td class="anchofijo text-white borderless"></td>
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
    @for ($i = 21 ; $i
    < 26 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo">
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel }}
                            (de 90)</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                        <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1" placeholder="personal"
                            placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                        </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                width="90" height="90"></td>
                        <td colspan="11" class="borderless">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                        <td class="anchofijo text-muted borderless">Fuel</td>
                        <td class="anchofijo text-muted borderless">M-A</td>
                        <td class="anchofijo text-muted borderless">Munición</td>
                        <td class="anchofijo text-muted borderless">Personal</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo text-white borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-white borderless"></td>
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
<div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
    @for ($i = 26 ; $i
    < 29 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo">
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel }}
                            (de 90)</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                        <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1" placeholder="personal"
                            placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                        </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                width="90" height="90"></td>
                        <td colspan="11" class="borderless">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                        <td class="anchofijo text-muted borderless">Fuel</td>
                        <td class="anchofijo text-muted borderless">M-A</td>
                        <td class="anchofijo text-muted borderless">Munición</td>
                        <td class="anchofijo text-muted borderless">Personal</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo text-white borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-white borderless"></td>
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
<div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
    @for ($i = 29 ; $i
    < 31 ; $i++) <div class="row rounded" style="background-image: url('http://localhost/img/juego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo">
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construcciones[$i]->codigo) }} nivel {{ $construcciones[$i]->nivel }}
                            (de 90)</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construcciones[$i]->codigo }}">Termina:</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construcciones[$i]->codigo }}">Tiempo:</td>
                        <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construcciones[$i]->codigo }}" type="number" class="personal1" placeholder="personal"
                            placeholder="personal" value="{{$recursos->personal}}" onkeyup="calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}') "></td>
                        </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construcciones[$i]->codigo . '.jpg') }}"
                                width="90" height="90"></td>
                        <td colspan="11" class="borderless">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                        <td class="anchofijo text-muted borderless">Fuel</td>
                        <td class="anchofijo text-muted borderless">M-A</td>
                        <td class="anchofijo text-muted borderless">Munición</td>
                        <td class="anchofijo text-muted borderless">Personal</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construcciones[$i]->coste->mineral == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->mineral > 0 ? number_format($construcciones[$i]->coste->mineral, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->cristal == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->cristal > 0 ? number_format($construcciones[$i]->coste->cristal, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->gas == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->gas > 0 ? number_format($construcciones[$i]->coste->gas, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->plastico == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->plastico > 0 ? number_format($construcciones[$i]->coste->plastico, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->ceramica == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->ceramica > 0 ? number_format($construcciones[$i]->coste->ceramica, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->liquido == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->liquido > 0 ? number_format($construcciones[$i]->coste->liquido, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo {{ $construcciones[$i]->coste->micros == 0 ? 'text-muted' : 'text-light' }} borderless">
                            {{ $construcciones[$i]->coste->micros > 0 ? number_format($construcciones[$i]->coste->micros, 0,",",".") : '' }}
                        </td>
                        <td class="anchofijo text-white borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-white borderless"></td>
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
</div>

</div>
</div>

<script>
$( document ).ready(function() {
    @for ($i = 0 ; $i
    < 31 ; $i++)
    calculaTiempo({{$construcciones[$i]->coste->mineral+$construcciones[$i]->coste->cristal+$construcciones[$i]->coste->gas+$construcciones[$i]->coste->plastico +$construcciones[$i]->coste->ceramica +$construcciones[$i]->coste->liquido + $construcciones[$i]->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construcciones[$i]->codigo}}')
    @endfor
});
    </script>

@endsection
