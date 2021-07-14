@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container">
        <h1 class="text-warning text-center mb-3">Opciones de usuario</h1>
        <form method="POST" action="{{ route('guardarJugador') }}">
            @csrf
            <div class="cajita p-3">
                <h3 class="text-success text-left">Jugador</h3>
                <div class="row">
                    <div class="col-1 text-light text-center">Avatar:</div>
                    <div class="form-floating col-10">
                        <input style="width: 100%;" type="text" class="input" id="avatar" name="avatar" aria-describedby="avatar" value="{{ Auth::user()->jugador->avatar }}">
                    </div>
                </div>
            </div>
            @foreach ($planetasJugador as $planeta)
                <div class="cajita">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-success text-center">{{ $planeta->nombre }} ({{ $planeta->estrella }}x{{ $planeta->orbita }})</h4>
                        </div>
                        <div class="col-1 text-light text-center">Color:</div>
                        <div class="col-1">
                            <div class="text-center align-left">
                                {{-- <label for="{{ $planeta->id . "color" }}" class="form-label text-light">Color</label> --}}
                                <input type="color" class=" form-control-color"
                                    id="{{ $planeta->id . 'color' }}" name="{{ $planeta->id . 'color' }}"
                                    value="{{ $planeta->color }}" title="Elige tu color">
                            </div>
                        </div>
                        <div class="col-1 text-light text-center">Orden:</div>
                        <div class="col-1">
                            <div class="form-floating text-center align-middle">
                                <input style="width: 50px;" type="text" class="input form-control-sm" id="{{ $planeta->id . 'orden' }}"
                                    name="{{ $planeta->id . 'orden' }}" value="{{ $planeta->orden }}"
                                    aria-describedby="{{ $planeta->id . 'orden' }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cajita p-3">
                    <h3 class="text-success text-left">Varios</h3>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="mensajesFlota" name="mensajesFlota"
                        {{ Auth::user()->jugador->mensajes_flota ? 'checked' : '' }}>
                    <label class="form-check-label text-light" for="mensajesFlota">Avisar de los mensajes de
                        flota</label>
                </div>
            </div>
            <div class="cajita p-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
    </div>
@endsection
