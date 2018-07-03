<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5Dim</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />

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
    <!-- NavBar -->
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
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#login">Login/Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#juego">El juego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">5Dim</h1>
                        <p class="intro-text text-info">5D es un juego masivo online novedoso, de estrategia, persistente y gratuito; jugable a través de
                            tu navegador de internet, que te permitirá conocer a miles de jugadores y competir con ellos
                            para ser el mejor jugando como más te guste.</p>
                        <a href="#login" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated text-info"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Login -->
    <section id="login" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Accede a tu cuenta</h2>
                    <div class="nav nav-tabs" id="login" role="tablist">
                        <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login"
                            aria-selected="true">Login</a>
                        <a class="nav-item nav-link" id="nav-registro-tab" data-toggle="tab" href="#nav-registro" role="tab" aria-controls="nav-registro"
                            aria-selected="false">Registro</a>
                    </div>
                    <div class="tab-content" id="loginContent">
                        <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                                required> @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                required> @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Entrar
                                            </button>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                ¿Olvidaste la contraseña?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-registro" role="tabpanel" aria-labelledby="nav-registro-tab">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    <p>Es imprescindible que facilites una cuenta de correo a la que tengas acceso para poder
                                        completar el registro.</p>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                                required autofocus> @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                                required> @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                required> @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Juego Section -->
    <section id="juego" class="download-section content-section text-center">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2>El juego</h2>
                <ul class="nav nav-tabs" id="juego" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-info active" id="astrometria-tab" data-toggle="tab" href="#astrometria" role="tab" aria-controls="astrometria"
                            aria-selected="true">Astrometria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="economia-tab" data-toggle="tab" href="#economia" role="tab" aria-controls="economia" aria-selected="false">Economia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" id="flota-tab" data-toggle="tab" href="#flota" role="tab" aria-controls="flota" aria-selected="false">Flota</a>
                    </li>
                </ul>
                <div class="tab-content" id="juegoContent">
                    <div class="tab-pane fade show active" id="astrometria" role="tabpanel" aria-labelledby="astrometria-tab">
                        <p>
                            El universo de 5Dim está en constante crecimiento y expansión por lo que es necesario una herramienta que nos permita ver
                            todo lo que ocurre en este universo. Esta herramienta es la Astrometría.
                        </p>
                        <p>
                            Con la Astrometría podemos ver la distribución de los sistemas solares y las flotas en vuelo, además de añadir unas funciones
                            avanzadas que complementan la información disponible. Entre estas funciones se encuentran la
                            localización y búsqueda de sistemas solares y flotas, límite de visión de nuestros observatorios,
                            creación de notas recordatorias a lo largo del mapa del universo y algunas más.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="economia" role="tabpanel" aria-labelledby="economia-tab">
                        <p>
                            La economía te permitirá avanzar con paso firme si consigues el equilibrio perfecto. No es fácil, lo sabemos, pero en 5DIM
                            es suficiente con tener un poco de sentido común, no gastes lo que no tienes y no te endeudes
                            mas allá de lo que puedas recuperar en un vuelo. Dispones de una modena propia y estaciones de
                            comercio que te ofrecerán grandes oportunidades de compra.
                        </p>
                        <p>
                            Podrás tener la flota más poderosa del universo, pero si no pagas a tus soldados, las flotas se quedarán en el puerto y los
                            pilotos se negarán a acatar tus órdenes.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="flota" role="tabpanel" aria-labelledby="flota-tab">
                        <p>
                            La gestión de las flotas será un factor clave para el desarrollo de tus colonias. Tendrás a tu disposición desde los más
                            pequeños cazas a las naves mas grandes jamás soñadas, las nodrizas son la culminación del desarrollo
                            de tecnología e investigación militar.
                        </p>
                        <p>
                            En 5DIM no hay límites en cuanto a lo que puedes hacer con tus flotas, no hay más límites que los que te imponga tu propio
                            desarrollo. Las flotas te permitirán controlar al resto de jugadores y puede que hasta el mismo
                            universo, pero si no las gestionas con astucia, serás aniquilado por otros jugadores sedientos
                            de gloria.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contacto Section -->
    <section id="contacto" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contacto</h2>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery/jquery.easing.min.js') }}" type="text/javascript"></script>

    <!-- Custom JavaScript for this template -->
    <script src="{{ asset('js/grayscale.min.js') }}" type="text/javascript"></script>
</body>

</html>