const log = console.log;

var universo = new Object();
var flotas = new Object();
var exflotas = new Object();
var radares = new Object();
var influencias = new Object();
var rutas = new Object();
var planetas = [];
var botones;
var fondo;
var timerFlotas;
var lineas;
var sistemas;
var app;
var renderer;
var botA, botF, botR;
const BORDER = 10;
const WIDTH = 0;
const HEIGHT = 0;
var width = 0,
    height = 0;
var cambios = 0;
var sis_posfinaly = window.innerHeight + 100; //posición y de la vista planetaria
var sis_posfinalx = window.innerWidth / 2 - 512; //posición x de la vista planetaria
var txt_fps = "";
var txt_num_flotas = "";
var txt_zoom = "";
var lineaprueba;

//llamadas ajax para cargar los ficheros json

//const jsonUniverso ="/astrometria/data/universo";
const jsonUniverso = "/juego/astrometria/ajax/universo";

//const jsonFlotas ="/astrometria/data/flotas.json";
const jsonFlotas = "/juego/astrometria/ajax/flotas";

const jsonexFlotas = "/juego/flotas/ajax/verFlotasEnRecoleccion";

//const jsonRadares ="/astrometria/data/radares.json";
const jsonRadares = "/juego/astrometria/ajax/radares";

//const jsonInfluencia ="/astrometria/data/influencia.json";
const jsonInfluencia = "/juego/astrometria/ajax/influencia";

const jsonRutas = "/astrometria/data/rutas.json"; // No usadas en versión de lanzamiento
//const jsonRutas ="/juego/astrometria/ajax/rutas";

let home, homex, homey; //datos del sistema propio de inicio
let creaRuta = false;
var ruta = [];

Sistema.prototype = Object.create(PIXI.Sprite.prototype);

function carga_universo() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            universo = JSON.parse(this.responseText);
            home = universo.inicio;
            createViewport();
            carga_influencias(); // carga las influencias
            createWorld();
            carga_flotas(); // carga las flotas
            carga_exflotas(); // carga las flotas recoleccion
            carga_radares(); // carga los radares

            // carga_rutas(); //dibuja unas rutas de prueba si no se cambia el valor de jsonRutas
            botonF(); // crea el botón de flotas en la parte superior. desactivado en lanzamiento
            //botonRuta(); // crea el botón de marcar destinos y crear rutas en la parte superior
            //botonMarcar(); //desactivado en versión de lanzamiento
            botonH(); //crea el botón HOME
            botonI(); // crea el botçon de influencias en la parte superior
            botonI2(); // crea el botçon de influencias en la parte superior
            botonR(); // crea el botçon de los radares
            // resize();
            botones.position.set(window.innerWidth / 2 - botones.width / 2, 0);

            // lanzar timer para actualizar las flotas
            timerFlotas = setInterval(tFlotas, 1000 * 60 * 5); //<-----------------------------
        } //      |
    }; //      |
    xmlhttp.open("GET", jsonUniverso, true); //      |
    xmlhttp.send(); //      |
} //      |
//      |
//función para cargar las flotas nuevas. hacer un timer y que llame a esta funcion  ------
function tFlotas() {
    var d = new Date();
    flotasNuevas();
    exflotasNuevas();
}

//lee los datos json de las flotas y crea el arreglo flotas
function carga_flotas() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            flotas = JSON.parse(this.responseText);
            botonA(flotas.flotas.length);
            creaflotas();
        } else {
            botonA(0);
        }
    };
    xmlhttp.open("GET", jsonFlotas, true);
    xmlhttp.send();
}

function carga_exflotas() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            exflotas = JSON.parse(this.responseText);
            creaexflotas();
            //botonA(exflotas.flotas.length);
        } else {
            //botonA(0);
        }
    };
    xmlhttp.open("GET", jsonexFlotas, true);
    xmlhttp.send();
}

