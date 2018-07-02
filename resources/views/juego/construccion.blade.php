
@extends('juego.recursosFrame')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-1">
            <img src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90" height="90">
        </div>
        <div class="col-11">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-hover table-borderless table-sm text-center">
                    <tr>
                        <td colspan="4" class="text-primary  borderless">Mina mineral nivel 40 (de 90)</td>
                        <td colspan="3" class="text-primary  borderless">Termina: Hoy a las 20:20</td>
                        <td colspan="3" class="text-primary  borderless">Tiempo: 0h 20m 50s</td>
                    </tr>
                    <tr>
                        <td  class="text-warning borderless">Mineral</td>
                        <td  class="text-warning borderless">cristal</td>
                        <td  class="text-warning borderless">Gas</td>
                        <td  class="text-warning borderless">Plástico</td>
                        <td  class="text-warning borderless">Cerámica</td>
                        <td  class="text-warning borderless">Liquido</td>
                        <td  class="text-warning borderless">Micros</td>
                        <td  class="text-warning borderless">Fuel</td>
                        <td  class="text-warning borderless">M-A</td>
                        <td  class="text-warning borderless">Munición</td>
                        <td  class="text-warning borderless">Personal</td>
                    </tr>
                    <tr>
                        <td  class="text-white borderless">11111</td>
                        <td  class="text-white borderless">11111</td>
                        <td  class="text-white borderless">2222</td>
                        <td  class="text-white borderless">3333</td>
                        <td  class="text-white borderless">444</td>
                        <td  class="text-white borderless">555</td>
                        <td  class="text-white borderless">666</td>
                        <td  class="text-white borderless">777</td>
                        <td  class="text-white borderless">88888</td>
                        <td  class="text-white borderless">99999</td>
                        <td  class="text-white borderless">99999</td>
                    </tr>
                    <tr>
                        <td  class="text-secondary borderless">11111</td>
                        <td  class="text-secondary borderless">11111</td>
                        <td  class="text-secondary borderless">2222</td>
                        <td  class="text-secondary borderless">3333</td>
                        <td  class="text-secondary borderless">444</td>
                        <td  class="text-secondary borderless">555</td>
                        <td  class="text-secondary borderless">666</td>
                        <td  class="text-secondary borderless">777</td>
                        <td  class="text-secondary borderless">88888</td>
                        <td  class="text-secondary borderless">99999</td>
                        <td  class="text-secondary borderless">99999</td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="col-12">
                <div id="cuadro1" class="table-responsive-sm">
                    <table class="table table-hover table-sm table-borderless">
                        <tr>
                            <td  ><button type="button" class="btn btn-outline-danger btn-block">Reciclar</button></td>
                            <td  ><button type="button" class="btn btn-outline-primary btn-block">Datos</button></td>
                            <td  ><button type="button" class="btn btn-outline-primary btn-block">Producir</button></td>
                            <td  ><button type="button" class="btn btn-outline-success btn-block">Construir</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection