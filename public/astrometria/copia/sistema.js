//const loader = new PIXI.loaders.Loader(); // you can also create your own if you want
/*
var sprites = {};
var loader = PIXI.loader.add('cloudstars',"img/botones/atacar0.png")
                        .add('star1',"img/botones/cerrar0.png")    
                        .add('star2',"img/botones/colonizar0.png")    
                        .add('star3',"img/botones/vflotas0.png")    
                        .add('star4',"img/botones/conquistar0.png")    
                        .add('ship',"img/botones/recolectar0.png")    
                        .add('shield_straight',"img/botones/atacar1.png")    
                        .add('shield_edge',"img/botones/cerrar1.png")    
                        .add('title_ship',"img/botones/colonizar1.png")    
                        .load(function (loader, resources) {        
                            sprites.cloudstars = new PIXI.extras.TilingSprite(resources.cloudstars.texture);
                            sprites.star1 = new PIXI.extras.TilingSprite(resources.star1.texture);        
                            sprites.star2 = new PIXI.extras.TilingSprite(resources.star2.texture);        
                            sprites.star3 = new PIXI.extras.TilingSprite(resources.star3.texture);        
                            sprites.star4 = new PIXI.extras.TilingSprite(resources.star4.texture);        
                            sprites.ship = new PIXI.Sprite(resources.ship.texture);        
                            sprites.shield_straight = new PIXI.Sprite(resources.shield_straight.texture);        
                            sprites.shield_edge = new PIXI.Sprite(resources.shield_edge.texture);        
                            sprites.title_ship = new PIXI.Sprite(resources.title_ship.texture);        
                            //var ready = setTimeout(accountSetup,3000);    
                        })
*/


function versistema(texto){

sis_posfinaly=window.innerHeight-280;
txtsistema.text =""
txtsistema.text =texto.n

//app.ticker.add(delta => gameLoop(delta, 20));

}

function mueve_sis( posfinalx,posfinaly){
  
  sistemas.y = (sistemas.y+(posfinaly-sistemas.y)*1/8);
  sistemas.x = (sistemas.x+(posfinalx-sistemas.x)*1/8);

}

