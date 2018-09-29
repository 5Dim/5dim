var ef_circulo = []
var textura_ef_circulo

function  carga_textura_flotas(){

PIXI.loader
    .add('circulo', 'astrometria/img/ef_circulo.json')
    .load(ef_circulo_cargado);

function ef_circulo_cargado() {

    // create an array to store the textures
    var i;

    for (i = 0; i < 74; i++) {
         textura_ef_circulo = PIXI.Texture.fromFrame('ef_circulo_' + (i) + '.png');
         ef_circulo.push(textura_ef_circulo);
    }
    var explosion = capa_flotas.addChild(new PIXI.extras.AnimatedSprite(ef_circulo));
    explosion.anchor.set (0.5,0.5)
    explosion.pivot.set (0.5,0.5)
    explosion.gotoAndPlay(0);
    explosion.scale.set(1);
    explosion.rotation = (90*3.1416)/180;
    log(explosion.rotation)
    explosion.position.set (175, 35)
    explosion.animationSpeed = 0.4;


    creaflotas()
}    

}
/*
    for (i = 0; i < 50; i++) {
        // create an explosion AnimatedSprite
        var explosion = new PIXI.extras.AnimatedSprite(explosionTextures);

        explosion.x = Math.random() * app.screen.width;
        explosion.y = Math.random() * app.screen.height;
        explosion.anchor.set(0.5);
        explosion.rotation = Math.random() * Math.PI;
        explosion.scale.set(0.75 + Math.random() * 0.5);
        explosion.gotoAndPlay(Math.random() * 27);
        app.stage.addChild(explosion);
    }*/


function Sistema(n, x, y, habitado) {

   var estrella = viewport.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('astrometria/img/estrella-blanca.png')))

       // box.tint = Math.floor(Math.random() * 0xffffff)
        estrella.width = estrella.height = 70
        estrella.position.set(x, y)
        estrella.interactive=true
        estrella.buttonMode = true
        
        //acciones para el botón
        estrella.on('pointerdown', (event) => {
	  	  versistema(this);
		})


	if (habitado==1){
        estrella.tint = 0x00CCE7
    }else {
        estrella.tint = 0xFFFFFF
    }
	this.n = n //numero de sistema
	this.px = x //posicion x
	this.py = y //posicion y
    this.hab = habitado
	
	//mapa.addChild(this);
	//log(mapa.width)
	// var box = viewport.addChild(new PIXI.Sprite(PIXI.Texture.WHITE))

	//texto = new PIXI.Container();
    //this.addChild(texto);

    var txt = viewport.addChild(new PIXI.Text(n,{fontFamily : 'Arial',fontSize: 12,fill : "white"}))
    a = txt.getBounds();
    txt.pivot.set(a.width/2,a.height/2)
    txt.x= x+35;
    txt.y= y+50;
   
}

function Radar(n, x, y, t, c) {

   var circulo = capa_radares.addChild(new PIXI.Graphics())

       // box.tint = Math.floor(Math.random() * 0xffffff)

        circulo.beginFill(0xFFFFFF); 
        circulo.drawCircle(Math.floor(Math.random() * viewport.width), Math.floor(Math.random() * viewport.height), 70*t); 
        circulo.endFill();  

        circulo.tint = Math.floor(Math.random() * 0xffffff)

		circulo.alpha = 0.2
/*
        circulo.width = box.height = 70
        circulo.position.set(x, y)
        circulo.interactive=true
        circulo.buttonMode = true
        circulo.on('touchend', (event) => {
	  	  log(this);
	  	  alert(this.n);
		})
		circulo.on('click', (event) => {
	  	  log(this);
	  	  alert(this.n);
		});
*/
	
	this.n = n //numero de sistema
	this.px = x //posicion x
	this.py = y //posicion y
	
}

function Flota(n, x, y, rotacion) {

   //var box = capa_flotas.addChild(new PIXI.Sprite(PIXI.Texture.fromImage('img/flota.png')))
   var box = capa_flotas.addChild(new PIXI.extras.AnimatedSprite(ef_circulo));

       // box.tint = Math.floor(Math.random() * 0xffffff)
       // box.width = box.height = 70
        box.gotoAndPlay(0);
        box.animationSpeed = 0.5      
        box.pivot.set (0.5,0.5)
        box.anchor.set (0.5,0.5)
        box.position.set(x, y)
        box.rotation = (rotacion*3.1416)/180 // rotation funciona en radianes por lo que hay que convertir de grados a radianes
        box.interactive=true
        box.buttonMode = true
        box.on('touchend', (event) => {
	  	  log(this);
	  	  alert(this.n);
		})
		box.on('click', (event) => {
	  	  log(this);
	  	//  capa_flotas.visible = false;
		});
	
		this.n = n //numero de sistema
		this.px = x //posicion x
		this.py = y //posicion y
	   
}


