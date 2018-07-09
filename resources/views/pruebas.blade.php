@extends('juego.recursosFrame') 
@section('content')
<script>
    $( document ).ready(function() {
        var recursos = {!! json_encode($recursos->toArray()) !!};
        console.log(recursos);
        var produccion = {!! json_encode($producciones->toArray()) !!};
        console.log(produccion);
        var almacenes = {!! json_encode($almacenes) !!};
        console.log(almacenes);
        var colaConstruccion = {!! json_encode($colaConstruccion) !!};
        console.log(colaConstruccion);
        var construcciones = {!! json_encode($construcciones->toArray()) !!};
        console.log(construcciones);
        activarIntervalo(recursos, almacenes, produccion, 250);
    });

</script>
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaConstruccion) == 0)
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
@endsection