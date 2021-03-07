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
  
  sis_posfinaly=window.innerHeight-210;
  txtsistema.text ="";
  txtsistema.text =texto.n;

  
  // borro el contenedor del sistema solar
  for (var i = cont_sistema.children.length - 1; i >= 0; i--) {	cont_sistema.removeChild(cont_sistema.children[i]);}

  // borro el contenedor de los efectos del sistema solar
  for (var i = contenedor_efe_energia.children.length - 1; i >= 0; i--) {	contenedor_efe_energia.removeChild(contenedor_efe_energia.children[i]);}

  //app.ticker.add(delta => gameLoop(delta, 20));

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          sistema_solar = JSON.parse(this.responseText);
          creaplanetas();
      }
  };


  //const jsonSistema ="/astrometria/data/planetas.json";
  //xmlhttp.open("GET", "jsonSistema", true);
  xmlhttp.open("GET", "/juego/astrometria/ajax/sistema/" + texto.n, true);
  xmlhttp.send();

}
function creaplanetas(){
  
  transicion.play();
  transicion.onLoop = function () {
    for (var i = 0; i < sistema_solar.planetas.length; i++){
    
      if(sistema_solar.planetas[i].nom_jug.length != 0){
       planetas[i] = new Planeta(sistema_solar.planetas[i].planeta,sistema_solar.planetas[i].nom_pla,sistema_solar.planetas[i].nom_jug,sistema_solar.planetas[i].alianza,sistema_solar.planetas[i].estado,sistema_solar.planetas[i].mineral,sistema_solar.planetas[i].cristal,sistema_solar.planetas[i].gas,sistema_solar.planetas[i].plastico,sistema_solar.planetas[i].ceramica,sistema_solar.planetas[i].b_observar,sistema_solar.planetas[i].b_atacar, sistema_solar.planetas[i].b_colonizar,sistema_solar.planetas[i].b_recolectar,sistema_solar.planetas[i].b_conquistar,sistema_solar.planetas[i].naves,sistema_solar.planetas[i].img_planeta,sistema_solar.planetas[i].bloqueo);   
       }
    }
    transicion.stop();
  };

  sol.texture = PIXI.Texture.from(sistema_solar.imgsol);
  //for (var i = contenedor_efe_energia.children.length - 1; i >= 0; i--) {	contenedor_efe_energia.removeChild(contenedor_efe_energia.children[i]);};   
}


function mueve_sis( posfinalx,posfinaly){
 
  sistemas.y = (sistemas.y+(posfinaly-sistemas.y)*1/8);
  sistemas.x = (sistemas.x+(posfinalx-sistemas.x)*1/8);

}

function creasistemasolar(texto){
  efTransicion = new PIXI.AnimatedSprite(ef_transicion.animations["transicion"]);
  
  //this.energia.scale.set(1);

  //efEnergia.visible =false; 

  // usar máscara si la zona está delimitada
  mascara = sistemas.addChild(new PIXI.Graphics());
  mascara.beginFill(0xff3c28); 
  mascara.drawRect  (0, 0, 150,1000);
  mascara.endFill();
  
  fondo_sistema = sistemas.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/fondo_sistema-200.png')));
  cont_sistema = sistemas.addChild(new PIXI.Container());
  contenedor_efe_energia = sistemas.addChild(new PIXI.Container());   
  cont_sistema.visible =true;
  sol = sistemas.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/sistema/sol1.png')));
  fondo_sistema_marco = sistemas.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/fondo_sistema-200_marco.png')));
  sol.mask = mascara;    
  sol.anchor.set(0.5);

  // posicionar los planetas
  fondo_sistema.position.set (0, 0);
  sol.position.set(0, 50);
  
  // hacer el botón interactivo
  fondo_sistema.buttonMode = false;
  fondo_sistema.interactive = true;     


  transicion = sistemas.addChild(efTransicion);
  transicion.width = 1024;

  sistemas.x = (window.innerWidth/2) - 512;
  sistemas.y = window.innerHeight+100;

  // se coloca el texto con el numero del sistema solar
  txtsistema = sistemas.addChild(new PIXI.Text(' ',{fontFamily : 'arial black',fontSize: 25,fill : "orange"}));
  txtsistema.anchor.set(0.5);
  txtsistema.position.set (45, 180);

  var cerrar_on = PIXI.Texture.from('/astrometria/img/botones/b-cerrar1.png');
  var cerrar_off = PIXI.Texture.from('/astrometria/img/botones/b-cerrar0.png');

  b_cerrar = new PIXI.Sprite(cerrar_on); // se inicia activo
  b_cerrar.anchor.set(0.5);
  b_cerrar.scale.set(0.75);
  b_cerrar.position.set (1005,18);
  b_cerrar.interactive = true;
  b_cerrar.buttonMode = true;

  b_cerrar
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
  function onButtonOver() {this.texture = cerrar_on;}
  function onButtonOut() {this.texture = cerrar_off;} 

  sistemas.addChild(b_cerrar);
}

function Planeta(n, nompla,nomjug, alianza, estado,mineral,cristal,gas,plastico, ceramica, b_obs, b_at, b_col, b_recol,b_con, naves,imagen_planeta,bloqueo) {
  
  efEnergia = new PIXI.AnimatedSprite(ef_general.animations["energia"]);   
  efEnergia.width = 60;
  efEnergia.anchor.set (0.5,0.5);
  efEnergia.alpha = 1;
  efEnergia.play();    
  efEnergia.visible =false;  

  efNavesOrbitando= new PIXI.AnimatedSprite(ef_general.animations["orb"]);
  efNavesOrbitando.width = 60;
  efNavesOrbitando.anchor.set (0.5,0.5);
  efNavesOrbitando.alpha = 1;
  efNavesOrbitando.play();    
  efNavesOrbitando.visible =false;  

  efEscudo= new PIXI.AnimatedSprite(ef_general.animations["escudo"]);
  efEscudo.width = 60;
  efEscudo.anchor.set (0.5);
  efEscudo.alpha = 1;
  efEscudo.play();    
  efEscudo.visible =false;    


      this.n = n; //numero de sistema
      this.nompla = nompla; //posicion x
      this.nomjug = nomjug; //posicion x
      this.alianza = alianza; //posicion x
      this.estado = estado; //posicion x
      this.mineral = mineral; //posicion x
      this.cristal = cristal; //posicion x
      this.gas = gas; //posicion x
      this.plastico = plastico; //posicion x
      this.bot_observar = b_obs; //posicion y
      this.bot_atacar = b_at; //posicion y
      this.bot_colonizar = b_col; //posicion y
      this.bot_recolectar = b_recol; //posicion y
      this.bot_conquistar = b_con; //posicion y
      this.naves_orbitando = naves; //posicion y
      this.img_planet =imagen_planeta;
      this.bloqueado=bloqueo; // 0=sin bloqueo, 1=defendiendo, 2=bloqueado
     
      this.efe_energia = cont_sistema.addChild(efEnergia);
      this.efe_energia.animationSpeed = -0.25;
      this.efe_energia.anchor.set(0.5);
      this.efe_energia.position.set((n*100)+44, 100);


/*  
      var str = imagen_planeta;
      var res = str.substr(12, 2);

      // efecto planeta girando

      this.efPlanetas1 = new PIXI.AnimatedSprite(ef_planetas1.animations[imagen_planeta]);
      
      planet = cont_sistema.addChild(this.efPlanetas1);
      
      if(!planet.playing){
        planet.play();  
      }
       
      planet.width = 75;
      planet.height = 75;
      planet.animationSpeed = 0.165;
      planet.anchor.set (0.5,0.5);
      planet.position.set( (n*100)+44 , 50);
      planet.interactive=true;
      planet.buttonMode = true;
*/

      // texturas para los botones
      this.texturaPlaneta = PIXI.Texture.from('/astrometria/img/sistema/planeta'+imagen_planeta+'.png');
      
      planet = new PIXI.Sprite(this.texturaPlaneta);
      planet.interactive=true;
      planet.buttonMode = true;

      planet.anchor.set(0.5);
      planet.position.set ((n*100)+44 , 50);

      //planet = cont_sistema.addChild(this.texturaPlaneta);
      cont_sistema.addChild(planet);

      this.capa_botones = cont_sistema.addChild(new PIXI.Container());  
      this.capa_botones.visible=false;
      this.capa_botones.interactive=false;
      this.capa_botones.buttonMode = false;

      this.capa_botones.position.set( 0, 0);
      this.capa_botones.x = 255;
      this.capa_botones.y = 185;

      this.efe_orbitando = cont_sistema.addChild(efNavesOrbitando);
      this.efe_orbitando.height = 75;
      this.efe_orbitando.animationSpeed = 0.50;
      this.efe_orbitando.anchor.set(0.5);
      this.efe_orbitando.position.set((n*100)+75, 20);

      if (naves){
        this.efe_orbitando.visible = true;
      }
 
      this.efe_escudo = cont_sistema.addChild(efEscudo);
      this.efe_escudo.width = 75;
      this.efe_escudo.height = 75;
      this.efe_escudo.animationSpeed = -0.25;
      this.efe_escudo.anchor.set(0.5);
      this.efe_escudo.position.set((n*100)+44, 50);
      
      // 0=sin bloqueo, 1=defendiendo, 2=bloqueado
      if ( this.bloqueado==1){
      
        this.efe_escudo.visible = true;
      }      
      if ( this.bloqueado==2){
        this.efe_escudo.tint = 0xff0000;
        this.efe_escudo.visible = true;
      }    
      // formato para el nombre del planeta
      var nom_planet = cont_sistema.addChild(new PIXI.Text(n,{dropShadow: true,
      dropShadowBlur: 10,
      dropShadowColor: "#539095",
      dropShadowDistance: 0,
      fill: "#4ba4a4",
      fontFamily: "Tahoma",
      fontSize: 14,
      fontVariant: "normal",
      fontWeight: 100}));

      
      nom_planet.text=nompla.toUpperCase();
      nom_planet.anchor.set (0.5);
      nom_planet.position.set((n*100)+44 , 100);

      var marca_planet = cont_sistema.addChild(new PIXI.Sprite(PIXI.Texture.from('/astrometria/img/marca-nombre-planeta.png')));
      marca_planet.anchor.set (0.5,0.5);
      marca_planet.position.set( (n*100)+44 , 100);



      // formato para el nombre del jugador
      var nom_jugador = cont_sistema.addChild(new PIXI.Text(n,{dropShadow: false,
        dropShadowBlur: 7,
        dropShadowColor: "#81f462",
        dropShadowDistance: 0,
        fill: "#81f462",
        fontFamily: "Helvetica",
        fontSize: 12,
        fontVariant: "small-caps",
        fontWeight: 100}));
    
        nom_jugador.text=nomjug;
        nom_jugador.anchor.set (0.5);
        nom_jugador.position.set((n*100)+44 , 120);
    
      // formato para el texto "Recursos"
      var txt_recursos = cont_sistema.addChild(new PIXI.Text(n,{dropShadow: false,
      fill: "#ffffff",
      fontFamily: "Helvetica",
      fontSize: 15,
      fontVariant: "small-caps",
      fontWeight: "lighter"}));

      txt_recursos.text="recursos";
      txt_recursos.anchor.set (0.5);
      txt_recursos.position.set((n*100)+44 , 140);
    
      // formato para la cantidad de recursos
      var txt_cant_recursos = cont_sistema.addChild(new PIXI.Text(n,{dropShadow: false,
        dropShadowBlur: 1,
      dropShadowColor: "#d96a07",
      dropShadowDistance: 0,
        fill: "#ff7800",
        fontFamily: "Helvetica",
        fontSize: 12,
        fontVariant: "small-caps",
        fontWeight: "normal"}));
    
        txt_cant_recursos.text=mineral +" " + cristal  +" " + gas +" " + plastico +" " + ceramica;
        txt_cant_recursos.anchor.set (0.5);
        txt_cant_recursos.position.set((n*100)+44 , 155);

        // texturas para los botones

        var atacar_on = PIXI.Texture.from('/astrometria/img/botones/atacar1.png');
        var atacar_off = PIXI.Texture.from('/astrometria/img/botones/atacar0.png');
        var conquistar_on = PIXI.Texture.from('/astrometria/img/botones/conquistar1.png');
        var conquistar_off = PIXI.Texture.from('/astrometria/img/botones/conquistar0.png');
        var recolectar_on = PIXI.Texture.from('/astrometria/img/botones/recolectar1.png');
        var recolectar_off = PIXI.Texture.from('/astrometria/img/botones/recolectar0.png');
        var observar_on = PIXI.Texture.from('/astrometria/img/botones/observar1.png');
        var observar_off = PIXI.Texture.from('/astrometria/img/botones/observar0.png');
        var colonizar_on = PIXI.Texture.from('/astrometria/img/botones/colonizar1.png');
        var colonizar_off = PIXI.Texture.from('/astrometria/img/botones/colonizar0.png');
        var flotas_on = PIXI.Texture.from('/astrometria/img/botones/vflotas1.png');
        var flotas_off = PIXI.Texture.from('/astrometria/img/botones/vflotas0.png');

        if (b_obs==1){
          b_observar = new PIXI.Sprite(observar_on);
          b_observar.interactive = true;
          b_observar.buttonMode = true;
        }else{
          b_observar = new PIXI.Sprite(observar_off);
          b_observar.interactive = false;
          b_observar.buttonMode = false;
        }
        if (b_at==1){
          b_atacar = new PIXI.Sprite(atacar_on);
          b_atacar.interactive = true;
          b_atacar.buttonMode = true;
        }else{
          b_atacar = new PIXI.Sprite(atacar_off);
          b_atacar.interactive = false;
          b_atacar.buttonMode = false;
        }
        if (b_col==1){
          b_colonizar = new PIXI.Sprite(colonizar_on);
          b_colonizar.interactive = true;
          b_colonizar.buttonMode = true;
        }else{
          b_colonizar = new PIXI.Sprite(colonizar_off);
          b_colonizar.interactive = false;
          b_colonizar.buttonMode = false;
        }
        if (b_recol==1){
          b_recolectar = new PIXI.Sprite(recolectar_on);
          b_recolectar.interactive = true;
          b_recolectar.buttonMode = true;
        }else{
          b_recolectar = new PIXI.Sprite(recolectar_off);
          b_recolectar.interactive = false;
          b_recolectar.buttonMode = false;
        }
        if (b_con==1){
          b_conquistar = new PIXI.Sprite(conquistar_on);
          b_conquistar.interactive = true;
          b_conquistar.buttonMode = true;
        }else{
          b_conquistar = new PIXI.Sprite(conquistar_off);
          b_conquistar.interactive = false;
          b_conquistar.buttonMode = false;
        }
        if (naves==1){
          b_flotas = new PIXI.Sprite(flotas_on);
          b_flotas.interactive = true;
          b_flotas.buttonMode = true;
        }else{
          b_flotas = new PIXI.Sprite(flotas_off);
          b_flotas.interactive = false;
          b_flotas.buttonMode = false;
        }


        //se establece el punto de ancla para las coordenadas en el centro

        b_atacar.anchor.set(0.5)
        b_conquistar.anchor.set(0.5)
        b_recolectar.anchor.set(0.5)
        b_observar.anchor.set(0.5)
        b_colonizar.anchor.set(0.5)
        b_flotas.anchor.set(0.5)

        //se establece la posición de inicio de cada botón
        b_atacar.position.set (55,0)
        b_conquistar.position.set (135,0)
        b_recolectar.position.set (215,0)
        b_observar.position.set (295,0)
        b_colonizar.position.set (375,0)
        b_flotas.position.set (455,0)

        b_atacar.on('click', (event) => {
          log(this.n);
        });

       this.capa_botones.addChild(b_flotas);
       this.capa_botones.addChild(b_observar);
       this.capa_botones.addChild(b_atacar);
       this.capa_botones.addChild(b_colonizar);
       this.capa_botones.addChild(b_recolectar);
       this.capa_botones.addChild(b_conquistar);
      
        //acciones para el botón
        planet.on('pointerdown', (event) => {
          log(this); 
          // oculto la capa_botones de todos los planetas

          for (var i = 0; i < planetas.length; i++){
            if (planetas[i] != null){
               planetas[i].capa_botones.visible=false;
               planetas[i].efe_energia.visible=false;
            }
          }
          this.capa_botones.visible=true; 
          this.efe_energia.visible =true; 

          //compruebo si se esta creando una ruta y añado el planeta
          puntoRuta=txtsistema.text+"x"+this.n;
          if (creaRuta){
            if (ruta.length<=2){
              if(ruta.length==0){txtpanelp1txt.text = puntoRuta;}
              if(ruta.length==1){txtpanelp2txt.text = puntoRuta;}
              if(ruta.length==2){txtpanelp3txt.text = puntoRuta;}
            ruta.push(puntoRuta);
            
            }log(ruta);
          }
     
                    
        });   
        
}

function gameLoop(delta,posfinal){

  sistemas.y = (sistemas.y+(posfinal -sistemas.y)*1/8);

 
  //log(sistemas.y)
}

/* valores de la variable colonia
                                                        14  16   18   20
     0   1     2   3   4   5   6     7  8  9 10 11 12 13  15  17    19  21
col1=2,VCODE,vcode,1,-LR-,33,ACTIVO,40,40,40,40,40,60,1,1,1,1,1,181,0,0,1

0 ->nº del planeta
1 ->nombre del planeta, "?"=DESCONOCIDO
2 ->nombre del jugador, ABANDONADO, VACIO, "?"=MUY LEJOS
3 ->"D" DUEÑO
4 ->etiqueta alianza
5 ->
6 ->ACTIVO, ABANDONADO, "-"=Deshabitado
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