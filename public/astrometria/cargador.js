/*
    for (i = 0; i < 50; i++) {
        // create an explosion AnimatedSprite
        var explosion = new PIXI.extras.AnimatedSprite(explosionTextures);
        explosion.rotation = Math.random() * Math.PI;
        explosion.scale.set(0.75 + Math.random() * 0.5);
        explosion.gotoAndPlay(Math.random() * 27);
        app.stage.addChild(explosion);
    }*/

/*
var ef_circulo = [];
var ef_transicion = [];
const ef_energia = [];
var textura_ef_circulo,textura_ef_transicion,textura_ef_energia;
//var ef_planeta = [];
//var textura_ef_planeta;
*/

let efNaves, exNaves, efTransicion, efEnergia, efGeneral, efPlanetas1, efNavesOrbitando, efEscudo;
let ef_circulo, ex_circulo, ef_transicion, ef_energia, ef_general, ef_planetas1;

let jsonNaves = "/astrometria/img/ef_circulo.json";
let jsonExtracciones = "/astrometria/img/ex_circulo.json";
let jsonTransicion = "/astrometria/img/efectos/transic.json";
//let jsonEnergia = 'img/efectos/energia2.json';
let jsonGeneral = "/astrometria/img/efectos-general.json";
let jsonPlanetas1 = "/astrometria/img/planetas1.json";

const carga = new PIXI.Loader();

function cargaTexturasGeneral() {
    //carga.add('img/sistema/p1.json');
    // log("Inicio");
    carga
        .add(jsonNaves)
        .add(jsonExtracciones)
        .add(jsonTransicion)
        .add(jsonGeneral)
        .add(jsonPlanetas1);
    // .add(jsonEnergia);
    carga.onProgress.add(verProgreso);
    carga.onComplete.add(cargaCompleta);
    carga.onError.add(verError);

    carga.load();
}

function verProgreso(e) {
    //log(e.progress);
    barraCarga.position.set(0, 0);
    barraCarga.beginFill(0xff3c28);
    barraCarga.drawRect(0, 0, e.progress, 2);
    barraCarga.endFill();
}

function cargaCompleta(e) {
    log("Carga completa");
    barraCarga.visible = true;

    ef_circulo = carga.resources[jsonNaves].spritesheet;
    ex_circulo = carga.resources[jsonExtracciones].spritesheet;
    ef_transicion = carga.resources[jsonTransicion].spritesheet;
    //ef_energia = carga.resources[jsonEnergia].spritesheet;
    ef_general = carga.resources[jsonGeneral].spritesheet;
    ef_planetas1 = carga.resources[jsonPlanetas1].spritesheet;
    // efNaves = new PIXI.AnimatedSprite(ef_circulo.animations["ef_circulo"]);
    // nave = capa_flotas.addChild(efNaves);

    creaflotas();
    creaexflotas();
    creasistemasolar();
}

function verError(e) {
    console.error("Error: " + e.message);
}

/*

function cargaTexturasGeneral(){

cargador.add('circulo', 'img/ef_circulo.json')
        .add('transicion','img/efectos/transic.json')
        .add('energia','img/efectos/energia2.json')

        .load(efectos_cargados);

}

function efectos_cargados() {

        // create an array to store the textures
        var i;

        for (i = 0; i < 74; i++) {
            textura_ef_circulo = PIXI.Texture.from('ef_circulo_' + (i) + '.png');
            ef_circulo.push(textura_ef_circulo);
        }

        var explosion = capa_flotas.addChild(new PIXI.AnimatedSprite(ef_circulo));
        explosion.anchor.set (0.5,0.5);
        explosion.pivot.set (0.5,0.5);
        explosion.gotoAndPlay(0);
        explosion.scale.set(1);
        explosion.rotation = (90*3.1416)/180;
        explosion.position.set (175, 35);
        explosion.animationSpeed = 0.4;

        for (i = 0; i < 25; i++) {
            textura_ef_transicion = PIXI.Texture.from('transicion_' + (i) + '.png');
            ef_transicion.push(textura_ef_transicion);
        }
        transicion = sistemas.addChild(new PIXI.AnimatedSprite(ef_transicion));


        transicion.scale.set(1);
        transicion.width =1024;
        transicion.height = 200;
        transicion.animationSpeed = 0.8;
        transicion.loop = true;

        // cargo las imagenes del efecto de energia
        for (i = 123; i > 0; i--) {
            //textura_ef_energia = PIXI.Texture.from('energia_' + (i) + '.png');
            textura_ef_energia = PIXI.Texture.from('energia2_' + (i) + '.png');
            ef_energia.push(textura_ef_energia);
        }





}

*/
