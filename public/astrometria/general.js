// este timer es para la cuenta atrás del panel de info de flotas
function startTimer(duration, display) {
    var timer = duration,
        minutes,
        seconds;
    var crono = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        //usar display si queremos mostrar la cuenta atrás en el DOM del documento
        //display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            // timer = duration;
            timer = 0;
            clearInterval(crono);
        }
        txtpaneltimer.text = seconds;
        log(minutes + ":" + seconds);
    }, 1000);
}

//llamar a esta función cada x minutos para actualizar las flotas en vuelo (desactivado por defecto).
//llamada desde tFlotas() en main.js
function flotasNuevas() {
    var flotasAux = new Object();
    var flotasNuevas = 0;

    flotasAux = flotas;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            flotas = JSON.parse(this.responseText);

            //botonF();
            // log(flotas.flotas);
            creaflotas();

            //actualizar el txt del numero de flotas
            txt_num_flotas.text = " ";
            txt_num_flotas.text = flotas.flotas.length;
        }
    };
    xmlhttp.open("GET", jsonFlotas, true);
    xmlhttp.send();
}

function exflotasNuevas() {
    var flotasAux = new Object();
    var flotasNuevas = 0;

    flotasAux = exflotas;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            exflotas = JSON.parse(this.responseText);

            //botonF();
            // log(flotas.flotas);
            creaexflotas();

            //actualizar el txt del numero de flotas
            txt_num_flotas.text = " ";
            txt_num_flotas.text = flotas.flotas.length;
        }
    };
    xmlhttp.open("GET", jsonexFlotas, true);
    xmlhttp.send();
}

//Crea una estrella. Se llama a esta función desde main para crear las estrellas
function Sistema(n, x, y, habitado) {
    var estrella = capa_estrellas.addChild(new PIXI.Sprite(PIXI.Texture.from("/astrometria/img/estrella-blanca-3.png")));

    // box.tint = Math.floor(Math.random() * 0xffffff)
    estrella.width = estrella.height = 70;
    estrella.position.set(x, y);
    estrella.interactive = true;
    estrella.buttonMode = true;

    //acciones para el botón
    estrella.on("pointerdown", event => {
        versistema(this);
        //  log(x + " " + y);                         // llamada para ver el sistema solar seleccionado;
    });

    if (habitado == 0) {
        estrella.tint = 0xffffff;
        var txt = capa_estrellas.addChild(new PIXI.Text(n, { fontFamily: "Arial", fontSize: 12, fill: "white" }));
    } //SIN OCUPAR blanco
    if (habitado == 1) {
        estrella.tint = 0xfff700;
        var txt = capa_estrellas.addChild(new PIXI.Text(n, { fontFamily: "Arial", fontSize: 12, fill: "0xFFF700" }));
    } //OCUPADO amarillo
    if (habitado == 2) {
        estrella.tint = 0x4db8ff;
        var txt = capa_estrellas.addChild(new PIXI.Text(n, { fontFamily: "Arial", fontSize: 12, fill: "0x4db8ff" }));
    } //PROPIO (home) azul
    if (habitado == 3) {
        estrella.tint = 0x4dff88;
        var txt = capa_estrellas.addChild(new PIXI.Text(n, { fontFamily: "Arial", fontSize: 12, fill: "0x4dff88" }));
    } //ALIADO verde
    if (habitado == 4) {
        estrella.tint = 0xff0000;
        var txt = capa_estrellas.addChild(new PIXI.Text(n, { fontFamily: "Arial", fontSize: 12, fill: "0xFF0000" }));
    } //ENEMIGO rojo

    this.n = n; //numero de sistema
    this.px = x; //posicion x
    this.py = y; //posicion y
    this.hab = habitado;

    //mapa.addChild(this);
    //log(mapa.width)
    // var box = viewport.addChild(new PIXI.Sprite(PIXI.Texture.WHITE))

    //texto = new PIXI.Container();
    //this.addChild(texto);

    // var txt = capa_estrellas.addChild(new PIXI.Text(n,{fontFamily : 'Arial',fontSize: 12,fill : "white"}));
    a = txt.getBounds();
    txt.pivot.set(a.width / 2, a.height / 2);
    txt.x = x + 35;
    txt.y = y + 50;
}

//Crea un radar. Se llama a esta función desde main para crear los radares
function Radar(n, x, y, t, c) {
    var circulo = capa_radares.addChild(new PIXI.Graphics());
    // box.tint = Math.floor(Math.random() * 0xffffff)

    circulo.beginFill(0xffffff);
    circulo.drawCircle(x + 35, y + 35, 70 * t);
    circulo.endFill();

    //circulo.filters = [new PIXI.filters.BlurFilter(52)];
    if (c == 1) {
        circulo.tint = 0x001a33;
    } // azul
    if (c == 2) {
        circulo.tint = 0x0f3d0f;
    } // verde
    if (c == 3) {
        circulo.tint = 0xe7ad00;
    } // naranja
    if (c == 4) {
        circulo.tint = 0xe70000;
    } // rojo

    // if (c == 1) {
    //     circulo.tint = 0xe7ad00;
    // } // naranja
    // if (c == 2) {
    //     circulo.tint = 0xe70000;
    // } // rojo
    // if (c == 3) {
    //     circulo.tint = 0x0083e7;
    // } // azul
    // if (c == 4) {
    //     circulo.tint = 0x00e73e;
    // } // verde

    //circulo.tint = Math.floor(Math.random() * 0xffffff)
    // log(this);
    circulo.alpha = 1;

    this.n = n; //numero de sistema
    this.px = x; //posicion x
    this.py = y; //posicion y
    //log(this.n);
}

//crea cada zona de influencia
function Influencia(n, x, y, t, c) {
    const graphics = new PIXI.Graphics();

    d = 0;
    influencia = 0;
    alpha = 1;
    max = t * 70;

    for (var j = 0; j < t + 1; j++) {
        for (var i = 0; i < t + 1; i++) {
            d = Math.sqrt(i * 70 * (i * 70) + j * 70 * (j * 70));
            influencia = max - max * (d / max);
            alpha = influencia * 100 / max / 100;

            if (c == 1) {
                graphics.beginFill(0x0083e7, alpha);
            } //azul
            if (c == 2) {
                graphics.beginFill(0x00e73e, alpha);
            } //verde
            if (c == 3) {
                graphics.beginFill(0xe7ad00, alpha);
            } //naranja
            if (c == 4) {
                graphics.beginFill(0xe70000, alpha);
            } //rojo

            // if (c == 1) {
            //     graphics.beginFill(0xde3249, alpha);
            // } //rosa
            // if (c == 2) {
            //     graphics.beginFill(0x2980b9, alpha);
            // } //azul
            // if (c == 3) {
            //     graphics.beginFill(0x51af61, alpha);
            // } //verde
            // if (c == 4) {
            //     graphics.beginFill(0xe74c3c, alpha);
            // } //naranja

            graphics.drawRect(x + 35 + 70 * j, y + 35 + 70 * i, 70, 70);
            graphics.drawRect(x - 70 * j - 35, y + 35 + 70 * i, 70, 70);
            graphics.drawRect(x + 35 + 70 * j, y - 70 * i - 35, 70, 70);
            graphics.drawRect(x - 70 * j - 35, y - 70 * i - 35, 70, 70);
            graphics.endFill();
        }
    }

    capa_influencias2.addChild(graphics);
}

function angleDegrees(ox, oy, dx, dy) {
    x = dx - ox;
    y = dy - oy;
    var angle = Math.atan2(y, x);
    //  var degrees = 180 * angle / Math.PI;
    // return (360 + Math.round(degrees)) % 360;
    return angle;
}

//esta función es para dibujar rutas de prueba, no activa en lanzamiento
function Ruta(x1, y1, x2, y2, x3, y3, tipo, velocidad) {
    if (tipo == 1) {
        texture = PIXI.Texture.from("/astrometria/img/flechas-peq2.png");
    }
    if (tipo == 2) {
        texture = PIXI.Texture.from("/astrometria/img/lineas1.png");
    }

    var angulo1 = angleDegrees(x1, y1, x2, y2);
    var angulo2 = angleDegrees(x2, y2, x3, y3);

    //Distancia=raiz cuadrada de {(destino.x-origen.x) * (destino.x-origen.x)+(destino.y-origen.y)*(destino.y-origen.y)}
    var distancia1 = Math.sqrt((x2 - x1) * (x2 - x1) + (y2 - y1) * (y2 - y1));
    var distancia2 = Math.sqrt((x3 - x2) * (x3 - x2) + (y3 - y2) * (y3 - y2));

    this.flechasRuta1 = new PIXI.TilingSprite(texture, distancia1, 8);
    this.flecha = capa_rutas.addChild(this.flechasRuta1);
    this.flecha.anchor.set(0, 0.5);
    this.flecha.position.set(x1, y1);
    this.flecha.rotation = angulo1;

    PIXI.Ticker.shared.add(() => {
        this.flechasRuta1.tilePosition.x += 0.1 * velocidad;
    });

    this.flechasRuta2 = new PIXI.TilingSprite(texture, distancia2, 8);
    this.flecha2 = capa_rutas.addChild(this.flechasRuta2);
    this.flecha2.anchor.set(0, 0.5);
    this.flecha2.position.set(x2, y2);
    this.flecha2.rotation = angulo2;

    PIXI.Ticker.shared.add(() => {
        this.flechasRuta2.tilePosition.x += 0.1 * velocidad;
    });
}

//esta función crea las flotas y también dibuja la ruta que sigue la flota
function Flota(n, x, y, rotacion, nick, ataque, defensa, origen, destino, tiempo, numero) {
    //var box = capa_flotas.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('img/flota.png')))
    //log(n);
    //var box = capa_flotas.addChild(new PIXI.AnimatedSprite(ef_circulo));
    //log(n+ ":" +x + " " + y);
    efNaves = new PIXI.AnimatedSprite(ef_circulo.animations["ef_circulo"]);
    this.nave = capa_flotas.addChild(efNaves);

    // box.tint = Math.floor(Math.random() * 0xffffff)
    // box.width = box.height = 70
    this.nave.play();
    this.nave.animationSpeed = 0.5;
    this.nave.pivot.set(0.5);
    this.nave.anchor.set(0.5);
    this.nave.position.set(x, y);
    this.nave.rotation = rotacion;
    this.nave.interactive = true;
    this.nave.buttonMode = true;
    this.nave.on("touchend", event => {});
    this.nave.on("click", event => {
        var posx = app.renderer.plugins.interaction.mouse.global.x;
        var posy = app.renderer.plugins.interaction.mouse.global.y;
        var centrox = window.innerWidth / 2;
        var centroy = window.innerHeight / 2;
        if (!creaRuta) {
            var posicionx, posiciony;

            // calculo la posición del panel de info de flotas para que se muestre siempre dentro
            if (posx < centrox) {
                panel.x = posx + 150;
                posicionx = 1;
            } else {
                panel.x = posx - 150;
                posicionx = 2;
            }
            if (posy < centroy) {
                panel.y = posy + 150;
                posiciony = 1;
            } else {
                panel.y = posy - 150;
                posiciony = 2;
            }

            txtpanelid.text = this.n;
            txtpanelnick.text = this.nick;
            txtpanelataque.text = "Ataque - Defensa";
            txtpaneldefensa.text = this.ataque + " - " + this.defensa;
            txtpanelorigen.text = "Origen - Destino";
            txtpaneldestino.text = this.origen + " - " + this.destino;

            panel.visible = true;

            // borro el contenedor del sistema solar
            for (var i = auxImg.children.length - 1; i >= 0; i--) {
                auxImg.removeChild(auxImg.children[i]);
            }

            //linea que une la flota con el panel
            line = new linea2([(this.nave.x - viewport.hitArea.x) * (viewport.zlevel / 100), (this.nave.y - viewport.hitArea.y) * (viewport.zlevel / 100), panel.x, panel.y], 2, 0x234e50, 1, auxImg, posicionx, posiciony);

            setTimeout(function() {
                panel.visible = false;
                for (var i = auxImg.children.length - 1; i >= 0; i--) {
                    auxImg.removeChild(auxImg.children[i]);
                }
            }, 4000);

            //display = document.querySelector('#time');
            //startTimer(2,display);
            txtpaneltimer.text = "04";
            startTimer(3);
        }

        //compruebo si se esta creando una ruta y añado la flota
        puntoRuta = n;
        if (creaRuta) {
            if (ruta.length <= 2) {
                if (ruta.length == 0) {
                    txtpanelp1txt.text = puntoRuta;
                }
                if (ruta.length == 1) {
                    txtpanelp2txt.text = puntoRuta;
                }
                if (ruta.length == 2) {
                    txtpanelp3txt.text = puntoRuta;
                }
                ruta.push(puntoRuta);
            }
            log(ruta);
        }
    });

    this.n = n; //numero de sistema
    this.px = x; //posicion x
    this.py = y; //posicion y
    this.nick = nick;
    this.ataque = ataque;
    this.defensa = defensa;
    this.origen = origen;
    this.destino = destino;
    this.tiempo = tiempo;
}