function linea(points,lineSize, lineColor, alpha){

		var line = capa_flotas.addChild(new PIXI.Graphics)

        var s = this.lineWidth = lineSize || 5;
        var c = this.lineColor = lineColor || "0x000000";
        var a = this.alpha = alpha || 1;

        line.lineStyle(s,c,a);
        line.moveTo(points[0], points[1]);
        line.lineTo(points[2], points[3]);

}


class Line extends PIXI.Graphics {
    constructor(points, lineSize, lineColor, alpha) {
        super();
        
        var s = this.lineWidth = lineSize || 5;
        var c = this.lineColor = lineColor || "0xFFFFFF";
        var a = this.alpha = alpha || 1;

        this.points = points;

        this.lineStyle(s, c, a)

        this.moveTo(points[0], points[1]);
        this.lineTo(points[2], points[3]);
    }
    
    updatePoints(p) {
        
        var points = this.points = p.map((val, index) => val || this.points[index]);
        
        var s = this.lineWidth, c = this.lineColor;
        
        this.clear();
        this.lineStyle(s, c);
        this.moveTo(points[0], points[1]);
        this.lineTo(points[2], points[3]);
    }
}



function botonA(texto){

	// texturas para los botones
	var textureButton = PIXI.Texture.fromImage('astrometria/img/botones/boton1.png');
	var textureButtonDown = PIXI.Texture.fromImage('astrometria/img/botones/boton1.png');
	var textureButtonOver = PIXI.Texture.fromImage('astrometria/img/botones/boton1.png');

    botA = new PIXI.Sprite(textureButton);
    botA.buttonMode = true;

    botA.anchor.set(0.5)
    botA.position.set (0, 20)

    botZ = new PIXI.Sprite(textureButton);
    botZ.buttonMode = true;

    botZ.anchor.set(0.5)
    botZ.position.set (50, 20)

/*
    // make the button interactive...
    button.interactive = true;
    button.buttonMode = true;

    button
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on('pointerdown', onButtonDown)
        .on('pointerup', onButtonUp)
        .on('pointerupoutside', onButtonUp)
        .on('pointerover', onButtonOver)
        .on('pointerout', onButtonOut);

        // Use mouse-only events
        // .on('mousedown', onButtonDown)
        // .on('mouseup', onButtonUp)
        // .on('mouseupoutside', onButtonUp)
        // .on('mouseover', onButtonOver)
        // .on('mouseout', onButtonOut)

        // Use touch-only events
        // .on('touchstart', onButtonDown)
        // .on('touchend', onButtonUp)
        // .on('touchendoutside', onButtonUp)
*/
    // add it to the stage
    botones.addChild(botA);
    botones.addChild(botZ);

    var nueva_pos = window.innerWidth/2
    botones.x = nueva_pos;

 	var txt = botones.addChild(new PIXI.Text("FLOTAS",{fontFamily : 'Roboto',fontSize: 10,fill : "white"}))
    txt.anchor.set(0.5)
    txt.position.set (botA.x, botA.y - 14)
	

    var txt_num = botones.addChild(new PIXI.Text(texto,{fontFamily : 'Roboto',fontSize: 18,fill : "orange"}))
    txt_num.anchor.set(0.5)
    txt_num.position.set (botA.x, botA.y+5 )

    var txt = botones.addChild(new PIXI.Text("ZOOM",{fontFamily : 'Roboto',fontSize: 10,fill : "white"}))
    txt.anchor.set(0.5)
    txt.position.set (botZ.x, botZ.y - 14)
    

    txt_zoom = botones.addChild(new PIXI.Text(viewport.zlevel,{fontFamily : 'Roboto',fontSize: 16,fill : "orange"}))
    txt_zoom.anchor.set(0.5)
    txt_zoom.position.set (botZ.x, botZ.y+5 )    

}


function botonF(){

    // texturas para los botones
    var text_on = PIXI.Texture.fromImage('astrometria/img/botones/flotas2.png');
    var text_off = PIXI.Texture.fromImage('astrometria/img/botones/flotas1.png');

    //estado del botón
    var estado = true

    botF = new PIXI.Sprite(text_on) // se inicia activo

    botF.anchor.set(0.5)
    botF.position.set (100, 20)

    // hacer el botón interactivo
    botF.interactive = true;
    botF.buttonMode = true;

    //acciones para el botón
    botF
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on('pointerdown', onButtonDown)
        .on('pointerup', onButtonUp)
        .on('pointerupoutside', onButtonUp)
        .on('pointerover', onButtonOver)
        .on('pointerout', onButtonOut);

    // add it to the stage
    botones.addChild(botF);

    var nueva_pos = window.innerWidth/2
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
    estado = ! estado 
    
    if (estado==true){
            this.texture = text_on
            capa_flotas.visible=true

    } else{ 
            this.texture = text_off
            capa_flotas.visible=false
    }

}

