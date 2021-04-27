@extends('juego.layouts.recursosFrame')

@section('content')
    {{-- <div class="container-fluid">
        <div class="container-fluid">
            <h2 class="text-success text-center">
                Tienda Quinta Dimension
                </h1>
                <h5 class="text-light text-center">
                    Comprar Novas ayuda al mantenimiento del server y a que podamos seguir desarrollando 5Dim
                    </h1>
                    <br />
                    <nav>
                        <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist"
                            style="border: 0px; margin: 5px" align="center">
                            <a class="nav-item nav-link active" id="tienda-tab" data-bs-toggle="tab" href="#tienda" role="tab"
                                aria-controls="tienda" aria-selected="true">
                                Tienda
                            </a>
                            <a class="nav-item nav-link" id="compra-tab" data-bs-toggle="tab" href="#compra" role="tab"
                                aria-controls="compra" aria-selected="false">
                                Compra novas
                            </a>
                            <a class="nav-item nav-link" id="canjear-tab" data-bs-toggle="tab" href="#canjear" role="tab"
                                aria-controls="canjear" aria-selected="false">
                                Canjea tu codigo
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tienda" role="tabpanel" aria-labelledby="tienda-tab">
                            @foreach ($articulos as $articulo)
                                @include('juego.tienda.cajitaTienda', [
                                'articulo' => $articulo,
                                ])
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="compra" role="tabpanel" aria-labelledby="compra-tab">

                        </div>
                        <div class="tab-pane fade show" id="canjear" role="tabpanel" aria-labelledby="canjear-tab">

                        </div>
                    </div>
        </div>
    </div> --}}
@endsection