//esta función crea las flotas en extraccion recoleccion
function exFlota(n, x, y) {
    exNaves = new PIXI.AnimatedSprite(ex_circulo.animations["ex_circulo"]);
    this.nave = capa_flotas.addChild(exNaves);

    // box.tint = Math.floor(Math.random() * 0xffffff)
    // box.width = box.height = 70
    this.nave.play();
    this.nave.animationSpeed = 0.5;
    this.nave.pivot.set(0.5);
    this.nave.anchor.set(0.5);
    this.nave.position.set(x, y);
    //this.nave.rotation = rotacion;
    this.nave.interactive = false;
    this.nave.buttonMode = false;

    this.n = n; //numero de sistema
    this.px = x; //posicion x
    this.py = y; //posicion y
}

//dibuja la ruta que sigue la flota
function linea(points, lineSize, lineColor, alpha, conte, num) {
    log(lineColor);
    if (lineColor == 1) {
        texture = PIXI.Texture.from("/astrometria/img/flechasruta-azul.png"); // propia
    }
    if (lineColor == 2) {
        texture = PIXI.Texture.from("/astrometria/img/flechasruta-verde.png"); //aliado
    }
    if (lineColor == 3) {
        texture = PIXI.Texture.from("/astrometria/img/flechasruta-blanco.png"); // otros
    }
    if (lineColor == 4) {
        texture = PIXI.Texture.from("/astrometria/img/flechasruta-rojo.png"); //enemigo
    }

    function angleDegrees(ox, oy, dx, dy) {
        x = dx - ox;
        y = dy - oy;
        var angle = Math.atan2(y, x);
        //  var degrees = 180 * angle / Math.PI;
        // return (360 + Math.round(degrees)) % 360;
        return angle;
    }

    var angulo = angleDegrees(points[0], points[1], points[2], points[3]);

    //Distancia=raiz cuadrada de {(destino.x-origen.x) * (destino.x-origen.x)+(destino.y-origen.y)*(destino.y-origen.y)}
    var distancia = Math.sqrt((points[2] - points[0]) * (points[2] - points[0]) + (points[3] - points[1]) * (points[3] - points[1])); //puedes cambiar el origen por el punto de la flota

    this.flechasRuta = new PIXI.TilingSprite(texture, distancia, 8);
    this.flecha = conte.addChild(this.flechasRuta);

    this.flecha.anchor.set(0, 0.5);
    this.flecha.tint = 0xffffff;
    this.flecha.position.set(points[0], points[1]);
    //this.flecha.rotation = (angulo*3.1416)/180; // rotation funciona en radianes por lo que hay que convertir de grados a radianes
    this.flecha.rotation = angulo;

    // este ticker es el que hace que se muevan las rutas
    // variando el valor entre 0 y 1 se modifica la velocidad a la que se mueven las flechas
    PIXI.Ticker.shared.add(() => {
        this.flechasRuta.tilePosition.x += 0.5;
    });
}