var FizzyText = function() {
  this.Buscar="";
  this.FullScreen= function() { openFullscreen() };
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
 var input_buscar = gui.add(text, 'Buscar').name('Buscar Sistema o flota');
    input_buscar.onFinishChange(function(value){
      buscar(value)
    });


 var fs = gui.add(text,'FullScreen').name('Pantalla completa (ESC) para salir');



/* View in fullscreen */
function openFullscreen() {

  if (docu.requestFullscreen) {
    docu.requestFullscreen();
  } else if (docu.mozRequestFullScreen) { /* Firefox */
    docu.mozRequestFullScreen();
  } else if (docu.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    docu.webkitRequestFullscreen();
  } else if (docu.msRequestFullscreen) { /* IE/Edge */
    docu.msRequestFullscreen();
  }
}

/* Close fullscreen */
function closeFullscreen() {
    
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) { /* Firefox */
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE/Edge */
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

function botonR(){
    
    // texturas para los botones
    var text_on = PIXI.Texture.fromImage('astrometria/img/botones/radar2.png');
    var text_off = PIXI.Texture.fromImage('astrometria/img/botones/radar1.png');

    //estado del botón
    var estado = true

    botR = new PIXI.Sprite(text_on) // se inicia activo

    botR.anchor.set(0.5)
    botR.scale.x = 1
    botR.scale.y = 1
    botR.position.set (150,20)

    // hacer el botón interactivo
    botR.interactive = true;
    botR.buttonMode = true;

    //acciones para el botón
    botR
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on('pointerdown', onButtonDown)
        .on('pointerup', onButtonUp)
        .on('pointerupoutside', onButtonUp)
        .on('pointerover', onButtonOver)
        .on('pointerout', onButtonOut);

    // add it to the stage
    botones.addChild(botR);

    var nueva_pos = window.innerWidth/2
    botones.x = nueva_pos;


function onButtonDown() {
    /*
    this.isdown = true;
    this.texture = textureButtonDown;
    this.alpha = 1;
    */
}

function onButtonUp() {

    estado = ! estado 
    
    if (estado==true){
            this.texture = text_on
            capa_radares.visible=true

    } else{ 
            this.texture = text_off
            capa_radares.visible=false
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

function buscar(value){

var sis, flo = false;

        for (var i = 0; i < universo.sistemas.length; i++){
            //flota = new Flota(flotas.flotas[i].numeroflota,x,y);
           if (universo.sistemas[i].estrella == value){
              var y = Math.floor(universo.sistemas[i].estrella/universo.ancho)*70;
              var x = (universo.sistemas[i].estrella-(Math.floor(universo.sistemas[i].estrella/universo.ancho)*universo.ancho))*70;
              viewport.snap(x, y, {topLeft: false,time: 2000,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true})
              sis=true;
            }

        }

        for (var i = 0; i < flotas.flotas.length; i++){
            //flota = new Flota(flotas.flotas[i].numeroflota,x,y);
           if (flotas.flotas[i].numeroflota == value){
              var y = flotas.flotas[i].coordy
              var x = flotas.flotas[i].coordx
              viewport.snap(x, y, {topLeft: false,time: 1500,ease: "easeInOutSine", removeOnComplete: true, removeOnInterrupt: true})
              flo=true;
            }
        }

if (!sis){
    //$("#alerta").show(2000);
   // document.body.appendChild(renderer.view)
   $("input").css({"color": '00ff00'})
}
if (!flo){
   // log("No se encuentra la flota " + value), alert("No se encuentra la flota " + value)
   $("input").css({"color": '00ff00'})
}      
if (!sis && !flo){
    //$("#alerta").show(2000);
   // document.body.appendChild(renderer.view)
   $("input").css({"color": "red"})
}

}
function alerta(texto){
    /*
    var node = document.createElement("span");
    var textnode = document.createTextNode("Water");

    document.getElementById("alerta").appendChild(textnode);

*/
$("#alerta").hide(1000);
}


//funcion para ajustar el zoom y que no pase del 100%
function ajusta_zoom(nivel){
    var dif = 0;
    if (nivel > 100){
        dif =Math.floor(nivel - 100)
       viewport.zoomPercent(- (dif/100),true)
    }
}