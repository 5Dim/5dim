@extends('juego.layouts.recursosFrame')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="col-12 rounded cajita">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless table-sm text-center " style="margin-top: 5px !important">
                    <tr>
                        <th colspan="5" class=" text-success">
                            <big>
                                Estadisticas
                            </big>
                        </th>
                    </tr>
                    <tr>
                        <th class="text-warning align-middle">
                            Posicion
                        </th>
                        <th class=" text-warning align-middle">
                            Avatar
                        </th>
                        <th class=" text-warning align-middle">
                            Nombre
                        </th>
                        <th class=" text-warning align-middle">
                            Alianza
                        </th>
                        <th class=" text-warning align-middle">
                            Puntos
                        </th>
                    </tr>
                    @foreach ($jugadores as $jugador)
                    <tr>
                        <td class=" text-light align-middle">
                            {{ $loop->iteration }}
                        </td>
                        <td class=" text-light align-middle">
                            <img class="rounded" src="{{ $jugador->avatar }}" width="60" height="60">
                        </td>
                        <td class=" text-light align-middle">
                            {{ $jugador->nombre }}
                        </td>
                        <td class=" text-light align-middle">
                            {{ !empty($jugador->alianzas_id) ? '[' . $alianzas->where('id', $jugador->alianzas_id)->first()->tag . '] ' . $alianzas->where("id", $jugador->alianzas_id)->first()->nombre : '' }}
                        </td>
                        <td class=" text-light align-middle">
                            {{ number_format($jugador->puntos_construccion + $jugador->puntos_investigacion, 0,",",".") }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
