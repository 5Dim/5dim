@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                        aria-controls="general" aria-selected="false" onclick="tabsGeneral('general-tab')">
                        General
                    </a>
                    {{-- <a class="nav-item nav-link" id="eventos-tab" data-bs-toggle="tab" href="#eventos" role="tab"
                        aria-controls="eventos" aria-selected="true" onclick="tabsGeneral('eventos-tab')">
                        Eventos y misiones
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                    @if (false)
                        <div class="alert alert-danger cajita-danger" role="alert">
                            <h4 class="alert-heading">Final de la ronda</h4>
                            <p>La ronda terminará el dia 10 de julio de 2021.</p>
                            <p>Disfruta del juego, y gracias por participar en la versión alpha de 5dim.es.</p>
                        </div>
                    @else
                        <div class="alert alert-success cajita-success text-light" role="alert">
                            <h4 class="alert-heading">Bienvenidos a una version V0.5 de 5Dim.es</h4>
                            <p> Ahí van unos consejos de inicio:</p>
                            <ul>
                                <li>
                                    Si acabas de entrar y no te gusta tu posición de inicio,<span class="text-warning"> puedes mover  tu colonia </span>
                                    desde el menu de planeta (una sola vez), poniendo una posición vacía del mapa.
                                </li>
                                <li>
                                    Todo lo relacionado con combates NO está implementado, de modo que no investigues ni
                                    diseñes con armas o blindajes.
                                </li>
                                <li>
                                    Céntrate al inicio en subir las minas de tu planeta inicial, priorizando el mineral.
                                </li>
                                <li>
                                    Construir una nave con recolección y mandarla a recolectar en los asteroides que tienes al lado de tu
                                    planeta es una buena idea una vez puedas permitirte construirla.
                                </li>
                                <li>
                                    Colonizar planetas cercanos es una buena opción, puedes hacerlo incluso con una sonda
                                    ya que es muy barata.
                                </li>
                                <li>
                                    Además puedes mandar una sonda (con combustible) a orbitar otras estrellas fuera de tu
                                    visión, ya que también da algo de visión.
                                </li>
                                <li>
                                    Crear una alianza o aliarte con amigos es muy buena idea ya que las tecnologías se
                                    comparten de forma automática.
                                </li>
                                <li>
                                    Las naves se mejoran automaticamente cada vez que subes una tecnología.
                                </li>
                                <li>
                                    Subir la tecnología de fuselajes es siempre muy rentable, pero ten en cuenta que las
                                    naves mas avanzadas son mas caras de construir.
                                </li>
                                <li>
                                    Si tienes preguntas no dudes en conectarte nuestro canal de <a href='https://discord.gg/2BB7JV48'class="btn btn-outline-success"><i class="fab fa-discord"></i> Discord</a>.
                                </li>
                            </ul>

                            <p>Disfruta del juego, y gracias por participar en la versión alpha de 5dim.es.</p>
                        </div>
                    @endif
                </div>
                {{-- <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                    <div class="alert alert-info cajita-info" role="alert">
                        <h4 class="alert-heading">Versión final V1.0</h4>
                        <p>Piratas gestionados por la IA.</p>
                    </div>
                </div> --}}
            </div>
        </div>

        <script>
            mostrarTab(@json($tab));
        </script>
    @endsection
