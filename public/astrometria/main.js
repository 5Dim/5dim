const log = console.log;
/*
setTimeout(function() {
  console.log("Bunny => " + bunny.width + " | " + bunny.height);
  console.log("Container => " + container.width + " | " + container.height);
}
, 1000);
*/

var universo = new Object();
var flotas = new Object();
var radares = new Object();
var botones;
var fondo;
var lineas;
var sistemas
var app;
var renderer;
var botA, botF, botR
const BORDER = 10
const WIDTH = 0
const HEIGHT = 0
var width = 0,
    height = 0
var cambios = 0
var sis_posfinaly = window.innerHeight + 100;
var sis_posfinalx = (window.innerWidth / 2) - 512;
var txt_fps = ""
var txt_zoom = ""
var lineaprueba


Sistema.prototype = Object.create(PIXI.Sprite.prototype);

function carga_universo() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            universo = JSON.parse(this.responseText);

            createViewport()
            createWorld()
            carga_flotas()
            carga_radares()


        }
    };
    log(xmlhttp);
    xmlhttp.open("GET", "/astrometria/data/universo.json", true);
    // xmlhttp.open("GET", "http://79.143.185.11/juego/astrometria/ajax/universo", true);
    xmlhttp.send();

}

function carga_flotas() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            flotas = JSON.parse(this.responseText);


            carga_textura_flotas()
            botonF()

        }
    };
    xmlhttp.open("GET", "/astrometria/data/flotas2.json", true);
    xmlhttp.send();

}

function carga_radares() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            radares = JSON.parse(this.responseText);

            crearadares()
            botonA(flotas.flotas.length)
            botonR()
            resize()
            lineaprueba = new Line([0, 0, -window.innerWidth / 2, -window.innerHeight / 2], 1.3, 0xFFFFFF);

            botones.addChild(lineaprueba);
        }
    };
    xmlhttp.open("GET", "/astrometria/data/radares.json", true);
    xmlhttp.send();
}

function createViewport() {

    viewport = app.stage.addChild(new PIXI.extras.Viewport({
        screenWidth: window.innerWidth,
        screenHeight: window.innerHeight,
        worldWidth: universo.ancho * 70,
        worldHeight: (universo.global / universo.ancho) * 70
    }))
    viewport
        .drag({
            clampWheel: true
        })
        .pinch()
        .wheel()
        .decelerate()
        .bounce({
            time: 1000
        })

        .on('clicked', function () {
            //  viewport.snap( 3710, 980, {topLeft: false,time: 2000,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true})
            //log(viewport.zoom)
            //viewport.zoomPercent(0.5,false)
            // log(viewport.zlevel)

        })
        .on('moved', function () {
            //diferenciax=-content_clip.inner_clip.ImageHolder.Content.flotas[_global.trackers[i]]._x-(content_clip.inner_clip.ImageHolder._x);
            // diferenciax=-(window.innerWidth/2)-(content_clip.inner_clip.ImageHolder._x);
            lineaprueba.updatePoints([null, null, -viewport.corner.x + 175, -viewport.corner.y + 135]) //viewport.corner + coordx del tracker
            log(viewport.corner.x)
        })

    botones = app.stage.addChild(new PIXI.Container())
    textos = app.stage.addChild(new PIXI.Container())
    capa_flotas = viewport.addChild(new PIXI.Container())
    capa_radares = viewport.addChild(new PIXI.Container())

    sistemas = app.stage.addChild(new PIXI.Container())

    creasistemas()

    txt_fps = textos.addChild(new PIXI.Text('FPS', {
        fontFamily: 'Roboto',
        fontSize: 15,
        fill: "orange"
    }))
    txt_fps.anchor.set(0.5)
    txt_fps.position.set(30, window.innerHeight - 20)

    //	resize()
    PIXI.ticker.shared.add(function (dt) {
        app.render();

        mueve_sis(sis_posfinalx, sis_posfinaly);
        ajusta_zoom(viewport.zlevel);

        txt_fps.text = ' ';
        txt_fps.text = Math.round(app.ticker.FPS) + ' FPS';

        txt_zoom.text = ' ';
        txt_zoom.text = Math.round(viewport.zlevel) + '%';

    })

}

