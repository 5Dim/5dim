@extends('principal.layouts.frame')

@section('container')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="jumbotron bg-transparent text-center">
        <h1 class="display-4 text-white">Quinta Dimension</h1>
        <p class="lead text-white">5D es un juego masivo online novedoso, de estrategia, persistente y gratuito; jugable a través de tu navegador de internet, que te permitirá conocer a miles de jugadores y competir con ellos para ser el mejor jugando como más te guste.</p>
        <!-- <hr class="my-4"> -->
        <!-- <p class="text-white">It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-50 rounded mx-auto" src="{{ asset('img/principal/índice.jpg') }}" alt="Comercia">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-suave">Comercia</h5>
                    <p class="bg-suave">Variedad de recursos y objetos con los que comerciar, variando las necesidades de los jugadores según su estado o modo de juego</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-50 rounded mx-auto" src="{{ asset('img/principal/índice.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-suave">Comercia</h5>
                    <p class="bg-suave">Variedad de recursos y objetos con los que comerciar, variando las necesidades de los jugadores según su estado o modo de juego</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-50 rounded mx-auto" src="{{ asset('img/principal/índice.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-suave">Comercia</h5>
                    <p class="bg-suave">Variedad de recursos y objetos con los que comerciar, variando las necesidades de los jugadores según su estado o modo de juego</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <div class="card bg-transparent" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('img/principal/índice.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title text-white">Combate</h5>
            <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary text-white">Go somewhere</a>
        </div>
    </div>
@endsection