function creasistemas(texto){

        // texturas para los botones
        var texturafondo = PIXI.Texture.fromImage('img/fondo_sistema.png');

        fondo_sistema = new PIXI.Sprite(texturafondo);
        
        // hacer el botón interactivo
        fondo_sistema.buttonMode = true;
        fondo_sistema.interactive = true;


        //fondo_sistema.anchor.set(0.5)
        fondo_sistema.position.set (0, 0)

        // add it to the stage
        sistemas.addChild(fondo_sistema);
        sistemas.x = (window.innerWidth/2) - 512;
        sistemas.y = window.innerHeight+100;

        txtsistema = sistemas.addChild(new PIXI.Text(' ',{fontFamily : 'Roboto',fontSize: 30,fill : "orange"}))
        txtsistema.anchor.set(0.5)
        txtsistema.position.set (47, 173)

        // texturas para boton cerrar
        var cerrar_on = PIXI.Texture.fromImage('img/botones/cerrar1.png');
        var cerrar_off = PIXI.Texture.fromImage('img/botones/cerrar0.png');
        var atacar_on = PIXI.Texture.fromImage('img/botones/atacar1.png');
        var atacar_off = PIXI.Texture.fromImage('img/botones/atacar0.png');
        var conquistar_on = PIXI.Texture.fromImage('img/botones/conquistar1.png');
        var conquistar_off = PIXI.Texture.fromImage('img/botones/conquistar0.png');
        var recolectar_on = PIXI.Texture.fromImage('img/botones/recolectar1.png');
        var recolectar_off = PIXI.Texture.fromImage('img/botones/recolectar0.png');
        var observar_on = PIXI.Texture.fromImage('img/botones/observar1.png');
        var observar_off = PIXI.Texture.fromImage('img/botones/observar0.png');
        var colonizar_on = PIXI.Texture.fromImage('img/botones/colonizar1.png');
        var colonizar_off = PIXI.Texture.fromImage('img/botones/colonizar0.png');
        var flotas_on = PIXI.Texture.fromImage('img/botones/vflotas1.png');
        var flotas_off = PIXI.Texture.fromImage('img/botones/vflotas0.png');

        b_cerrar = new PIXI.Sprite(cerrar_off) // se inicia activo
        b_atacar = new PIXI.Sprite(atacar_off) // se inicia activo
        b_conquistar = new PIXI.Sprite(conquistar_off) // se inicia activo
        b_recolectar = new PIXI.Sprite(recolectar_off) // se inicia activo
        b_observar = new PIXI.Sprite(observar_off) // se inicia activo
        b_colonizar = new PIXI.Sprite(colonizar_off) // se inicia activo
        b_flotas = new PIXI.Sprite(flotas_off) // se inicia activo

        b_cerrar.anchor.set(0.5)
        b_atacar.anchor.set(0.5)
        b_conquistar.anchor.set(0.5)
        b_recolectar.anchor.set(0.5)
        b_observar.anchor.set(0.5)
        b_colonizar.anchor.set(0.5)
        b_flotas.anchor.set(0.5)

        b_cerrar.position.set (47,255)
        b_atacar.position.set (355,255)
        b_conquistar.position.set (435,255)
        b_recolectar.position.set (515,255)
        b_observar.position.set (595,255)
        b_colonizar.position.set (675,255)
        b_flotas.position.set (755,255)

        // hacer el botón interactivo
        b_cerrar.interactive = true;
        b_cerrar.buttonMode = true;
        b_atacar.interactive = true;
        b_atacar.buttonMode = true;
        b_conquistar.interactive = true;
        b_conquistar.buttonMode = true;
        b_recolectar.interactive = true;
        b_recolectar.buttonMode = true;
        b_observar.interactive = true;
        b_observar.buttonMode = true;
        b_colonizar.interactive = true;
        b_colonizar.buttonMode = true;
        b_flotas.interactive = true;
        b_flotas.buttonMode = true;

        b_cerrar
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on('pointerdown', onButtonDown)
        .on('pointerup', onButtonUp)
        .on('pointerupoutside', onButtonUp)
        .on('pointerover', onButtonOver)
        .on('pointerout', onButtonOut);

        // add it to the stage
        sistemas.addChild(b_cerrar);
        sistemas.addChild(b_atacar);
        sistemas.addChild(b_conquistar);
        sistemas.addChild(b_recolectar);
        sistemas.addChild(b_observar);
        sistemas.addChild(b_colonizar);
        sistemas.addChild(b_flotas);

        function onButtonDown() {
            sis_posfinaly=window.innerHeight+100;;
          //  sis_posfinalx=100;
        }

        function onButtonUp() {

        }
        function onButtonOver() {
            this.texture = cerrar_on
        }

        function onButtonOut() {
            this.texture = cerrar_off
        }

}

function gameLoop(delta,posfinal){

  sistemas.y = (sistemas.y+(posfinal -sistemas.y)*1/8);
  log(sistemas.y)
}

/* valores de la variable colonia

col1=2,VCODE,vcode,1,-LR-,33,ACTIVO,40,40,40,40,40,60,1,1,1,1,1,181,0,0,1

0 ->nº del planeta
1 ->nombre del planeta, "?"=DESCONOCIDO
2 ->nombre del jugador, AVANDONADO, VACIO, "?"=MUY LEJOS
3 ->" D" DUEÑO
4 ->etiqueta alianza
5 ->
6 ->ACTIVO, AVANDONADO, "-"=Deshabitado
7 ->MINERAL
8 ->CRISTAL
9 ->GAS
10->PLASTICO
11->CERAMICA
12->
13->NAVES ORBITANDO=1, BLOQUEADO=2, PROTEGIDO=3
14->OBSERVAR
15->ATACAR
16->PERMISOS
17->
18->Nº DEL JUGADOR
19->COLONIZAR
20->RECOLECTAR
21->MENSAJE
*/