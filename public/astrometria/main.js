
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
var width = 0, height = 0;
var cambios =0;
var sis_posfinaly =window.innerHeight+100;
var sis_posfinalx=(window.innerWidth/2) - 512;
var txt_fps="";
var txt_num_flotas="";
var txt_zoom="";
var lineaprueba;
const jsonUniverso ="/astrometria/data/universo.json";
const jsonFlotas ="/astrometria/data/flotas.json";
const jsonRadares ="/astrometria/data/radares.json";
const jsonRutas ="/astrometria/data/rutas.json";
let home, homex, homey;
let creaRuta=false;
var ruta = [];




//flechasRuta = new PIXI.TilingSprite(texture,50000,8);

Sistema.prototype = Object.create(PIXI.Sprite.prototype);

function carga_universo(){

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        universo = JSON.parse(this.responseText);
            home=universo.inicio;
            createViewport();
           // carga_texturas();
		        createWorld();
		        carga_flotas();
            carga_radares();
            carga_rutas();
            timerFlotas = setInterval(tFlotas, 5000);
            botonF();
            botonRuta();
            botonMarcar();
            botones.position.set (window.innerWidth/2 - botones.width/2,0);
            log(botones.width);
            
            


            
  
		    }
		};
//	xmlhttp.open("GET",jsonUniverso , true);
  xmlhttp.open("GET", "/juego/astrometria/ajax/universo", true);
		xmlhttp.send();
		
}

function tFlotas() {
  var d = new Date();
  //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
 // alert("prueba");
  flotasNuevas();

}

function carga_flotas(){

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        flotas = JSON.parse(this.responseText);
           
           // botonF();
		      // log(flotas.flotas);
		    }
		};
		xmlhttp.open("GET", jsonFlotas, true);
		xmlhttp.send();
		
}
function creabarra(){
       fondobarra1 = barra1.addChild(new PIXI.Graphics())
       fondobarra1.beginFill(0x0f1217); 
       fondobarra1.drawRect  (0, 0, window.innerWidth,30)
       fondobarra1.endFill();
      // barra1.anchor.set(0.5);
}


function creainfoflotas(){
  // se crea el panel de info de las flotas
  panel = infoflotas.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/info-flota.png')));
  panel.buttonMode = false;
  panel.interactive = true;  
//  panel.alpha= 0.8;
  panel.anchor.set(0.5);
  panel.visible= false;

  txtpanelid = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be ,align: "left"}));
  txtpanelnick = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left",dropShadow: false,dropShadowBlur: 3,dropShadowColor: "#81f462", dropShadowDistance: 0}));
  txtpanelataque = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be,align: "left"}));
  txtpaneldefensa = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left"}));
  txtpanelorigen = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be,align: "left"}));
  txtpaneldestino = panel.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left"}));

  txtpanelid.anchor.set(0.5);
  txtpanelid.position.set (0, -70);

  txtpanelnick.anchor.set(0.5);
  txtpanelnick.position.set (0, -55);

  txtpanelataque.anchor.set(0.5);
  txtpanelataque.position.set (0, -35);

  txtpaneldefensa.anchor.set(0.5);
  txtpaneldefensa.position.set (0, -20);

  txtpanelorigen.anchor.set(0.5);
  txtpanelorigen.position.set (0, 0);

  txtpaneldestino.anchor.set(0.5);
  txtpaneldestino.position.set (0, 20);

  var interceptar_on = PIXI.Texture.from('/astrometria/img/botones/interceptar1.png');
  var interceptar_off = PIXI.Texture.from('/astrometria/img/botones/interceptar0.png');
  var flotas_on = PIXI.Texture.from('/astrometria/img/botones/vflotas1.png');
  var flotas_off = PIXI.Texture.from('/astrometria/img/botones/vflotas0.png');

  b_interceptar = new PIXI.Sprite(interceptar_on); // se inicia activo
  b_interceptar.anchor.set(0.5);

  b_flota = new PIXI.Sprite(flotas_on); // se inicia activo
  b_flota.anchor.set(0.5);

  b_interceptar.position.set (40,60);
  b_interceptar.interactive = true;
  b_interceptar.buttonMode = true;

  b_flota.position.set (-40,60);
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

