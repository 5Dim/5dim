@extends('principal.layout')

@section('content')
    <div class="container">
        <div class="alert alert-dark" role="alert" style="margin-top: 100px">
            <h2 class="text-center fs-1">Ronda 2022</h2>
            <hr>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Opcion</th>
                        <th scope="col">Configuracion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Creación del universo</th>
                        <td>01/01/2022</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de finalización del universo (prevista)</th>
                        <td>30/12/2022</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <p class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-dark me-md-2" onclick="location.href='{{ url('/juego/construccion') }}'">
                    Entrar
                </button>
            </p>
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Disponible en la versión actual alfa V0.1</h4>
            <ul >
                <li >Construcción en planetas.</li>
                <li>Investigaciones.</li>
                <li>Diseño y construcción de naves.</li>
                <li>Alianzas.</li>
                <li>Mapa Astrometría dinámico.</li>
                <li>Movimientos de flotas con todas las misiones menos combate.</li>
            </ul>
        </div>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Para la siguiente versión beta V0.9</h4>
            <ul>
                <li >Todo lo relacionado con combates.</li>
                <li>Aplicación de areas de influencia.</li>
                <li>Universo ampliado.</li>
                <li>Planetas especiales y especializados, construcciones orbitales.</li>
                <li>Inclusión de gastos de mantenimiento y banco.</li>
                <li>Personalización del usuario.</li>
            </ul>
        </div>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Versión final V1.0</h4>
            <ul>
                <li >Piratas gestionados por la IA.</li>
                <li>Tutoriales.</li>
                <li>Misiones y eventos.</li>
                <li>Votaciónes de politicas que modifican el juego.</li>
                <li>Red de agujeros de gusano.</li>
                <li>Condiciones de fin de ronda.</li>
            </ul>
        </div>
    </div>
@endsection