function createWorld() {

    for (var i = 0; i < universo.sistemas.length; i++) {
        //  var box = viewport.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('img/estrella-blanca.png')))
        var y = Math.floor(universo.sistemas[i].estrella / universo.ancho) * 70;
        var x = (universo.sistemas[i].estrella - (Math.floor(universo.sistemas[i].estrella / universo.ancho) * universo.ancho)) * 70;
        sistema = new Sistema(universo.sistemas[i].estrella, x, y, universo.sistemas[i].habitado);

        //box.tint = Math.floor(Math.random() * 0xffffff)
        //box.width = box.height = 70
        // box.position.set(x, y)
        if (i < 50) {
            //  line = new linea([x+35, y+35, ((universo.sistemas[i+1].estrella-(Math.floor(universo.sistemas[i+1].estrella/universo.ancho)*universo.ancho))*70)+35, (Math.floor(universo.sistemas[i+1].estrella/universo.ancho)*70)+35], 1, 0x666666, 1);
        }

    }
}

function creaflotas() {
    num_flotas = flotas.flotas.length;
    for (var i = 0; i < flotas.flotas.length; i++) {
        //  var box = viewport.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('img/estrella-blanca.png')))
        var y = flotas.flotas[i].coordy
        var x = flotas.flotas[i].coordx
        flota = new Flota(flotas.flotas[i].numeroflota, x, y, flotas.flotas[i].angulo);
        line = new linea([flotas.flotas[i].coordix, flotas.flotas[i].coordiy, flotas.flotas[i].coordfx, flotas.flotas[i].coordfy], 2, 0x666666, 1);
    }
}

function crearadares() {
    var x, y
    for (var i = 0; i < radares.radares.length; i++) {

        for (var j = 0; j < universo.sistemas.length; j++) {
            //log(radares.radares[i].estrella+" : "+ universo.sistemas[j].estrella)
            if (radares.radares[i].estrella == universo.sistemas[j].estrella) {
                var y = Math.floor(universo.sistemas[j].estrella / universo.ancho) * 70;
                var x = (universo.sistemas[j].estrella - (Math.floor(universo.sistemas[j].estrella / universo.ancho) * universo.ancho)) * 70;
            }

        }

        radar = new Radar(radares.radares[i].estrella, x, y, radares.radares[i].circulo, radares.radares[i].color);

        //box.tint = Math.floor(Math.random() * 0xffffff)
        //box.width = box.height = 70
        // box.position.set(x, y)

    }
    // log(mapa.width + "x" + mapa.height);
    //   viewport.worldWidth=mapa.width
    //  viewport.worldHeight=mapa.height

    // border()
}

function resize() {
    cambios++
    // log (cambios + " " + window.innerWidth/2)
    //  renderer.renderer.resize(window.innerWidth, window.innerHeight)
    //  viewport.resize(window.innerWidth, window.innerHeight, mapa.width, mapa.height)
    // Resize the renderer
    var nueva_pos = window.innerWidth / 2
    app.renderer.resize(window.innerWidth, window.innerHeight);
    botones.x = nueva_pos;
    //openFullscreen()
    // You can use the 'screen' property as the renderer visible
    // area, this is more useful than view.width/height because
    // it handles resolution
    //viewport.position.set(renderer.screen.width, renderer.screen.height);
}

var app, viewport

window.onload = function () {
    app = new PIXI.Application({
        transparent: true,
        width: window.innerWidth,
        height: window.innerHeight,
        resolution: window.devicePixelRatio,
        antialias: true,
        autoResize: true,
        resolution: devicePixelRatio
    })
    document.body.appendChild(app.view)
    // app.view.style.position = 'fixed'
    app.view.style.width = '100vw'
    app.view.style.height = '100vh'
    app.view.style.top = 0
    app.view.style.left = 0





    carga_universo();

}

var docu = document.documentElement;




// Listen for window resize events
window.addEventListener('resize', resize);

//window.addEventListener("mousemove", e => lineaprueba.updatePoints([e.clientX, e.clienty, null, null]), false);

// window.addEventListener("mousemove", e => lineaprueba.updatePoints([null, null, botones.x, botones.y]), false);