function creainfoRutas(){
  // se crea el panel de info de las flotas
  panelRuta = infoflotas.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/info-flota.png')));
  panelRuta.buttonMode = false;
  panelRuta.interactive = true;  
//  panelRuta.alpha= 0.8;
  panelRuta.anchor.set(0.5);
  panelRuta.visible= false;

  txtpanelp1 = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be ,align: "left"}));
  txtpanelp1txt = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left"}));
  txtpanelp2 = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be,align: "left"}));
  txtpanelp2txt = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left"}));
  txtpanelp3 = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : 0x50a2be,align: "left"}));
  txtpanelp3txt = panelRuta.addChild(new PIXI.Text(' ',{fontFamily : 'roboto',fontSize: 12,fill : "orange",align: "left"}));

  txtpanelp1.anchor.set(0.5);
  txtpanelp1.position.set (0, -70);

  txtpanelp1txt.anchor.set(0.5);
  txtpanelp1txt.position.set (0, -55);

  txtpanelp2.anchor.set(0.5);
  txtpanelp2.position.set (0, -35);

  txtpanelp2txt.anchor.set(0.5);
  txtpanelp2txt.position.set (0, -20);

  txtpanelp3.anchor.set(0.5);
  txtpanelp3.position.set (0, 0);

  txtpanelp3txt.anchor.set(0.5);
  txtpanelp3txt.position.set (0, 20);

  var borrar_on = PIXI.Texture.from('/astrometria/img/botones/borraruta1.png');
  var borrar_off = PIXI.Texture.from('/astrometria/img/botones/borraruta0.png');
  var aceptar_on = PIXI.Texture.from('/astrometria/img/botones/aceptar1.png');
  var aceptar_off = PIXI.Texture.from('/astrometria/img/botones/aceptar0.png');

  b_aceptar = new PIXI.Sprite(aceptar_off); // se inicia activo
  b_aceptar.anchor.set(0.5);

  b_borrar = new PIXI.Sprite(borrar_off); // se inicia activo
  b_borrar.anchor.set(0.5);

  b_aceptar.position.set (40,60);
  b_aceptar.interactive = true;
  b_aceptar.buttonMode = true;

  b_borrar.position.set (-40,60);
  b_borrar.interactive = true;
  b_borrar.buttonMode = true;

  b_borrar
  // Mouse & touch events are normalized into
  // the pointer* events for handling different
  // button events.
  .on('pointerdown', onButtonDownInt)
  .on('pointerup', onButtonUpInt)
  .on('pointerupoutside', onButtonUpInt)
  .on('pointerover', onButtonOverInt)
  .on('pointerout', onButtonOutInt);
  function onButtonDownInt() {
    ruta.length=0;
    txtpanelp1txt.text = "Selecciona flota o planeta";
    txtpanelp2txt.text = "Selecciona flota o planeta";
    txtpanelp3txt.text = "Selecciona flota o planeta";
  }
  function onButtonUpInt() {}
  function onButtonOverInt() {this.texture = borrar_on;}
  function onButtonOutInt() {this.texture = borrar_off;} 

  b_aceptar
  // Mouse & touch events are normalized into
  // the pointer* events for handling different
  // button events.
  .on('pointerdown', onButtonDown)
  .on('pointerup', onButtonUp)
  .on('pointerupoutside', onButtonUp)
  .on('pointerover', onButtonOver)
  .on('pointerout', onButtonOut);
  function onButtonDown() {
    panelRuta.visible=false;
  }
  function onButtonUp() {}
  function onButtonOver() {this.texture = aceptar_on;}
  function onButtonOut() {this.texture = aceptar_off;} 

  panelRuta.addChild(b_aceptar);
  panelRuta.addChild(b_borrar);

}

function carga_radares(){

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        radares = JSON.parse(this.responseText);

		        crearadares();
            botonA(flotas.flotas.length);
            botonR();
           
            resize();

            //lineaprueba = new Line([0, 0, -window.innerWidth/2, -window.innerHeight/2],1.3, 0xFFFFFF);
            //botones.addChild(lineaprueba);
		    }
		};
		xmlhttp.open("GET",jsonRadares, true);
		xmlhttp.send();		
}
   
function carga_rutas(){

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          rutas = JSON.parse(this.responseText);

          crearutas();


          //lineaprueba = new Line([0, 0, -window.innerWidth/2, -window.innerHeight/2],1.3, 0xFFFFFF);
          //botones.addChild(lineaprueba);
      }
  };
  xmlhttp.open("GET",jsonRutas, true);
  xmlhttp.send();		
 
}
 

function createViewport()
{

    viewport = app.stage.addChild(new PIXI.extras.Viewport({
        screenWidth: window.innerWidth,
        screenHeight: window.innerHeight,
        worldWidth: universo.ancho*70,
        worldHeight: (universo.global/universo.ancho)*70
    }));
    viewport
        .drag({ direction: 'all',
        pressDrag: true,
        wheel: true,
        wheelScroll: 1,
        reverse: false,
        clampWheel: false,
        underflow: 'center',
        factor: 1,
        mouseButtons: 'all',
        keyToPress: null,
        ignoreKeyToPressOnTouch: false })
        .pinch()
        .wheel()
        .decelerate()
        //.bounce({time: 500}) //hace que el mapa rebote a la esquina
        
        .on('clicked', function ()
        {
          //  viewport.snap( 3710, 980, {topLeft: false,time: 2000,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true})
          //log(viewport.zoom)
          //viewport.zoomPercent(0.5,false)



        })
        .on('moved', function()
        {
          //diferenciax=-content_clip.inner_clip.ImageHolder.Content.flotas[_global.trackers[i]]._x-(content_clip.inner_clip.ImageHolder._x);
         // diferenciax=-(window.innerWidth/2)-(content_clip.inner_clip.ImageHolder._x);
         // lineaprueba.updatePoints([null, null, -viewport.corner.x+175, -viewport.corner.y+135 ]) //viewport.corner + coordx del tracker
         // log(viewport.corner.x)

         //código para limpiar el panel de info de flotas.
         panel.visible=false;
         for (var i = auxImg.children.length - 1; i >= 0; i--) {	auxImg.removeChild(auxImg.children[i]);}
         /////////////////////////////////////////////////

        });

        
        barra1 = app.stage.addChild(new PIXI.Container());            // crea la capa botones
        auxImg = app.stage.addChild(new PIXI.Container());        // contenedor para dibujos temporales
        botones = app.stage.addChild(new PIXI.Container());            // crea la capa botones
        textos = app.stage.addChild(new PIXI.Container());             // crea la capa textos
        capa_estrellas = viewport.addChild(new PIXI.Container());         // crea la capa flotas
        capa_flotas = viewport.addChild(new PIXI.Container());         // crea la capa flotas
        capa_radares = viewport.addChild(new PIXI.Container());        // crea la capa radares
        capa_rutas = viewport.addChild(new PIXI.Container());        // crea la capa radares
        capa_influencias = viewport.addChild(new PIXI.Container());        // crea la capa radares
        
        sistemas = app.stage.addChild(new PIXI.Container());           // crea la capa sistemas
        
       // contenedor_efe_energia = app.stage.addChild(new PIXI.Container());   
        infoflotas = app.stage.addChild(new PIXI.Container());        // crea la capa radares
        
        barraCarga = app.stage.addChild(new PIXI.Graphics());
        barraCarga.position.set(0,0);

   


        cargaTexturasGeneral();
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
        txt_fps = textos.addChild(new PIXI.Text('FPS',{fontFamily : 'Roboto',fontSize: 10,fill : "orange"}));
        txt_fps.anchor.set(0.5);
        txt_fps.position.set (30, window.innerHeight-20);

       	//	resize()
        PIXI.Ticker.shared.add(function (dt) { 
        app.render(); 

        mueve_sis(sis_posfinalx,sis_posfinaly);
        ajusta_zoom(viewport.zlevel);
        
        txt_fps.text  = ' ';
        txt_fps.text  = Math.round(app.ticker.FPS) + ' FPS';

        txt_zoom.text  = ' ';
        txt_zoom.text  = Math.round(viewport.zlevel) + '%';    
               
      
        //    log((homex - viewport.hitArea.x-(window.innerWidth/2))*(viewport.zlevel/100));
            let diferenciax = Math.abs((homex - viewport.hitArea.x)*(viewport.zlevel/100));
            let diferenciay = Math.abs((homey - viewport.hitArea.y)*(viewport.zlevel/100));
            let posicionx=(homex - viewport.hitArea.x)*(viewport.zlevel/100);
            let posiciony=(homey - viewport.hitArea.y)*(viewport.zlevel/100);
            let origenx= viewport.hitArea.x + (window.innerWidth/2);
            let origeny= viewport.hitArea.y + (window.innerHeight/2);

            var anguloFlecha=0;
            var posx, posy;

           // control de la marca verde. lo primero ver si el sistema home sale de la pantalla
            if ( posicionx+(35*(viewport.zlevel/100))<=0 || posicionx+ (35 * (viewport.zlevel/100)) >=window.innerWidth || posiciony+(35*(viewport.zlevel/100))<=0 || posiciony+ (35 * (viewport.zlevel/100)) >=window.innerHeight ){ 
              
              flechaHome.visible=true;

                //sale por la izquierda
                if(posicionx+(35*(viewport.zlevel/100))<=0){
                  posx=-5;
                  posy=(homey+35 - viewport.hitArea.y)*(viewport.zlevel/100);
                }
                //sale por la derecha
                if(posicionx+ (35 * (viewport.zlevel/100)) >=window.innerWidth ){
                  posx=window.innerWidth-5;
                  posy=(homey+35 - viewport.hitArea.y)*(viewport.zlevel/100);
                }
                //sale por arriba
                if(posiciony+(35*(viewport.zlevel/100))<=0){
                  posy=-5;
                  posx=(homex+35 - viewport.hitArea.x)*(viewport.zlevel/100);
                }
                //sale por abajo
                if(posiciony+ (35 * (viewport.zlevel/100)) >=window.innerHeight ){
                  posy=window.innerHeight-5;
                  posx=(homex+35 - viewport.hitArea.x)*(viewport.zlevel/100);
                }

                //se ajusta posx y posy para que no salgan de la pantalla
                if (posy<=-5){posy=-5;}
                if (posx<=-5){posx=-5;}
                if (posx>=window.innerWidth-5){posx=window.innerWidth-5;}
                if (posy>=window.innerHeight-5){posy=window.innerHeight-5;}

                flechaHome.position.set (posx,posy);  

            }else{
              flechaHome.visible=false;
            }
          
        });

}

// se crean los sistemas en el universo
function createWorld()
{
// borro el contenedor de las flotas para no duplicar elementos
for (var i = capa_estrellas.children.length - 1; i >= 0; i--) {	capa_estrellas.removeChild(capa_estrellas.children[i]);}
log("SISTEMAS: "+ universo.sistemas.length);
    for (var i = 0; i < universo.sistemas.length; i++){
      //  var box = viewport.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('img/estrella-blanca.png')))
      var y = Math.floor(universo.sistemas[i].estrella/universo.ancho)*70;
    	var x = (universo.sistemas[i].estrella-(Math.floor(universo.sistemas[i].estrella/universo.ancho)*universo.ancho))*70;
    	sistema  = new Sistema(universo.sistemas[i].estrella,x,y,universo.sistemas[i].habitado);
    	if(universo.sistemas[i].estrella==home){
        homex = x;
        homey= y;
      }
        //box.tint = Math.floor(Math.random() * 0xffffff)
        //box.width = box.height = 70
       // box.position.set(x, y)
       if (i < 50){
           // line = new linea([x+35, y+35, ((universo.sistemas[i+1].estrella-(Math.floor(universo.sistemas[i+1].estrella/universo.ancho)*universo.ancho))*70)+35, (Math.floor(universo.sistemas[i+1].estrella/universo.ancho)*70)+35], 1, 0x666666, 1);
        }
        
    }
    creainfoflotas();
    creainfoRutas();
    botonE();
  

    //centro el mapa
    viewport.snap(homex, homey, {topLeft: false,time: 2000,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true});
    let texturaflechaHome = PIXI.Texture.from('/astrometria/img/flechahome.png');
    flechaHome = new PIXI.Sprite(texturaflechaHome); // se inicia activo
    flechaHome.anchor.set(0.5);
    flechaHome.position.set (window.innerWidth/2, window.innerHeight/2);
    app.stage.addChild(flechaHome);
    flechaHome.visible=false;
}

