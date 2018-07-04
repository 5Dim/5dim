@extends('juego.recursosFrame')
@section('content')

<div class="container-fluid">
<div class="container-fluid">

    <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center" >
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">Mina mineral nivel 30 (de 90)</td>
                        <td colspan="3" class="text-success text-center borderless align-middle">Termina: Hoy a las 20:20</td>
                        <td colspan="3" class="text-success text-center borderless align-middle">Tiempo: 0h 20m 50s</td>
                        <td colspan="2" class="text-success text-center borderless align-middle"><input type="number" class="" placeholder="Personal"></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90" height="90"></td>
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
                        <td class="anchofijo text-warning borderless">M-A</td>
                        <td class="anchofijo text-warning borderless">Munición</td>
                        <td class="anchofijo text-warning borderless">Personal</td>
                    </tr>
                    <tr>
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
                        <td class="anchofijo text-white borderless">99.999</td>
                    </tr>
                    <tr>
                            <td colspan="11" class="borderless">&nbsp;</td>

                            {{-- <td class="anchofijo text-white borderless">11.111</td>
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
                <table class="table table-sm table-borderless text-center">
                    <tr>
                        <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                        <td><button type="button" class="btn btn-outline-success btn-block btn-sm" disabled><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center" >
                    <tr>
                        <td colspan="4" class="text-success text-center borderless">Mina mineral nivel 40 (de 90)</td>
                        <td colspan="4" class="text-success text-center borderless">Termina: Hoy a las 20:20</td>
                        <td colspan="4" class="text-success text-center borderless">Tiempo: 0h 20m 50s</td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90" height="90"></td>
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
                        <td class="anchofijo text-warning borderless">M-A</td>
                        <td class="anchofijo text-warning borderless">Munición</td>
                        <td class="anchofijo text-warning borderless">Personal</td>
                    </tr>
                    <tr>
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
                        <td class="anchofijo text-white borderless">99.999</td>
                    </tr>
                    <tr>
                            <td colspan="11" class="borderless">&nbsp;</td>

                            {{-- <td class="anchofijo text-white borderless">11.111</td>
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
                <table class="table table-sm table-borderless text-center">
                    <tr>
                        <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                        <td><button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                        <td><input type="number" class="" placeholder="Personal"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row rounded" style="background-image: url('http://localhost/img/elJuego/skin0/cons-fondo2.png'); border: 1px solid orange; margin-top: 5px;">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center" >
                    <tr>
                        <td colspan="4" class="text-success text-center borderless">Mina mineral nivel 40 (de 90)</td>
                        <td colspan="4" class="text-success text-center borderless">Termina: Hoy a las 20:20</td>
                        <td colspan="4" class="text-success text-center borderless">Tiempo: 0h 20m 50s</td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90" height="90"></td>
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
                        <td class="anchofijo text-warning borderless">M-A</td>
                        <td class="anchofijo text-warning borderless">Munición</td>
                        <td class="anchofijo text-warning borderless">Personal</td>
                    </tr>
                    <tr>
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
                        <td class="anchofijo text-white borderless">99.999</td>
                    </tr>
                    <tr>
                            <td colspan="11" class="borderless">&nbsp;</td>

                            {{-- <td class="anchofijo text-white borderless">11.111</td>
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
                <table class="table table-sm table-borderless text-center">
                    <tr>
                        <td><button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="fa fa-trash"></i> Reciclar</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-info-circle"></i> Datos</button></td>
                        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-play"></i> Producir</button></td>
                        <td><button type="button" class="btn btn-outline-success btn-block btn-sm" disabled><i class="fa fa-arrow-alt-circle-up "></i> Construir</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection