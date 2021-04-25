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
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/principal/disenio.png" class="d-block w-100" alt="...">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Diseña tus propias naves</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/principal/construccion.png" class="d-block w-100" alt="...">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Evoluciona tus colonias</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
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
                <img src="img/principal/observacion.jpg" class="" alt="..." style="height: 260px;">

                <h2 class="text-light">Astrometria</h2>
                <p class="text-light">El universo de 5Dim está en constante crecimiento y expansión por lo que es necesario
                    una herramienta que nos permita ver todo lo que ocurre en este universo. Esta herramienta es la
                    Astrometría.</p>
                {{-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> --}}
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img src="img/principal/cons.jpg" class="" alt="..." style="height: 260px;">

                <h2 class="text-light">Construccion</h2>
                <p class="text-light">Podrás tener la flota más poderosa del universo, pero si no pagas a tus soldados, las
                    flotas se quedarán en el puerto y los pilotos se negarán a acatar tus órdenes.</p>
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
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Coloniza y expande tu imperio. <span class="text-muted">Todo lo que puedas
                        ver.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose
                    here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Diseña tus propios fuselajes. <span class="text-muted">Naves de carga o de
                        guerra?</span>
                </h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this
                    layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Conquista el universo. <span class="text-muted">Elige tu camino.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really
                    intended to be actually read, simply here to give you a better view of what this would look like with
                    some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

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
                <section class="mb-4">
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
                            class="fab fa-github"></i></a> --}}
                </section>
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