//lee los datos json de los radares y crea el arreglo radares
function carga_radares() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            radares = JSON.parse(this.responseText);
            crearadares();
        }
    };
    xmlhttp.open("GET", jsonRadares, true);
    xmlhttp.send();
}

//lee los datos json de las influencias y crea el arreglo influencias
function carga_influencias() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            influencias = JSON.parse(this.responseText);

            creainfluencias();
        }
    };
    xmlhttp.open("GET", jsonInfluencia, true);
    xmlhttp.send();
}

//lee los datos json de las rutas y crea el arreglo rutas
// desactivado por defecto. Si se activa tal cual dibujará las 3 rutas de prueba en la esquina superior izquierda
// hay que cambiar el valor de la variable jsonRutas al principio de main.js
// activar en carga_universo()
function carga_rutas() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            rutas = JSON.parse(this.responseText);
            crearutas();
        }
    };
    xmlhttp.open("GET", jsonRutas, true);
    xmlhttp.send();
}

function creabarra() {
    fondobarra1 = barra1.addChild(new PIXI.Graphics());
    fondobarra1.beginFill(0x0f1217);
    fondobarra1.drawRect(0, 0, window.innerWidth, 30);
    fondobarra1.endFill();
    // barra1.anchor.set(0.5);
}

function creainfoflotas() {
    // se crea el panel de info de las flotas
    panel = infoflotas.addChild(new PIXI.Sprite(PIXI.Texture.from("/astrometria/img/info-flota.png")));
    panel.buttonMode = false;
    panel.interactive = true;

    //panel.alpha= 0.8;
    panel.anchor.set(0.5);
    panel.visible = false;

    txtpanelid = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpanelnick = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left", dropShadow: false, dropShadowBlur: 3, dropShadowColor: "#81f462", dropShadowDistance: 0 }));
    txtpanelataque = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpaneldefensa = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left" }));
    txtpanelorigen = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpaneldestino = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left" }));
    txtpaneltimer = panel.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 10, fill: "orange", align: "left" }));

    txtpanelid.anchor.set(0.5);
    txtpanelid.position.set(0, -70);

    txtpanelnick.anchor.set(0.5);
    txtpanelnick.position.set(0, -55);

    txtpanelataque.anchor.set(0.5);
    txtpanelataque.position.set(0, -35);

    txtpaneldefensa.anchor.set(0.5);
    txtpaneldefensa.position.set(0, -20);

    txtpanelorigen.anchor.set(0.5);
    txtpanelorigen.position.set(0, 0);

    txtpaneldestino.anchor.set(0.5);
    txtpaneldestino.position.set(0, 20);

    txtpaneltimer.anchor.set(0.5);
    txtpaneltimer.position.set(70, 30);

    var interceptar_on = PIXI.Texture.from("/astrometria/img/botones/interceptar1.png");
    var interceptar_off = PIXI.Texture.from("/astrometria/img/botones/interceptar0.png");
    var flotas_on = PIXI.Texture.from("/astrometria/img/botones/vflotas1.png");
    var flotas_off = PIXI.Texture.from("/astrometria/img/botones/vflotas0.png");

    b_interceptar = new PIXI.Sprite(interceptar_on); // se inicia activo
    b_interceptar.anchor.set(0.5);

    b_flota = new PIXI.Sprite(flotas_on); // se inicia activo
    b_flota.anchor.set(0.5);

    b_interceptar.position.set(40, 60);
    b_interceptar.interactive = true;
    b_interceptar.buttonMode = true;

    b_flota.position.set(-40, 60);
    b_flota.interactive = true;
    b_flota.buttonMode = true;
    /*
  b_interceptar
  // Mouse & touch events are normalized into
  // the pointer* events for handling different
  // button events.
  .on('pointerdown', onButtonDownInt)
  .on('pointerup', onButtonUpInt)
  .on('pointerupoutside', onButtonUpInt)
  .on('pointerover', onButtonOverInt)
  .on('pointerout', onButtonOutInt);
  function onButtonDownInt() {sis_posfinaly=window.innerHeight+100;}
  function onButtonUpInt() {}
  function onButtonOverInt() {this.texture = interceptar_on;}
  function onButtonOutInt() {this.texture = interceptar_off;}

  b_flota
  // Mouse & touch events are normalized into
  // the pointer* events for handling different
  // button events.
  .on('pointerdown', onButtonDown)
  .on('pointerup', onButtonUp)
  .on('pointerupoutside', onButtonUp)
  .on('pointerover', onButtonOver)
  .on('pointerout', onButtonOut);
  function onButtonDown() {sis_posfinaly=window.innerHeight+100;}
  function onButtonUp() {}
  function onButtonOver() {this.texture = flotas_on;}
  function onButtonOut() {this.texture = flotas_off;}
*/
    panel.addChild(b_interceptar);
    panel.addChild(b_flota);
}

function creainfoRutas() {
    // se crea el panel de info de las flotas
    panelRuta = infoflotas.addChild(new PIXI.Sprite(PIXI.Texture.from("/astrometria/img/info-flota.png")));
    panelRuta.buttonMode = false;
    panelRuta.interactive = true;

    //panelRuta.alpha= 0.8;
    panelRuta.anchor.set(0.5);
    panelRuta.visible = false;

    txtpanelp1 = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpanelp1txt = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left" }));
    txtpanelp2 = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpanelp2txt = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left" }));
    txtpanelp3 = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: 0x50a2be, align: "left" }));
    txtpanelp3txt = panelRuta.addChild(new PIXI.Text(" ", { fontFamily: "roboto", fontSize: 12, fill: "orange", align: "left" }));

    txtpanelp1.anchor.set(0.5);
    txtpanelp1.position.set(0, -70);

    txtpanelp1txt.anchor.set(0.5);
    txtpanelp1txt.position.set(0, -55);

    txtpanelp2.anchor.set(0.5);
    txtpanelp2.position.set(0, -35);

    txtpanelp2txt.anchor.set(0.5);
    txtpanelp2txt.position.set(0, -20);

    txtpanelp3.anchor.set(0.5);
    txtpanelp3.position.set(0, 0);

    txtpanelp3txt.anchor.set(0.5);
    txtpanelp3txt.position.set(0, 20);

    var borrar_on = PIXI.Texture.from("/astrometria/img/botones/borraruta1.png");
    var borrar_off = PIXI.Texture.from("/astrometria/img/botones/borraruta0.png");
    var aceptar_on = PIXI.Texture.from("/astrometria/img/botones/aceptar1.png");
    var aceptar_off = PIXI.Texture.from("/astrometria/img/botones/aceptar0.png");

    b_aceptar = new PIXI.Sprite(aceptar_off); // se inicia activo
    b_aceptar.anchor.set(0.5);

    b_borrar = new PIXI.Sprite(borrar_off); // se inicia activo
    b_borrar.anchor.set(0.5);

    b_aceptar.position.set(40, 60);
    b_aceptar.interactive = true;
    b_aceptar.buttonMode = true;

    b_borrar.position.set(-40, 60);
    b_borrar.interactive = true;
    b_borrar.buttonMode = true;

    b_borrar
        .on("pointerdown", onButtonDownInt)
        .on("pointerup", onButtonUpInt)
        .on("pointerupoutside", onButtonUpInt)
        .on("pointerover", onButtonOverInt)
        .on("pointerout", onButtonOutInt);

    function onButtonDownInt() {
        ruta.length = 0;
        txtpanelp1txt.text = "Selecciona flota o planeta";
        txtpanelp2txt.text = "Selecciona flota o planeta";
        txtpanelp3txt.text = "Selecciona flota o planeta";
    }
    function onButtonUpInt() {}
    function onButtonOverInt() {
        this.texture = borrar_on;
    }
    function onButtonOutInt() {
        this.texture = borrar_off;
    }

    b_aceptar
        .on("pointerdown", onButtonDown)
        .on("pointerup", onButtonUp)
        .on("pointerupoutside", onButtonUp)
        .on("pointerover", onButtonOver)
        .on("pointerout", onButtonOut);

    function onButtonDown() {
        panelRuta.visible = false;
    }

    function onButtonUp() {}
    function onButtonOver() {
        this.texture = aceptar_on;
    }
    function onButtonOut() {
        this.texture = aceptar_off;
    }

    panelRuta.addChild(b_aceptar);
    panelRuta.addChild(b_borrar);
}

