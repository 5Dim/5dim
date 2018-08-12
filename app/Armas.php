<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armas extends Model
{
    //public $timestamps = false;

    public function  generarDatosArmas(){

        $armas=[];

                $arma =new Armas();
                $arma->codigo=59;
                $arma->nombre='Motor Químico';
                $arma->descripcion='El motor básico de cualquier cohete, proporciona un empuje constante alimentado por la combustión de propulsores';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=3;
                $arma->clase='invPropQuimico';
                $arma->niveltec=0;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=60;
                $arma->nombre='Motor nuclear';
                $arma->descripcion='Los motores nucleares nos dan la primera oportunidad de viajar a otras estrellas en un tiempo razonable.';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=4;
                $arma->clase='invPropNuk';
                $arma->niveltec=0;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=61;
                $arma->nombre='Motor iones';
                $arma->descripcion='Los nuevos avances tecnoloógicos nos premiten crar un codigo de motor muy ligero y rápido como alternativa al motor nuclear.';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=5;
                $arma->clase='invPropIon';
                $arma->niveltec=1;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=62;
                $arma->nombre='Motor de plasma';
                $arma->descripcion='Los motores de plasma son mucho mas caros de construir y mantener, peligrosos si son dañados en un combate y además complicados de hacer. Sin embargo podemos obtener unas velocidades muy altas y una cantidad de energía enorme muy util para montar tod';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=5;
                $arma->clase='invPropPlasma';
                $arma->niveltec=1;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=63;
                $arma->nombre='Motor MA';
                $arma->descripcion=' No se conoce fuente de energía mas compacta que la antimateria, podemos crear sistemas de propulsión basados en ella como combustible en combinación con nuestros conocimientos en otros propulsores.';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=10;
                $arma->clase='invPropMa';
                $arma->niveltec=1;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=64;
                $arma->nombre='Motor HMA';
                $arma->descripcion=' La energía que podemos extraer de la antimateria es tan enorme que es posible crear un pliegue en el espacio-tiempo de tal forma que se puede viajar entre dos puntos distantes en un instante.';
                $arma->jugadores_id=1;
                $arma->ranura="motor";
                $arma->potencia=10;
                $arma->clase='invPropHMA';
                $arma->niveltec=5;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=65;
                $arma->nombre='Titanio N';
                $arma->descripcion='El Titanio N es un blindaje especial para naves espaciales, pese a su elevado peso da una protección excelente frente a impactos y armas energéticas';
                $arma->jugadores_id=1;
                $arma->ranura="blindaje";
                $arma->potencia=13;
                $arma->clase='invBlindaje';
                $arma->niveltec=2;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=66;
                $arma->nombre='Reactivo N';
                $arma->descripcion='El blindaje reactivo combina la resistencia de un blindaje de Titanio N con una gran durabilidad frente a detonaciones';
                $arma->jugadores_id=1;
                $arma->ranura="blindaje";
                $arma->potencia=15;
                $arma->clase='invBlindaje';
                $arma->niveltec=4;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=67;
                $arma->nombre='Resinas A';
                $arma->descripcion='Mediante resinas metálicas autoendurecibles y expansivas logramos que tras un impacto cualquier brecha quede sellada al instante';
                $arma->jugadores_id=1;
                $arma->ranura="blindaje";
                $arma->potencia=9;
                $arma->clase='invBlindaje';
                $arma->niveltec=8;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=68;
                $arma->nombre='Placas TAC';
                $arma->descripcion='Con una aleacion titanio-aluminio-carbono y tratamientos nanotecnologicos de templado obtenemos una material tremendamente duro, flexible y rápido de producir, aunque muy pesado y caro';
                $arma->jugadores_id=1;
                $arma->ranura="blindaje";
                $arma->potencia=15;
                $arma->clase='invBlindaje';
                $arma->niveltec=11;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=69;
                $arma->nombre='Carbonadio';
                $arma->descripcion='Este material creado a partir de resinas, es la version moldeable de otro compuesto mucho ma caro y dificil de trabajar usado para piezas muy concretas de los motores M-A';
                $arma->jugadores_id=1;
                $arma->ranura="blindaje";
                $arma->potencia=30;
                $arma->clase='invBlindaje';
                $arma->niveltec=15;

                array_push($armas, $arma);



                $niveltec=1;

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Compactador';
                $arma->descripcion='La óptima distribución de la carga en una bodega puede mejorar de forma considerable la capacidad, esta mejora aumenta la carga por unidad';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=0;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Ctrl de puntería';
                $arma->descripcion='Estadísticamente podemos predecir las maniobras de cada codigo de nave y así poder mejorar la puntería de nuestras armas';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=0;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Escudos';
                $arma->descripcion='Combinando un campo electromagnético y nanotecnología podemos bloquear parte del fuego enemigo';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=16;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Prop. maniobra';
                $arma->descripcion='Gran cantidad de combustible se va en las maniobras de atraque y reajuste de rumbo. Con pequeños motores químicos podemos reducir el gasto de los motores principales';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='C. Nanos';
                $arma->descripcion='Podemos catalizar los procesos naníticos de producción de naves mejorando enormemente la velocidad de construcción';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=14;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Salvas';
                $arma->descripcion='Mediante el antiguo sistema de disparar munición falsa para corregir errores en los disparos verdaderos, podemos ahorrar munición';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=10;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);


                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Aleaciones';
                $arma->descripcion='Incorporando aleaciones mas ligeras en las partes no vitales de las naves podemos reducir sensiblemente su peso, aunque para obtener las mismas prestaciones los costos son elevados';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=12;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Standartd';
                $arma->descripcion='Mediante el uso de piezas iguales en todas las naves podemos reducir considerablemente los gastos diarios de las naves';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=15;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);


                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Plegado';
                $arma->descripcion='Partes de las naves que queremos meter en los hangares pueden ser desmontadas o plegadas aumentando la capacidad disponible hasta un límite';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=13;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Ariete';
                $arma->descripcion='Con esta mejora podemos aumentar mucho el daño de las armas a corta distancia';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='Foco';
                $arma->descripcion='Podemos mejorar el daño a las naves que mas daño queremos hacer ';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='F-caza';
                $arma->descripcion='Con esta mejora nuestras armas a cazas realizan una predicción de posición de mas efectiva aumentando el daño a los cazas';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='F-ligera';
                $arma->descripcion='Podemos aumentar el daño sólo a naves ligeras sin seguimos sus patrones de movimiento';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='F-media';
                $arma->descripcion='Conociendo la estruictura de las naves medias es facil causar más daños, esto lo consigue esta mejora a bajo costo.';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=$niveltec+69;
                $arma->nombre='F-pesada';
                $arma->descripcion='Causar más daño a pesadas no es sólo cuestión de potencia, esta mejora analiza sus puntos débiles.';
                $arma->jugadores_id=1;
                $arma->ranura="mejora";
                $arma->potencia=8;
                $arma->clase='invIa';
                $arma->niveltec=$niveltec;$niveltec++;

                array_push($armas, $arma);




                $arma =new Armas();
                $arma->codigo=90;
                $arma->nombre='Contenedor de carga';
                $arma->descripcion='Módulo básico de carga, compuesto de un contenedor standard intercambiable';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=20000;
                $arma->clase='invCarga';
                $arma->niveltec=1;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=91;
                $arma->nombre='Vagón de carga';
                $arma->descripcion='Contenedor de carga ampliado y mejorado, con sistema de descarga rápido y enganche magnético';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=40000;
                $arma->clase='invCarga';
                $arma->niveltec=5;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=92;
                $arma->nombre='Bahia de carga';
                $arma->descripcion='Enorme sistema de carga con sistema de compresión incluido';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMediana";
                $arma->potencia=200000;
                $arma->clase='invCarga';
                $arma->niveltec=8;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=93;
                $arma->nombre='Gran almacén de carga';
                $arma->descripcion='Sistema mejorado de almacenamiento y distribucion robotizado';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=500000;
                $arma->clase='invCarga';
                $arma->niveltec=14;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=94;
                $arma->nombre='Contenedor Adimensional';
                $arma->descripcion='Almacena la carga en un estado de cuántico';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=1000000;
                $arma->clase='invCarga';
                $arma->niveltec=23;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=95;
                $arma->nombre='Almacén N-dimensional';
                $arma->descripcion='Almacena la carga en un estado de indeterminación entre varios universos paralelos';
                $arma->jugadores_id=1;
                $arma->ranura="cargaEnorme";
                $arma->potencia=3000000;
                $arma->clase='invCarga';
                $arma->niveltec=18;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=96;
                $arma->nombre='Almacén de Materia oscura';
                $arma->descripcion='Almacena la carga como materia oscura condensada';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMega";
                $arma->potencia=7000000;
                $arma->clase='invCarga';
                $arma->niveltec=25;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=97;
                $arma->nombre='Hangar de cazas';
                $arma->descripcion='Cada unidad de hangar da cabida para un caza';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=1;
                $arma->clase='invCarga';
                $arma->niveltec=3;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=98;
                $arma->nombre='Muelle naves ligeras';
                $arma->descripcion='Hangar de atraque para naves ligeras, cada uno da cabida para una nave ligera';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMediana";
                $arma->potencia=1;
                $arma->clase='invCarga';
                $arma->niveltec=12;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=99;
                $arma->nombre='Puerto naves medias';
                $arma->descripcion='Puerto para atracar naves medias, con todos los sistemas de reparacion y mantenimiento necesarios para 1 nave media';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=1;
                $arma->clase='invCarga';
                $arma->niveltec=16;

                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=100;
                $arma->nombre='Puerto naves pesadas';
                $arma->descripcion='Puerto para atracar naves pesadas, con todos los sistemas de reparacion y mantenimiento necesarios para 1 nave pesada';
                $arma->jugadores_id=1;
                $arma->ranura="cargaEnorme";
                $arma->potencia=1;
                $arma->clase='invCarga';
                $arma->niveltec=18;

                array_push($armas, $arma);


                $arma =new Armas();
                $arma->codigo=101;
                $arma->nombre='Puerto estaciones';
                $arma->descripcion='Puerto para atracar estaciones, con todos los sistemas de reparacion y mantenimiento necesarios para 1 estación';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMega";
                $arma->potencia=1;
                $arma->clase='invCarga';
                $arma->niveltec=25;

                array_push($armas, $arma);

            /////////////////////////////  ARMAS   //////////////////////////////////////////////////////


            $arma =new Armas();
            $arma->codigo=11;
            $arma->nombre='Cañón ligero de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasLigera";
            $arma->potencia=300;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=12;
            $arma->nombre='Cañón medio de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMedia";
            $arma->potencia=600;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=13;
            $arma->nombre='Cañón pesado de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasPesada";
            $arma->potencia=1200;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=14;
            $arma->nombre='Cañón insertado de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasInsertada";
            $arma->potencia=2400;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=15;
            $arma->nombre='Cañón pesado de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMisil";
            $arma->potencia=900;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=16;
            $arma->nombre='Bomba de energía';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasBomba";
            $arma->potencia=3600;
            $arma->clase='invEnergia';
            $arma->niveltec=1;
            array_push($armas, $arma);




            $arma =new Armas();
            $arma->codigo=21;
            $arma->nombre='Cañón ligero de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasLigera";
            $arma->potencia=300;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=22;
            $arma->nombre='Cañón medio de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMedia";
            $arma->potencia=600;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=23;
            $arma->nombre='Cañón pesado de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasPesada";
            $arma->potencia=1200;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=24;
            $arma->nombre='Cañón insertado de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasInsertada";
            $arma->potencia=2400;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=25;
            $arma->nombre='Cañón pesado de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMisil";
            $arma->potencia=900;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=26;
            $arma->nombre='Bomba de plasma';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasBomba";
            $arma->potencia=3600;
            $arma->clase='invPlasma';
            $arma->niveltec=1;
            array_push($armas, $arma);




            $arma =new Armas();
            $arma->codigo=31;
            $arma->nombre='Cañón ligero de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasLigera";
            $arma->potencia=300;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=32;
            $arma->nombre='Cañón medio de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMedia";
            $arma->potencia=600;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=33;
            $arma->nombre='Cañón pesado de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasPesada";
            $arma->potencia=1200;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=34;
            $arma->nombre='Cañón insertado de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasInsertada";
            $arma->potencia=2400;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=35;
            $arma->nombre='Cañón pesado de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMisil";
            $arma->potencia=900;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=36;
            $arma->nombre='Bomba de balística';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasBomba";
            $arma->potencia=3600;
            $arma->clase='invBalistica';
            $arma->niveltec=1;
            array_push($armas, $arma);





            $arma =new Armas();
            $arma->codigo=41;
            $arma->nombre='Cañón ligero de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasLigera";
            $arma->potencia=300;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=42;
            $arma->nombre='Cañón medio de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMedia";
            $arma->potencia=600;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=43;
            $arma->nombre='Cañón pesado de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasPesada";
            $arma->potencia=1200;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=44;
            $arma->nombre='Cañón insertado de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasInsertada";
            $arma->potencia=2400;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=45;
            $arma->nombre='Cañón pesado de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasMisil";
            $arma->potencia=900;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);

            $arma =new Armas();
            $arma->codigo=46;
            $arma->nombre='Bomba de MA';
            $arma->descripcion='';
            $arma->jugadores_id=1;
            $arma->ranura="armasBomba";
            $arma->potencia=3600;
            $arma->clase='invMa';
            $arma->niveltec=1;
            array_push($armas, $arma);


            foreach($armas as $estearma){
                $estearma->save();
            }

        //return $result;
    }






}