//se crean las flotas
function creaflotas()
{
 
  const lista=document.getElementById('contenedorFlotas');
  while (lista.firstChild) {
    lista.removeChild(lista.lastChild);
  }
  // borro el contenedor de las flotas para no duplicar elementos
  for (var i = capa_flotas.children.length - 1; i >= 0; i--) {	capa_flotas.removeChild(capa_flotas.children[i]);}

  num_flotas=flotas.flotas.length;
  for (var i = 0; i < flotas.flotas.length; i++){
      var y = flotas.flotas[i].coordy;
      var x = flotas.flotas[i].coordx;
      
    	flota = new Flota(flotas.flotas[i].numeroflota,x,y,flotas.flotas[i].angulo,flotas.flotas[i].nick,flotas.flotas[i].ataque,flotas.flotas[i].defensa,flotas.flotas[i].origen,flotas.flotas[i].destino,flotas.flotas[i].fecha,i);
      line = new linea([flotas.flotas[i].coordix, flotas.flotas[i].coordiy, flotas.flotas[i].coordfx, flotas.flotas[i].coordfy], 2, 0x666666, 1,capa_flotas,i); 


    // se crea el panel de flotas y se inyecta en la estructura DOM 
     const anchor = document.createElement('p');
     const list = document.getElementById('contenedorFlotas');
     const p = document.createElement('P');
     var flota = flotas.flotas[i].numeroflota;
     anchor.id ="parrafo";
     anchor.href = '#';
     anchor.innerText = flota;
     anchor.onclick= function() {buscar(this.innerText);};
     list.appendChild(anchor);

 
  }
 
}

// se crean los radares
function crearutas()
{
	var x, y; 
    for (var i = 0; i < rutas.rutas.length; i++){

     rutamapa = new Ruta(rutas.rutas[i].p1x,rutas.rutas[i].p1y,rutas.rutas[i].p2x,rutas.rutas[i].p2y,rutas.rutas[i].p3x,rutas.rutas[i].p3y,rutas.rutas[i].tipolinea,rutas.rutas[i].velocidad);
        
    }

   
}

// se crean los radares
function crearadares()
{
	var x, y; 
    for (var i = 0; i < radares.radares.length; i++){

     
      let y = Math.floor(radares.radares[i].estrella/universo.ancho)*70;
      let x = (radares.radares[i].estrella-(Math.floor(radares.radares[i].estrella/universo.ancho)*universo.ancho))*70;
      radar = new Radar(radares.radares[i].estrella,x,y,radares.radares[i].circulo,radares.radares[i].color);
        
    }

   
}

// Función para ajustar la pantalla cuando se cambia el tamaño
function resize()
{
  cambios ++;
 // log (cambios + " " + window.innerWidth/2)
  //  renderer.renderer.resize(window.innerWidth, window.innerHeight)
  //  viewport.resize(window.innerWidth, window.innerHeight, mapa.width, mapa.height)
  // Resize the renderer
  var nueva_pos = window.innerWidth/2 - botones.width/2;
  app.renderer.resize(window.innerWidth, window.innerHeight);
  botones.position.set(nueva_pos,0);
  //openFullscreen()
  // You can use the 'screen' property as the renderer visible
  // area, this is more useful than view.width/height because
  // it handles resolution
  //viewport.position.set(renderer.screen.width, renderer.screen.height);
  panel.visible=false;
  for (var i = auxImg.children.length - 1; i >= 0; i--) {	auxImg.removeChild(auxImg.children[i]);}
}

var app, viewport;

window.onload = function ()
{
    app = new PIXI.Application({ transparent: true, width: window.innerWidth, height: window.innerHeight, resolution: window.devicePixelRatio, antialias: true,autoResize: true,
  resolution: devicePixelRatio });
    document.body.appendChild(app.view);
   // app.view.style.position = 'fixed';
    app.view.style.width = '100vw';
    app.view.style.height = '100vh';
    app.view.style.top = 0;
    app.view.style.left = 0;


    // todo empieza con esta función, solo se empieza a generar el universo cuando se ha cargado la página por completo
    // y estamos seguros que todos los ficheros javascript están cargados y disponibles
    // empieza la magia...
    carga_universo();

};

var docu = document.documentElement;




// Listen for window resize events
	window.addEventListener('resize', resize);

  //window.addEventListener("mousemove", e => lineaprueba.updatePoints([e.clientX, e.clienty, null, null]), false);
  
 // window.addEventListener("mousemove", e => lineaprueba.updatePoints([null, null, botones.x, botones.y]), false);

