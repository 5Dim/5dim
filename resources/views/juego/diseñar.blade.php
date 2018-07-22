@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @include ('juego.tablaDaños', [
                'diseño' => $diseño,
            ])
            @include ('juego.tablaResumenDiseños', [
                'diseño' => $diseño,
            ])
            @include ('juego.tablaArmas', [
                'diseño' => $diseño,
            ])
            <div class="text-center">
                <img class="rounded" src="{{ asset('img/fotos naves/skin1/nave' . $diseño->id . '.jpg') }}">
            </div>
        </div>
    </div>
@endsection