// esta función dibuja una linea, por ejemplo para unir el dibujo de una flota con su panel de informacion
function linea2(points, lineSize, lineColor, alpha, conte, x, y) {
    // el panel mide 168x164

    var line = conte.addChild(new PIXI.Graphics());
    var s = (this.lineWidth = lineSize || 2);
    var c = (this.lineColor = lineColor || "0x000000");
    var a = (this.alpha = alpha || 1);
    var sumax, sumay;
    line.lineStyle(s, c, a);
    line.moveTo(points[0], points[1]);
    if (x == 1) {
        sumax = -84;
    }
    if (x == 2) {
        sumax = 84;
    }
    if (y == 1) {
        sumay = -82;
    }
    if (y == 2) {
        sumay = 82;
    }
    line.lineTo(points[2] + sumax, points[3] + sumay);
    log(points);
}

class Line extends PIXI.Graphics {
    constructor(points, lineSize, lineColor, alpha) {
        super();

        var s = (this.lineWidth = lineSize || 5);
        var c = (this.lineColor = lineColor || "0xFFFFFF");
        var a = (this.alpha = alpha || 1);

        this.points = points;

        this.lineStyle(s, c, a);

        this.moveTo(points[0], points[1]);
        this.lineTo(points[2], points[3]);
    }

    updatePoints(p) {
        var points = (this.points = p.map((val, index) => val || this.points[index]));

        var s = this.lineWidth,
            c = this.lineColor;

        this.clear();
        this.lineStyle(s, c);
        this.moveTo(points[0], points[1]);
        this.lineTo(points[2], points[3]);
    }
}

// boton info flotas en parte superior
function botonA(texto) {
    // texturas para los botones
    var textureButton = PIXI.Texture.from("/astrometria/img/botones/boton1.png");
    var textureButtonDown = PIXI.Texture.from("/astrometria/img/botones/boton1.png");
    var textureButtonOver = PIXI.Texture.from("/astrometria/img/botones/boton1.png");

    // botA muestra el numero de flotas en el mapa
    //botA = barra1.addChild(new PIXI.Sprite(textureButton));
    botA = new PIXI.Sprite(textureButton);
    botA.buttonMode = true;

    botA.anchor.set(0.5);
    botA.position.set(0, 20);

    // botZ indica el nivel de zoom
    // botA = barra1.addChild(new PIXI.Sprite(textureButton));
    botZ = new PIXI.Sprite(textureButton);
    botZ.buttonMode = true;

    botZ.anchor.set(0.5);
    botZ.position.set(50, 20);

    // add it to the stage
    botones.addChild(botA);
    botones.addChild(botZ);

    var nueva_pos = window.innerWidth / 2 - botones.width / 2;
    botones.x = nueva_pos;

    var txt = botones.addChild(new PIXI.Text("FLOTAS", { fontFamily: "Roboto", fontSize: 10, fill: "white" }));
    txt.anchor.set(0.5);
    txt.position.set(botA.x, botA.y - 14);

    if (texto != 0) {
        txt_num_flotas = botones.addChild(new PIXI.Text(flotas.flotas.length, { fontFamily: "Roboto", fontSize: 18, fill: "orange" }));
        txt_num_flotas.anchor.set(0.5);
        txt_num_flotas.position.set(botA.x, botA.y + 5);
    }

    var txt = botones.addChild(new PIXI.Text("ZOOM", { fontFamily: "Roboto", fontSize: 10, fill: "white" }));
    txt.anchor.set(0.5);
    txt.position.set(botZ.x, botZ.y - 14);

    txt_zoom = botones.addChild(new PIXI.Text("", { fontFamily: "Roboto", fontSize: 16, fill: "orange" }));
    txt_zoom.anchor.set(0.5);
    txt_zoom.position.set(botZ.x, botZ.y + 5);
}
function actualizaTextos() {}