function createViewport() {
    viewport = app.stage.addChild(
        new PIXI.extras.Viewport({
            screenWidth: window.innerWidth,
            screenHeight: window.innerHeight,
            worldWidth: universo.ancho * 70,
            worldHeight: universo.global / universo.ancho * 70,
        }),
    );

    viewport
        .drag({
            direction: "all",
            pressDrag: true,
            wheel: true,
            wheelScroll: 1,
            reverse: false,
            clampWheel: false,
            underflow: "center",
            factor: 1,
            mouseButtons: "all",
            keyToPress: null,
            ignoreKeyToPressOnTouch: false,
        })
        .pinch()
        .wheel()
        .decelerate()
        //.bounce({time: 500}) //hace que el mapa rebote a la esquina

        .on("clicked", function() {
            //  viewport.snap( 3710, 980, {topLeft: false,time: 2000,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true})
            //log(viewport.zoom)
            //viewport.zoomPercent(0.5,false)
        })
        .on("moved", function() {
            //código para limpiar el panel de info de flotas.
            panel.visible = false;
            for (var i = auxImg.children.length - 1; i >= 0; i--) {
                auxImg.removeChild(auxImg.children[i]);
            }
            /////////////////////////////////////////////////
        });

    barra1 = app.stage.addChild(new PIXI.Container()); // crea la capa botones
    auxImg = app.stage.addChild(new PIXI.Container()); // contenedor para dibujos temporales
    botones = app.stage.addChild(new PIXI.Container()); // crea la capa botones
    textos = app.stage.addChild(new PIXI.Container()); // crea la capa textos

    capa_radares = viewport.addChild(new PIXI.Container()); // crea la capa radares
    capa_influencias = viewport.addChild(new PIXI.Container()); // crea la capa influencia propia
    capa_influencias2 = viewport.addChild(new PIXI.Container()); // crea la capa influencia externa

    capa_estrellas = viewport.addChild(new PIXI.Container()); // crea la capa flotas
    capa_rutas = viewport.addChild(new PIXI.Container()); // crea la capa radares
    capa_flotas = viewport.addChild(new PIXI.Container()); // crea la capa flotas

    sistemas = app.stage.addChild(new PIXI.Container()); // crea la capa sistemas

    // contenedor_efe_energia = app.stage.addChild(new PIXI.Container());
    infoflotas = app.stage.addChild(new PIXI.Container()); // crea la capa radares

    barraCarga = app.stage.addChild(new PIXI.Graphics());
    barraCarga.position.set(0, 0);

    cargaTexturasGeneral(); // llamo a la carga de las animaciones
    cargaCompleta();

    /*
        Shockwave_Filter = new PIXI.filters.ShockwaveFilter();
        Shockwave_Filter.center.x = 500;
        Shockwave_Filter.center.y = 100;
        Shockwave_Filter.radius = 100;
        Shockwave_Filter.brightness = 5;
        Shockwave_Filter.speed = 1000;
        Shockwave_Filter.wavelength = 300;
        cont_sistema.filters = [Shockwave_Filter];
        */

    // creabarra();
    txt_fps = textos.addChild(new PIXI.Text("FPS", { fontFamily: "Roboto", fontSize: 10, fill: "orange" }));
    txt_fps.anchor.set(0.5);
    txt_fps.position.set(30, window.innerHeight - 20);

    //resize();
    PIXI.Ticker.shared.add(function(dt) {
        app.render();

        mueve_sis(sis_posfinalx, sis_posfinaly);
        ajusta_zoom(viewport.zlevel);

        txt_fps.text = " ";
        txt_fps.text = Math.round(app.ticker.FPS) + " FPS";

        txt_zoom.text = " ";
        txt_zoom.text = Math.round(viewport.zlevel) + "%";

        //control de la posición del sistema home para mostrar el marcador verde
        let posicionx = (homex - viewport.hitArea.x) * (viewport.zlevel / 100);
        let posiciony = (homey - viewport.hitArea.y) * (viewport.zlevel / 100);

        var anguloFlecha = 0;
        var posx, posy;

        // control de la marcaHome. lo primero ver si el sistema home sale de la pantalla
        if (posicionx + 35 * (viewport.zlevel / 100) <= 0 || posicionx + 35 * (viewport.zlevel / 100) >= window.innerWidth || posiciony + 35 * (viewport.zlevel / 100) <= 0 || posiciony + 35 * (viewport.zlevel / 100) >= window.innerHeight) {
            marcaHome.visible = true;

            //sale por la izquierda
            if (posicionx + 35 * (viewport.zlevel / 100) <= 0) {
                posx = -5;
                posy = (homey + 35 - viewport.hitArea.y) * (viewport.zlevel / 100);
            }

            //sale por la derecha
            if (posicionx + 35 * (viewport.zlevel / 100) >= window.innerWidth) {
                posx = window.innerWidth - 5;
                posy = (homey + 35 - viewport.hitArea.y) * (viewport.zlevel / 100);
            }

            //sale por arriba
            if (posiciony + 35 * (viewport.zlevel / 100) <= 0) {
                posy = -5;
                posx = (homex + 35 - viewport.hitArea.x) * (viewport.zlevel / 100);
            }

            //sale por abajo
            if (posiciony + 35 * (viewport.zlevel / 100) >= window.innerHeight) {
                posy = window.innerHeight - 5;
                posx = (homex + 35 - viewport.hitArea.x) * (viewport.zlevel / 100);
            }

            //se ajusta posx y posy para que no salgan de los margenes de la pantalla
            if (posy <= -5) {
                posy = -5;
            }
            if (posx <= -5) {
                posx = -5;
            }
            if (posx >= window.innerWidth - 5) {
                posx = window.innerWidth - 5;
            }
            if (posy >= window.innerHeight - 5) {
                posy = window.innerHeight - 5;
            }

            marcaHome.position.set(posx, posy);
        } else {
            marcaHome.visible = false;
        }
    });
}

