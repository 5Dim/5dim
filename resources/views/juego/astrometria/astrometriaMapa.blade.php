<head>
    <style>



        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
            width: 50%;
        }

        .alert.success {
            background-color: #4CAF50;
        }

        .alert.info {
            background-color: #2196F3;
        }

        .alert.warning {
            background-color: #ff9800;
        }

        #parrafo {
            margin: 1px;
            font-size: 15px;
        }

        #parrafo:hover {
            background-color: rgb(59, 140, 206);
            color: rgb(5, 52, 73)
        }



        #contenedorFlotas {
            position: absolute;
            list-style-type: none;
            font-size: 12px;
            font-family: sans-serif;
            margin: 0;
            padding: 0;

            color: #2c9dd1;
            cursor: pointer;
            text-align: center;
            overflow: hidden;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #astrometria {
            position: absolute;
            overflow: hidden;
        }


        #dragFlotas {
            width: 120px;
            height: 90px;
            padding: 4px;
            margin-top: 5px;
            left: 305px;
            background: none repeat scroll 0 0 #002224ab;
            border: 1px solid #686D79;
            position: absolute;
            overflow-y: scroll;
            cursor: pointer;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: rgb(5, 52, 73);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #2c9dd1;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #20769e;
        }

        #tituloDrag1 {
            color: #2c9dd1;
            position: fixed;
            margin-top: 96px;
            font-size: 12px;
            font-family: AUTO;
        }

        #marcar {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            width: 380px;
            visibility: hidden;
        }

        form#formularioMarcar {
            background: none repeat scroll 0 0 #002224ab;
            border: 1px solid #686D79;
            font-size: 12px;
            font-family: sans-serif;
            text-align: center;
        }

        label {
            color: #666666;
            font-size: 12px;
            font-family: sans-serif;
            padding: 15px;

        }

        #forMarcarUno {
            color: red;
        }

        #forMarcarDos {
            color: rgb(255, 255, 0);
        }

        #forMarcarTres {
            color: rgb(0, 255, 255);
        }

        #forMarcarCuatro {
            color: rgb(255, 0, 255);
        }

        #forMarcarTitulo {
            color: #2c9dd1;
            font-size: 14px;
        }

        input,
        select {
            border: 1px solid #999999;
        }

        #boton_contenedor {
            margin: 0 auto 15px;
            text-align: center;
        }
        .dg.ac{
            top:110px !important;
        }


        .boton_enviar {}

    </style>


    <link rel="stylesheet" href="{{ asset('astrometria/css/jquery-ui.css') }}">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/pixi/pixi.min.js') }}"></script>
    <script src="{{ asset('js/pixi/pixi-filters.js') }}"></script>
    <script src="{{ asset('astrometria/js/dat.gui.js') }}"></script>
    <script src="{{ asset('js/pixi/viewport.min.js') }}"></script>
    <script src="{{ asset('astrometria/sistema.js') }}"></script>
    <script src="{{ asset('astrometria/cargador.js') }}"></script>
    <script src="{{ asset('astrometria/general.js') }}"></script>
    <script src="{{ asset('astrometria/main.js') }}"></script>



    <script>
        $(function() {
            $("#formularioMarcar").draggable();
            $("#dragFlotas").draggable();
        });

        let backgroundAstrometria="{{ asset('astrometria/img/fondo.png') }}";

    </script>
</head>

<div id="astrometria" name="astrometria"></div>

    <div id="dragFlotas">
        <p id=tituloDrag1>FLOTAS EN VUELO</p>
        <div id="contenedorFlotas">
            <p>Loading...</p>
        </div>
    </div>
    <div id="marcar">
        <form id="formularioMarcar" name="formulario_de_prueba" method="POST" action="" target="_blank">
            <p><label id="forMarcarTitulo">Marcar Jugador o Alianza</label></p>
            <p>
                <label id="forMarcarUno">Rojo</label>
                <input type="text" name="verde" class="" minlength=”4” size="10" />

                <label id="forMarcarDos">Amarillo</label>
                <input type="text" name="Amarillo" class="" minlength=”4” size="10" />

            </p>
            <p>
                <label id="forMarcarTres">Azul</label>
                <input type="text" name="azul" class="" minlength=”4” size="10" />

                <label id="forMarcarCuatro">Púrpura</label>
                <input type="text" name="purpura" class="" minlength=”4” size="10" />

            </p>
            <p id="boton_contenedor">
                <input class="boton_enviar" type="submit" value="Enviar" />
            </p>
        </form>
    </div>