// boton en la parte superior para ver/ocultar las flotas
function botonF() {
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/flotas2.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/flotas1.png");

    //estado del botón
    var estado = true;

    botF = new PIXI.Sprite(text_on); // se inicia activo

    botF.anchor.set(0.5);
    botF.position.set(100, 20);

    // hacer el botón interactivo
    botF.interactive = true;
    botF.buttonMode = true;

    //acciones para el botón
    botF
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botF);

    var nueva_pos = window.innerWidth / 2 - botones.width / 2;
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        // this.isdown = false;
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            capa_flotas.visible = true;
            elem = document.getElementById("dragFlotas");
            elem.style.visibility = "visible";
            tFlotas();
        } else {
            this.texture = text_off;
            capa_flotas.visible = false;
            elem = document.getElementById("dragFlotas");
            elem.style.visibility = "hidden";
        }
    }

    var FizzyText = function() {
        this.Buscar = "";
        this.FullScreen = function() {
            openFullscreen();
        };
    };

    text = new FizzyText();
    gui = new dat.GUI();
    /*
    var bool_flotas = gui.add(text, 'Flotas');
        bool_flotas.onChange(function(value){
        onButtonUp()
        });
        */
    //var bool_flotas = gui.add(text, 'prueba');

    var input_buscar = gui.add(text, "Buscar").name("Buscar Sistema o flota");
    input_buscar.onFinishChange(function(value) {
        buscar(value);
    });

    var fs = gui.add(text, "FullScreen").name("Pantalla completa (ESC) para salir");

    /* View in fullscreen */
    function openFullscreen() {
        if (docu.requestFullscreen) {
            docu.requestFullscreen();
        } else if (docu.mozRequestFullScreen) {
            /* Firefox */
            docu.mozRequestFullScreen();
        } else if (docu.webkitRequestFullscreen) {
            /* Chrome, Safari and Opera */
            docu.webkitRequestFullscreen();
        } else if (docu.msRequestFullscreen) {
            /* IE/Edge */
            docu.msRequestFullscreen();
        }
    }

    /* Close fullscreen */
    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            /* Firefox */
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            /* Chrome, Safari and Opera */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE/Edge */
            document.msExitFullscreen();
        }
    }
    /*
        var node = document.createElement("LI");
        var textnode = document.createTextNode("Water");
        node.appendChild(textnode)
        document.getElementByClassName("dg main a")[0].appendChild(node)
        //document.getElementById("uno").appendChild(node)
    */

    function onButtonOver() {
        /*
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
        */
    }

    function onButtonOut() {
        /*
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
        */
    }
}

// boton en la parte superior para ver/ocultar los radares
function botonR() {
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/radar2.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/radar1.png");

    //estado del botón
    var estado = true;

    botR = new PIXI.Sprite(text_on); // se inicia activo

    botR.anchor.set(0.5);
    botR.scale.x = 1;
    botR.scale.y = 1;
    botR.position.set(200, 20);

    // hacer el botón interactivo
    botR.interactive = true;
    botR.buttonMode = true;

    //acciones para el botón
    botR
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botR);

    var nueva_pos = window.innerWidth / 2 - botones.width / 2;
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            capa_radares.visible = true;
        } else {
            this.texture = text_off;
            capa_radares.visible = false;
        }
    }
    /*
    var bool_radares = gui.add(text, 'Radares');
    bool_radares.onChange(function(value){
    onButtonUp()
    });
    */
    function onButtonOver() {
        /*
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
        */
    }

    function onButtonOut() {
        /*
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
        */
    }
}

// boton en la parte superior para ir rápido a nuestro sistema de inicio
function botonH() {
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/home1.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/home0.png");

    //estado del botón
    var estado = false;

    botH = new PIXI.Sprite(text_off); // se inicia activo

    botH.anchor.set(0.5);
    botH.scale.x = 1;
    botH.scale.y = 1;
    botH.position.set(350, 20);

    // hacer el botón interactivo
    botH.interactive = true;
    botH.buttonMode = true;

    //acciones para el botón
    botH
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botH);

    var nueva_pos = (window.innerWidth / 2 - botones.width / 2);
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        buscar(home);

        estado = !estado;
    }
    function onButtonOver() {
        this.texture = text_on;
    }

    function onButtonOut() {
        this.texture = text_off;
    }
}

