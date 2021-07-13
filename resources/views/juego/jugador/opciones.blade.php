@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container">
        <h1 class="text-warning text-center mb-3">Opciones de usuario</h1>
        <form method="POST" action="{{ route('guardarJugador') }}">
            @csrf
            <div class="cajita p-3">
                    <h3 class="text-success text-center">Jugador</h3>
                <div class="form-floating">
                    <input type="text" class="form-control" id="avatar" name="avatar" aria-describedby="avatar"
                        value="{{ Auth::user()->jugador->avatar }}">
                    <label for="avatar" class="form-label">Avatar</label>
                </div>
            </div>
            @foreach ($planetasJugador as $planeta)
                <div class="cajita p-3">
                    <h3 class="text-success text-center">{{ $planeta->nombre }}
                        ({{ $planeta->estrella }}x{{ $planeta->orbita }})</h3>
                    <div class="row">
                        <div class="col-1">
                            <div class="text-center align-middle">
                                {{-- <label for="{{ $planeta->id . "color" }}" class="form-label text-light">Color</label> --}}
                                <input type="color" class="form-control form-control-color"
                                    id="{{ $planeta->id . 'color' }}" name="{{ $planeta->id . 'color' }}"
                                    value="{{ $planeta->color }}" title="Elige tu color">
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-floating text-center align-middle">
                                <input type="text" class="form-control" id="{{ $planeta->id . 'orden' }}"
                                    name="{{ $planeta->id . 'orden' }}" value="{{ $planeta->orden }}"
                                    aria-describedby="{{ $planeta->id . 'orden' }}">
                                <label for="{{ $planeta->id . 'orden' }}" class="form-label">Orden</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cajita p-3">
                    <h3 class="text-success text-center">Varios</h3>
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