// se crean los sistemas (las estrellas) en el universo
function createWorld() {
    // borro el contenedor de las flotas para no duplicar elementos
    for (var i = capa_estrellas.children.length - 1; i >= 0; i--) {
        capa_estrellas.removeChild(capa_estrellas.children[i]);
    }

    for (var i = 0; i < universo.sistemas.length; i++) {
        var y = Math.floor(universo.sistemas[i].estrella / universo.ancho) * 70;
        var x = (universo.sistemas[i].estrella - Math.floor(universo.sistemas[i].estrella / universo.ancho) * universo.ancho) * 70;
        sistema = new Sistema(universo.sistemas[i].estrella, x, y, universo.sistemas[i].habitado);

        //se establecen las coordenadas x e y del sistema home
        if (universo.sistemas[i].estrella == home) {
            homex = x;
            homey = y;
        }
    }

    creainfoflotas();
    creainfoRutas();
    botonE();

    //centro el mapa
    viewport.snap(homex, homey, { topLeft: false, time: 2000, ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true });

    //se crea la marcaHome, el punto verde que indica la posición del sistema de inicio
    let texturamarcaHome = PIXI.Texture.from("/astrometria/img/flechahome.png");
    marcaHome = new PIXI.Sprite(texturamarcaHome); // se inicia activo
    marcaHome.anchor.set(0.5);
    marcaHome.position.set(window.innerWidth / 2, window.innerHeight / 2);
    app.stage.addChild(marcaHome);
    marcaHome.visible = false;
    marcaHome.interactive = true;
    marcaHome.buttonMode = true;
    marcaHome.on("click", event => {
        buscar(home);
    });
}

