<head>
        <style>
            body {
                background-color: #000000;
                background-image: url(img/fondo.png);
                width: 100%;
                height: 100%
                margin: 0;
                padding: 0;
                overflow:hidden;
                font-size: 1.5em;
            }

            #canvas {
                position: absolute;
                top: 4em;
                width: 100%;
                height: calc(100% - 4em);
                display: block;
            }
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

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
            /* Chrome, Safari and Opera syntax */
            :-webkit-full-screen {
                background-color: black;
            }

            /* Firefox syntax */
            :-moz-full-screen {
                background-color: black;
            }

            /* IE/Edge syntax */
            :-ms-fullscreen {
                background-color: black;
            }

            /* Standard syntax */
            :fullscreen {
                background-color: black;
            }

            /* Style the button */
            button {
                padding: 20px;
                font-size: 20px;
            }
        </style>
        <script src="{{ asset("astrometria/pixi.min.js") }}"></script>
        <script src="{{ asset("astrometria/js/dat.gui.js") }}"></script>
        <script src="{{ asset("astrometria/js/jquery.min.js") }}"></script>
        <script src="{{ asset("astrometria/pixi-viewport.js") }}"></script>
        <script src="{{ asset("astrometria/sistema.js") }}"></script>
        <script src="{{ asset("astrometria/general.js") }}"></script>
        <script src="{{ asset("astrometria/main.js") }}"></script>
        <script type="text/javascript">
            /* Get the documentElement (<html>) to display the page in fullscreen

        javascript:(function(){var script=document.createElement('script');script.onload=function(){var stats=new Stats();document.body.appendChild(stats.dom);requestAnimationFrame(function loop(){stats.update();requestAnimationFrame(loop)});};script.src='//rawgit.com/mrdoob/stats.js/master/build/stats.min.js';document.head.appendChild(script);})()
        */
        </script>
    </head>

    <body>
        <script>

        </script>
    </body>