// boton para ver/ocultar la capa de estrellas
function botonE() {
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/estrellas2.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/estrellas1.png");

    //estado del botón
    var estado = true;

    botE = new PIXI.Sprite(text_on); // se inicia activo

    botE.anchor.set(0.5);
    botE.scale.x = 1;
    botE.scale.y = 1;
    botE.position.set(150, 20);

    // hacer el botón interactivo
    botE.interactive = true;
    botE.buttonMode = true;

    //acciones para el botón
    botE
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botE);

    var nueva_pos = window.innerWidth / 2 - botones.width / 2;
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            capa_estrellas.visible = true;
        } else {
            this.texture = text_off;
            capa_estrellas.visible = false;
        }
    }
    /*
    var bool_radares = gui.add(text, 'Radares');
    bool_radares.onChange(function(value){
    onButtonUp()
    });
    */
    function onButtonOver() {
        /*
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
        */
    }

    function onButtonOut() {
        /*
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
        */
    }
}

// botón para marcar jugadores. desactivado en lanzamiento
function botonMarcar() {
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/marcar1.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/marcar0.png");

    //estado del botón
    var estado = false;

    botM = new PIXI.Sprite(text_off); // se inicia activo

    botM.anchor.set(0.5);
    botM.scale.x = 1;
    botM.scale.y = 1;
    botM.position.set(400, 20);

    // hacer el botón interactivo
    botM.interactive = true;
    botM.buttonMode = true;

    //acciones para el botón
    botM
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botM);

    var nueva_pos = window.innerWidth / 2;
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            elem = document.getElementById("marcar");
            elem.style.visibility = "visible";
        } else {
            this.texture = text_off;
            elem = document.getElementById("marcar");
            elem.style.visibility = "hidden";
        }
    }

    function onButtonOver() {
        /*
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
        */
    }

    function onButtonOut() {
        /*
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
        */
    }
}

// boton activa la funcion de definir los destinos para crear una ruta. desactivado en lanzamiento
function botonRuta() {
    // buscar(home);
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/rutas2.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/rutas1.png");

    //estado del botón
    var estado = false;

    botRutas = new PIXI.Sprite(text_off); // se inicia activo

    botRutas.anchor.set(0.5);
    botRutas.scale.x = 1;
    botRutas.scale.y = 1;
    botRutas.position.set(450, 20);

    // hacer el botón interactivo
    botRutas.interactive = true;
    botRutas.buttonMode = true;

    //acciones para el botón
    botRutas
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botRutas);

    var nueva_pos = window.innerWidth / 2;
    botones.x = nueva_pos;

    function onButtonDown() {
        /*
        this.isdown = true;
        this.texture = textureButtonDown;
        this.alpha = 1;
        */
    }

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            creaRuta = true;
            panelRuta.x = window.innerWidth / 2;
            panelRuta.y = window.innerHeight / 2;

            txtpanelp1.text = "Punto #1";
            txtpanelp1txt.text = "Selecciona flota o planeta";
            txtpanelp2.text = "Punto #2";
            txtpanelp2txt.text = "Selecciona flota o planeta";
            txtpanelp3.text = "Punto #3";
            txtpanelp3txt.text = "Selecciona flota o planeta";

            panelRuta.visible = true;

            // borro el contenedor del sistema solar
            for (var i = auxImg.children.length - 1; i >= 0; i--) {
                auxImg.removeChild(auxImg.children[i]);
            }
        } else {
            this.texture = text_off;
            creaRuta = false;
            ruta.length = 0;
            panelRuta.visible = false;
            //   capa_estrellas.visible=false;
        }
    }

    function onButtonOver() {
        /*
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
        */
    }

    function onButtonOut() {
        /*
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
        */
    }
}

// boton activa la funcion de influencia
function botonI() {
    // buscar(home);
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/influencia1.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/influencia0.png");

    //estado del botón
    var estado = false;

    botInflu = new PIXI.Sprite(text_off); // se inicia activo

    botInflu.anchor.set(0.5);
    botInflu.scale.x = 1;
    botInflu.scale.y = 1;
    botInflu.position.set(250, 20);

    // hacer el botón interactivo
    botInflu.interactive = true;
    botInflu.buttonMode = true;

    //acciones para el botón
    botInflu
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botInflu);

    var nueva_pos = window.innerWidth / 2;
    botones.x = nueva_pos;

    // por defecto apagado
    this.texture = text_off;
    capa_influencias.visible = false;

    function onButtonDown() {}

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            capa_influencias.visible = true;
        } else {
            this.texture = text_off;
            capa_influencias.visible = false;
        }
    }

    function onButtonOver() {}
    function onButtonOut() {}
}

