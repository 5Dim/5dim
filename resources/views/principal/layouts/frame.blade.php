<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <link href="{{ asset('css/materialize/materialize.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/app.js') }}"></script>

</head>
<body>

    @yield('container')

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                <h5 class="white-text">Quinta Dimension (5Dim)</h5>
                <p class="grey-text text-lighten-4">Juego masivo multijugador</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Enlaces</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Discord</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                ©2018 Propiedad de 5dim
            </div>
          </div>
        </footer>
            
</body>
</html>