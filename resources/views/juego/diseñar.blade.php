@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @include ('juego.tablaDaños')
            @include ('juego.tablaResumenDiseños')
            @include ('juego.tablaArmas')
        </div>
    </div>
@endsection