//se crean las flotas y las lineas de cada flota
function creaflotas() {
    const lista = document.getElementById("contenedorFlotas");
    while (lista.firstChild) {
        lista.removeChild(lista.lastChild);
    }

    // borro el contenedor de las flotas para no duplicar elementos
    for (var i = capa_flotas.children.length - 1; i >= 0; i--) {
        capa_flotas.removeChild(capa_flotas.children[i]);
    }

    num_flotas = flotas.flotas.length;
    for (var i = 0; i < flotas.flotas.length; i++) {
        var y = flotas.flotas[i].coordy;
        var x = flotas.flotas[i].coordx;

        line = new linea([flotas.flotas[i].coordix, flotas.flotas[i].coordiy, flotas.flotas[i].coordfx, flotas.flotas[i].coordfy], 2, flotas.flotas[i].color, 1, capa_flotas, i);
        flota = new Flota(flotas.flotas[i].numeroflota, x, y, flotas.flotas[i].angulo, flotas.flotas[i].nick, flotas.flotas[i].ataque, flotas.flotas[i].defensa, flotas.flotas[i].origen, flotas.flotas[i].destino, flotas.flotas[i].fecha, i);

        // se crea el panel de flotas y se inyecta en la estructura DOM
        const anchor = document.createElement("p");
        const list = document.getElementById("contenedorFlotas");
        const p = document.createElement("P");
        var flota = flotas.flotas[i].numeroflota;
        anchor.id = "parrafo";
        anchor.href = "#";
        anchor.innerText = flota;
        anchor.onclick = function() {
            buscar(this.innerText);
        };
        list.appendChild(anchor);
    }
}

function creaexflotas() {
    num_flotas = exflotas.length;
    for (var i = 0; i < exflotas.flotas.length; i++) {
        var y = exflotas.flotas[i].coordy;
        var x = exflotas.flotas[i].coordx;

        exflota = new exFlota(exflotas.flotas[i].numeroflota + flotas.length, x, y);
    }
}

// se crean las rutas
function crearutas() {
    var x, y;
    for (var i = 0; i < rutas.rutas.length; i++) {
        rutamapa = new Ruta(rutas.rutas[i].p1x, rutas.rutas[i].p1y, rutas.rutas[i].p2x, rutas.rutas[i].p2y, rutas.rutas[i].p3x, rutas.rutas[i].p3y, rutas.rutas[i].tipolinea, rutas.rutas[i].velocidad);
    }
}

