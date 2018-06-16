<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- custom.css -->
    <link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- custom.js -->
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <div class="container">
        @yield('container')
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Quinta dimension</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">El juego</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">5Dim</h1>
                        <p class="intro-text text-info">5D es un juego masivo online novedoso, de estrategia, persistente y gratuito; jugable a través de tu navegador de internet, que te permitirá conocer a miles de jugadores y competir con ellos para ser el mejor jugando como más te guste.</p>
                            <a href="#about" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated text-info"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About Grayscale</h2>
                    <p>Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download
                        the template on
                        <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
                    <p>This theme features stock photos by
                        <a href="http://gratisography.com/">Gratisography</a>
                        along with a custom Google Maps skin courtesy of
                        <a href="http://snazzymaps.com/">Snazzy Maps</a>.</p>
                    <p>Grayscale includes full HTML, CSS, and custom JavaScript files along with SASS and LESS files for easy
                        customization!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section content-section text-center">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2>Download Grayscale</h2>
                <p>You can download Grayscale for free on the preview page at Start Bootstrap.</p>
                <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Visit Download Page</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact Start Bootstrap</h2>
                    <p>Feel free to leave us a comment on the
                        <a href="http://startbootstrap.com/template-overviews/grayscale/">Grayscale template overview page</a>
                        on Start Bootstrap to give some feedback about this theme!</p>
                    <ul class="list-inline banner-social-buttons">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-twitter fa-fw"></i>
                                <span class="network-name">Twitter</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-github fa-fw"></i>
                                <span class="network-name">Github</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg">
                                <i class="fa fa-google-plus fa-fw"></i>
                                <span class="network-name">Google+</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2018</p>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery/jquery.easing.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- Custom JavaScript for this template -->
    <script src="{{ asset('js/grayscale.min.js') }}" type="text/javascript"></script>
</body>
</html>