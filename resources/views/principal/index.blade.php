@extends('principal.layout')

@section('content')
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/principal/astrometria.png" class="d-block w-100" alt="...">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Astrometria</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/principal/disenio.png" class="d-block w-100" alt="...">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Diseña tus propias naves</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/principal/construccion.png" class="d-block w-100" alt="...">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Evoluciona tus colonias</h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4 align-center">
                <img src="img/principal/observacion.png" class="" alt="..." style="height: 260px;">

                <h2 class="text-light">Astrometria</h2>
                <p class="text-light">El universo de 5Dim está en constante crecimiento y expansión por lo que es necesario
                    una herramienta que nos permita ver todo lo que ocurre en este universo. Esta herramienta es la
                    Astrometría.</p>
                {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="img/principal/flota.png" class="" alt="..." style="height: 260px;">

                <h2 class="text-light">Flota</h2>
                <p class="text-light">La gestión de las flotas será un factor clave para el desarrollo de tus colonias.
                    Tendrás a tu disposición desde los más pequenios cazas a las naves mas grandes jamás soniadas, las
                    nodrizas son la culminación del de tecnología e investigación militar.</p>
                {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
                <img src="img/principal/cons.png" class="" alt="..." style="height: 260px;">

                <h2 class="text-light">Construccion</h2>
                <p class="text-light">Podrás tener la flota más poderosa del universo, pero si no pagas a tus soldados, las
                    flotas se quedarán en el puerto y los pilotos se negarán a acatar tus órdenes.</p>
                {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">&nbsp;&nbsp;Coloniza y expande tu imperio &nbsp;&nbsp; <span class="text-muted">No hay límites para tu ambición</span></h2>
                <p class="lead">Establece tus base productivas en planetas, mina asteroides, fabrica productos y construye naves civiles para mover mercancías.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/coloniza.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Comercia por todo el universo <span class="text-muted">Crea tus rutas comerciales</span></h2>
                <p class="lead">Establece tus lineas de abastecimiento entre tus colonias, comercia con otros jugadores.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/comercio.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">&nbsp;&nbsp; Combate para expandirte &nbsp;&nbsp;&nbsp; <span class="text-muted">Lucha contra otros jugadores</span></h2>
                <p class="lead">Defiende tus transportes o piratea las rutas de otros jugadores, intercepta flotas en tránsito y asalta planetas.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/combate.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Construye megaestructuras <span class="text-muted">Y construcciones orbitales especiales</span></h2>
                <p class="lead">Especializa tus colonias, construye enormes estructuras orbitales, combate por planetas únicos en la galaxia</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/nodriza.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Disfruta el juego con amigos <span class="text-muted">Sistema de alianzas único</span></h2>
                <p class="lead">Comparte imvestigaciones, colonias y flotas con tus aliados, trabaja en equipo y ganad la ronda en equipo.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/explora.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">&nbsp;&nbsp;&nbsp; Modifica las reglas del juego &nbsp;&nbsp;&nbsp;<span class="text-muted">Cuando el poder es mas que una gran flota</span></h2>
                <p class="lead">Modifica parámetros del juego mediante la proposición de politicas en un consejo galáctico, los jugadores mejor posicionados en las estadísticas poseen mas peso y poder en las votaciones</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/principal/politica.jpg" >
            </div>
        </div>


        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->

    </div>
    <!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <!-- Footer -->
        <footer class="text-center text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                {{-- <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-instagram"></i></a>
                    {{-- <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-github"></i></a>
                </section> --}}
                <!-- Section: Social media -->
                {{-- <!-- Grid container -->
                <div class="container p-4">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Footer Content</h5>

                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                                voluptatem veniam, est atque cumque eum delectus sint!
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Links</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-white">Link 1</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 2</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 3</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 4</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase mb-0">Links</h5>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="#!" class="text-white">Link 1</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 2</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 3</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Link 4</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Grid container -->


                <hr class="featurette-divider"> --}}

                <!-- Copyright -->
                <div class="text-center p-3">
                    © 2021 Copyright: 5Dim
                </div>
                <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </footer>
    </main>
@endsection