// boton activa la funcion de influencia
function botonI2() {
    // buscar(home);
    // texturas para los botones
    var text_on = PIXI.Texture.from("/astrometria/img/botones/influencia21.png");
    var text_off = PIXI.Texture.from("/astrometria/img/botones/influencia20.png");

    //estado del botón
    var estado = false;

    botInflu2 = new PIXI.Sprite(text_off); // se inicia activo

    botInflu2.anchor.set(0.5);
    botInflu2.scale.x = 1;
    botInflu2.scale.y = 1;
    botInflu2.position.set(300, 20);

    // hacer el botón interactivo
    botInflu2.interactive = true;
    botInflu2.buttonMode = true;

    //acciones para el botón
    botInflu2
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    // add it to the stage
    botones.addChild(botInflu2);

    var nueva_pos = window.innerWidth / 2;
    botones.x = nueva_pos;

    // por defecto apagado
    this.texture = text_off;
    capa_influencias2.visible = false;

    function onButtonDown() {}

    function onButtonUp() {
        estado = !estado;

        if (estado == true) {
            this.texture = text_on;
            capa_influencias2.visible = true;
        } else {
            this.texture = text_off;
            capa_influencias2.visible = false;
        }
    }

    function onButtonOver() {}
    function onButtonOut() {}
}

function listaFlotas() {
    //
}

function buscar(value) {
    var sis,
        flo = false;

    for (var i = 0; i < universo.sistemas.length; i++) {
        //flota = new Flota(flotas.flotas[i].numeroflota,x,y);
        if (universo.sistemas[i].estrella == value) {
            var y = Math.floor(universo.sistemas[i].estrella / universo.ancho) * 70;
            var x = (universo.sistemas[i].estrella - Math.floor(universo.sistemas[i].estrella / universo.ancho) * universo.ancho) * 70;
            x+=300;//ajustepor menus
            y+=100;
            viewport.snap(x, y, { topLeft: false, time: 2000, ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true });
            sis = true;
        }
    }

    for (var i = 0; i < flotas.flotas.length; i++) {
        //flota = new Flota(flotas.flotas[i].numeroflota,x,y);
        if (flotas.flotas[i].numeroflota == value) {
            var y = flotas.flotas[i].coordy;
            var x = flotas.flotas[i].coordx;
            viewport.snap(x, y, { topLeft: false, time: 1500, ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true });
            flo = true;
        }
    }

    if (!sis) {
        // $("#alerta").show(2000);
        // document.body.appendChild(renderer.view)
        $("input").css({ color: "00ff00" });
    }

    if (!flo) {
        // log("No se encuentra la flota " + value), alert("No se encuentra la flota " + value)
        $("input").css({ color: "00ff00" });
    }

    if (!sis && !flo) {
        //  $("#alerta").show(2000);
        // alerta("No es una flota ni un sistema");
        // document.body.appendChild(renderer.view)
        $("input").css({ color: "red" });
    }
    $("input").css({ fontSize:16 });
}

function alerta(texto) {
    /*
    var node = document.createElement("span");
    var textnode = document.createTextNode("Water");

    document.getElementById("alerta").appendChild(textnode);
    */
    $("#alerta").hide(1000);

    alert(texto);
}

//funcion para ajustar el zoom y que no pase del 150%
function ajusta_zoom(nivel) {
    var dif = 0;
    if (nivel > 150) {
        dif = Math.floor(nivel - 150);
        viewport.zoomPercent(-(dif / 150), true);
    }
    if (nivel < 5) {
        dif = Math.floor(nivel - 5);
        viewport.zoomPercent(-(dif / 5), true);
    }
}

/*
colores oreintativos
habitado==0 //SIN OCUPAR blanco
habitado==1 //SIN OCUPADO amarillo
habitado==2 //SIN PROPIO (HOME) verde
habitado==3 //SIN ALIADO azul
habitado==4 //SIN ENEMIGO rojo
*/