// se crean los radares
function crearadares() {
    var x, y;
    for (var i = 0; i < radares.radares.length; i++) {
        let y = Math.floor(radares.radares[i].estrella / universo.ancho) * 70;
        let x = (radares.radares[i].estrella - Math.floor(radares.radares[i].estrella / universo.ancho) * universo.ancho) * 70;
        radar = new Radar(radares.radares[i].estrella, x, y, radares.radares[i].circulo, radares.radares[i].color);
    }
}
// se crean los radares
function creainfluencias() {
    //primero creo mi influencia en la capa influencias
    const graphics = new PIXI.Graphics();

    d = 0;
    influencia = 0;
    alpha = 1;
    for (let inf = 0; inf < influencias.miInfluencia.length; inf++) {
        max = influencias.miInfluencia[inf].circulo * 70;

        let y = Math.floor(influencias.miInfluencia[inf].estrella / universo.ancho) * 70;
        let x = (influencias.miInfluencia[inf].estrella - Math.floor(influencias.miInfluencia[inf].estrella / universo.ancho) * universo.ancho) * 70;

        for (var j = 0; j < influencias.miInfluencia[inf].circulo + 1; j++) {
            for (var i = 0; i < influencias.miInfluencia[inf].circulo + 1; i++) {
                d = Math.sqrt(i * 70 * (i * 70) + j * 70 * (j * 70));
                influencia = max - max * (d / max);
                alpha = influencia * 100 / max / 100;

                if (influencias.miInfluencia[inf].color == 1) {
                    graphics.beginFill(0x2980b9, alpha);
                } //azul
                if (influencias.miInfluencia[inf].color == 2) {
                    graphics.beginFill(0x51af61, alpha);
                } //verde
                if (influencias.miInfluencia[inf].color == 3) {
                    graphics.beginFill(0xde3249, alpha);
                } //rosa
                if (influencias.miInfluencia[inf].color == 4) {
                    graphics.beginFill(0xe74c3c, alpha);
                } //naranja

                graphics.drawRect(x + 35 + 70 * j, y + 35 + 70 * i, 70, 70);
                graphics.drawRect(x - 70 * j - 35, y + 35 + 70 * i, 70, 70);
                graphics.drawRect(x + 35 + 70 * j, y - 70 * i - 35, 70, 70);
                graphics.drawRect(x - 70 * j - 35, y - 70 * i - 35, 70, 70);
                graphics.endFill();
            }
        }
    }

    capa_influencias.addChild(graphics);

    //ahora creo el resto de incluencias

    for (var i = 0; i < influencias.influencia.length; i++) {
        let y = Math.floor(influencias.influencia[i].estrella / universo.ancho) * 70;
        let x = (influencias.influencia[i].estrella - Math.floor(influencias.influencia[i].estrella / universo.ancho) * universo.ancho) * 70;
        influencia = new Influencia(influencias.influencia[i].estrella, x, y, influencias.influencia[i].circulo, influencias.influencia[i].color);
    }
}

// Función para ajustar la pantalla cuando se cambia el tamaño
function resize() {
    cambios++;
    // log (cambios + " " + window.innerWidth/2)
    //  renderer.renderer.resize(window.innerWidth, window.innerHeight)
    //  viewport.resize(window.innerWidth, window.innerHeight, mapa.width, mapa.height)
    // Resize the renderer

    var nueva_pos = window.innerWidth / 2 - botones.width / 2;
    app.renderer.resize(window.innerWidth, window.innerHeight);
    botones.position.set(nueva_pos, 0);
    //openFullscreen()
    // You can use the 'screen' property as the renderer visible
    // area, this is more useful than view.width/height because
    // it handles resolution
    //viewport.position.set(renderer.screen.width, renderer.screen.height);
    panel.visible = false;
    for (var i = auxImg.children.length - 1; i >= 0; i--) {
        auxImg.removeChild(auxImg.children[i]);
    }
}

var app, viewport;

window.onload = function() {
    app = new PIXI.Application({
        transparent: true,
        width: window.innerWidth,
        height: window.innerHeight,
        resolution: window.devicePixelRatio,
        antialias: true,
        autoResize: true,
        resolution: devicePixelRatio,
    });
    document.body.appendChild(app.view);
    // app.view.style.position = 'fixed';
    app.view.style.width = "100vw";
    app.view.style.height = "100vh";
    app.view.style.top = 0;
    app.view.style.left = 0;

    // todo empieza con esta función, solo se empieza a generar el universo cuando se ha cargado la página por completo
    // y estamos seguros que todos los ficheros javascript están cargados y disponibles
    // empieza la magia...
    carga_universo();
};

var docu = document.documentElement;

// Listen for window resize events
window.addEventListener("resize", resize);
//window.addEventListener("mousemove", e => lineaprueba.updatePoints([e.clientX, e.clienty, null, null]), false);
// window.addEventListener("mousemove", e => lineaprueba.updatePoints([null, null, botones.x, botones.y]), false);
