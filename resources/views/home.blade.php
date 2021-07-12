@extends('principal.layout')

@section('content')
    <div class="container">
        <div class="alert alert-dark" role="alert" style="margin-top: 100px">
            <h2 class="text-center fs-1">Ronda 2021 V0.5</h2>
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
                        <td>16/07/2021</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de finalización del universo (prevista)</th>
                        <td>30/12/2021</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <p class="d-grid gap-2 d-md-flex justify-content-md-end">
                <span class="text-danger borderless">  </span>

                <button type="button" class="btn btn-dark me-md-2" onclick="location.href='{{ url('/juego/construccion') }}'">
                    Entrar (Cierre ronda actual el miércoles 14-7-2021, apertura viernes 16-7-2021)
                </button>
            </p>
        </div>
        <div class="alert alert-success" role="alert"  style="text-align: left !important;">
            <h4 class="alert-heading">Cambios en la versión alfa V0.5</h4>
            <ul >
                <li>Alianzas: ya no disponen de jugador ni planetas.</li>
                <li>Estadísticas: ahora se calculan por recursos gastados, los recursos mas valiosos dan mas puntos.</li>
                <li>Investigaciones: cuestan mas cuanto mas miembros tienen.</li>
                <li>Politicas: Modifican parámetros de juego, de lunes a miercoles se proponen politicas, de miercoles a domingo se votan, el domingo toman efecto. Los jugadores con mas puntos disponen de mas votos.</li>
                <li>Puntos de victoria: Se ganan por permanecer arriba en las estadísticas, se actualizan cada 1h.</li>
                <li>Interface: nueva interface.</li>
                <li>Rutas predefinidas: Se pueden crear rutas predefinidas para nuestras flotas.</li>
                <li>Universo: generación de universo con mas objetos.</li>
                <li>Bugfixes: correcciones varias y mejoras de optimización en los cálculos</li>
            </ul>
        </div>
        <div class="alert alert-warning" role="alert"  style="text-align: left !important;">
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
        <div class="alert alert-danger" role="alert"  style="text-align: left !important;">
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
