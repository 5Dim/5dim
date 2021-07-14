@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container">
        <div class="col-12 rounded cajita">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-dark table-borderless text-center" style="--bs-table-bg: transparent !important">
                    <tr>
                        <th colspan="6" class=" text-success">
                            <big>
                                Estadísticas
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
                            Puntos totales
                        </th>
                        <th class=" text-warning align-middle">
                            Puntos de victoria
                        </th>
                    </tr>
                    @foreach ($jugadores as $jugador)
                        @if (Auth::user()->jugador->id == $jugador->id)
                            <tr>
                                <td class=" text-info align-middle">
                                    {{ $loop->iteration }}
                                </td>
                                <td class=" text-info align-middle">
                                    <img class="rounded" src="{{ $jugador->avatar }}" width="50" height="50">
                                </td>
                                <td class=" text-info align-middle">
                                    {{ $jugador->nombre }}
                                </td>
                                <td class=" text-info align-middle">
                                    {{ !empty($jugador->alianzas_id) ? '[' . $alianzas->where('id', $jugador->alianzas_id)->first()->tag . '] ' . $alianzas->where('id', $jugador->alianzas_id)->first()->nombre : '' }}
                                </td>
                                <td class=" text-info align-middle">
                                    {{ number_format($jugador->puntos_construccion + $jugador->puntos_investigacion + $jugador->puntos_flotas, 0, ',', '.') }}
                                </td>
                                <td class=" text-info align-middle">
                                    {{ number_format($jugador->puntos_victoria, 0, ',', '.') }}
                                </td>
                            </tr>
                        @elseif (Auth::user()->jugador->alianzas_id == $jugador->alianzas_id &&
                            !empty($jugador->alianzas))
                            <tr>
                                <td class=" text-success align-middle">
                                    {{ $loop->iteration }}
                                </td>
                                <td class=" text-success align-middle">
                                    <img class="rounded" src="{{ $jugador->avatar }}" width="50" height="50">
                                </td>
                                <td class=" text-success align-middle">
                                    {{ $jugador->nombre }}
                                </td>
                                <td class=" text-success align-middle">
                                    {{ !empty($jugador->alianzas_id) ? '[' . $alianzas->where('id', $jugador->alianzas_id)->first()->tag . '] ' . $alianzas->where('id', $jugador->alianzas_id)->first()->nombre : '' }}
                                </td>
                                <td class=" text-success align-middle">
                                    {{ number_format($jugador->puntos_construccion + $jugador->puntos_investigacion + $jugador->puntos_flotas, 0, ',', '.') }}
                                </td>
                                <td class=" text-success align-middle">
                                    {{ number_format($jugador->puntos_victoria, 0, ',', '.') }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class=" text-light align-middle">
                                    {{ $loop->iteration }}
                                </td>
                                <td class=" text-light align-middle">
                                    <img class="rounded" src="{{ $jugador->avatar }}" width="50" height="50">
                                </td>
                                <td class=" text-light align-middle">
                                    {{ $jugador->nombre }}
                                </td>
                                <td class=" text-light align-middle">
                                    {{ !empty($jugador->alianzas_id) ? '[' . $alianzas->where('id', $jugador->alianzas_id)->first()->tag . '] ' . $alianzas->where('id', $jugador->alianzas_id)->first()->nombre : '' }}
                                </td>
                                <td class=" text-light align-middle">
                                    {{ number_format($jugador->puntos_construccion + $jugador->puntos_investigacion + $jugador->puntos_flotas, 0, ',', '.') }}
                                </td>
                                <td class=" text-light align-middle">
                                    {{ number_format($jugador->puntos_victoria, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <span>
                    {{ $jugadores->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
