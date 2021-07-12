@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="construcciones-tab" data-bs-toggle="tab" href="#construcciones"
                        role="tab" aria-controls="construcciones" aria-selected="true"
                        onclick="tabsPolitica('construcciones-tab')">
                        Construcciones
                    </a>
                    <a class="nav-item nav-link" id="investigaciones-tab" data-bs-toggle="tab" href="#investigaciones"
                        role="tab" aria-controls="investigaciones" aria-selected="false"
                        onclick="tabsPolitica('investigaciones-tab')">
                        Investigaciones
                    </a>
                    <a class="nav-item nav-link" id="fuselajes-tab" data-bs-toggle="tab" href="#fuselajes" role="tab"
                        aria-controls="fuselajes" aria-selected="false" onclick="tabsPolitica('fuselajes-tab')">
                        Fuselajes
                    </a>
                    <a class="nav-item nav-link" id="universo-tab" data-bs-toggle="tab" href="#universo" role="tab"
                        aria-controls="universo" aria-selected="false" onclick="tabsPolitica('universo-tab')">
                        Universo
                    </a>
                    <a class="nav-item nav-link" id="instrucciones-tab" data-bs-toggle="tab" href="#instrucciones" role="tab"
                    aria-controls="instrucciones" aria-selected="false" onclick="tabsPolitica('instrucciones-tab')">
                    Instrucciones
                </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="construcciones" role="tabpanel" aria-labelledby="construcciones-tab">
                    @if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday')
                        @foreach ($politicaConstruccion as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaConstruccion as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="investigaciones" role="tabpanel" aria-labelledby="investigaciones-tab">
                    @if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday')
                        @foreach ($politicaInvestigacion as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaInvestigacion as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade " id="fuselajes" role="tabpanel " aria-labelledby="fuselajes-tab">
                    @if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday')
                        @foreach ($politicaFuselajes as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaFuselajes as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="universo" role="tabpanel" aria-labelledby="universo-tab">
                    @if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday')
                        @foreach ($politicaUniverso as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaUniverso as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="instrucciones" role="tabpanel" aria-labelledby="instrucciones-tab">
                    <div class="alert alert-success cajita-success text-light" role="alert">
                        <h4 class="alert-heading text-primary">Funcionamiento de la política</h4>
                        <p class="text-warning"> Fase de propuestas (Lunes a Miércoles):</p>
                        <ul>
                            <li>
                                Cada jugador puede proponer a la semnana para que que sólo una política de entre todos los apartados aumente o disminuya su valor.
                            </li>
                            <li>
                                De inicio todas las politicas parten de un estado 0, y pueden votarse en aumentar cada vez +1 o -1, siendo el máximo +3 y el mínimo -3
                            </li>
                        </ul>
                        <p class="text-warning"> Fase de votación (Jueves a Domingo):</p>
                        <ul>
                            <li>
                                Cada jugador puede votar una sola de las politícas propuestas, aportando todos sus votos a ella para que se apruebe.
                            </li>
                            <li>
                                La cantidad de votos de cada jugador es inversamente proporcional a su posición den las estadísticas. De tal forma si hay 100 jugadores el primer jugador tiene 100 votos y el último 1 voto.
                            </li>
                        </ul>
                        <p class="text-warning"> Fase de resolución (Domingo a última hora):</p>
                        <ul>
                            <li>
                                Las 2 políticas con mas votos serán aprobadas y sus efectos se producirán sobre todo el universo y todos los jugadores.
                            </li>
                            <li>
                                Se envia un mensaje a todos los jugadores con el resultado del a votación.
                            </li>
                        </ul>
                        <p class="text-warning"> Permanencia:</p>
                        <ul>
                            <li>
                                Al final de la ronda los jugadores con mas Puntos de Victoria (PV) decidirán que politicas modificadas se trasladan a la siguiente ronda.
                            </li>
                            <li>
                                En cualquier caso las politicas ayudan a los desarrolladores a saber como les gustaría a los jugadores que fuera el universo, y podrían pasar igualmente a otra ronda.
                            </li>
                            <li>
                                Hay muchisimas políticas, y unas pueden ser útiles en un momento y otras en otro. Igualmente unas pueden aumentarse en un momento del juego para luego disminuirse en otro.
                            </li>
                        </ul>
                        <p class="text-warning"> Consejos:</p>
                        <ul>
                            <li>
                                Proponer primero una cambio en una política una semana la bloquea para que no pueda ser propuesta en el otro sentido.
                            </li>
                            <li>
                                Igualmente proponer una politica cualquiera puede servir para evitar que esa semana salga una única propuesta.
                            </li>
                            <li>
                                Si tienes preguntas no dudes en conectarte nuestro canal de <a href='https://discord.gg/2BB7JV48'class="btn btn-outline-success"><i class="fab fa-discord"></i> Discord</a>.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script>
            mostrarTab(@json($tab));
        </script>
    @endsection
