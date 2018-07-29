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
                $arma->ranura="motores";
                $arma->potencia=3;
                $arma->clase=3;
                $arma->niveltec=0;
                $arma->malcance=5;
                $arma->dispersion=0;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=60;
                $arma->nombre='Motor nuclear';
                $arma->descripcion='Los motores nucleares nos dan la primera oportunidad de viajar a otras estrellas en un tiempo razonable.';
                $arma->jugadores_id=1;
                $arma->ranura="motores";
                $arma->potencia=4;
                $arma->clase=12;
                $arma->niveltec=0;
                $arma->malcance=5;
                $arma->dispersion=2;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=61;
                $arma->nombre='Motor iones';
                $arma->descripcion='Los nuevos avances tecnoloógicos nos premiten crar un codigo de motor muy ligero y rápido como alternativa al motor nuclear.';
                $arma->jugadores_id=1;
                $arma->ranura="motores";
                $arma->potencia=5;
                $arma->clase=13;
                $arma->niveltec=1;
                $arma->malcance=5;
                $arma->dispersion=4;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=62;
                $arma->nombre='Motor de plasma';
                $arma->descripcion='Los motores de plasma son mucho mas caros de construir y mantener, peligrosos si son dañados en un combate y además complicados de hacer. Sin embargo podemos obtener unas velocidades muy altas y una cantidad de energía enorme muy util para montar tod';
                $arma->jugadores_id=1;
                $arma->ranura="motores";
                $arma->potencia=5;
                $arma->clase=14;
                $arma->niveltec=1;
                $arma->malcance=10;
                $arma->dispersion=6;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=63;
                $arma->nombre='Motor MA';
                $arma->descripcion=' No se conoce fuente de energía mas compacta que la antimateria, podemos crear sistemas de propulsión basados en ella como combustible en combinación con nuestros conocimientos en otros propulsores.';
                $arma->jugadores_id=1;
                $arma->ranura="motores";
                $arma->potencia=10;
                $arma->clase=15;
                $arma->niveltec=1;
                $arma->malcance=10;
                $arma->dispersion=8;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=64;
                $arma->nombre='Motor HMA';
                $arma->descripcion=' La energía que podemos extraer de la antimateria es tan enorme que es posible crear un pliegue en el espacio-tiempo de tal forma que se puede viajar entre dos puntos distantes en un instante.';
                $arma->jugadores_id=1;
                $arma->ranura="motores";
                $arma->potencia=10;
                $arma->clase=16;
                $arma->niveltec=5;
                $arma->malcance=5;
                $arma->dispersion=5;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=65;
                $arma->nombre='Titanio N';
                $arma->descripcion='El Titanio N es un blindaje especial para naves espaciales, pese a su elevado peso da una protección excelente frente a impactos y armas energéticas';
                $arma->jugadores_id=1;
                $arma->ranura="blindajes";
                $arma->potencia=13;
                $arma->clase=10;
                $arma->niveltec=2;
                $arma->malcance=4;
                $arma->dispersion=0;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=66;
                $arma->nombre='Reactivo N';
                $arma->descripcion='El blindaje reactivo combina la resistencia de un blindaje de Titanio N con una gran durabilidad frente a detonaciones';
                $arma->jugadores_id=1;
                $arma->ranura="blindajes";
                $arma->potencia=15;
                $arma->clase=10;
                $arma->niveltec=4;
                $arma->malcance=3;
                $arma->dispersion=0;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=67;
                $arma->nombre='Resinas A';
                $arma->descripcion='Mediante resinas metálicas autoendurecibles y expansivas logramos que tras un impacto cualquier brecha quede sellada al instante';
                $arma->jugadores_id=1;
                $arma->ranura="blindajes";
                $arma->potencia=9;
                $arma->clase=10;
                $arma->niveltec=8;
                $arma->malcance=5;
                $arma->dispersion=0;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=68;
                $arma->nombre='Placas TAC';
                $arma->descripcion='Con una aleacion titanio-aluminio-carbono y tratamientos nanotecnologicos de templado obtenemos una material tremendamente duro, flexible y rápido de producir, aunque muy pesado y caro';
                $arma->jugadores_id=1;
                $arma->ranura="blindajes";
                $arma->potencia=15;
                $arma->clase=10;
                $arma->niveltec=11;
                $arma->malcance=6;
                $arma->dispersion=0;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=69;
                $arma->nombre='Carbonadio';
                $arma->descripcion='Este material creado a partir de resinas, es la version moldeable de otro compuesto mucho ma caro y dificil de trabajar usado para piezas muy concretas de los motores M-A';
                $arma->jugadores_id=1;
                $arma->ranura="blindajes";
                $arma->potencia=30;
                $arma->clase=10;
                $arma->niveltec=15;
                $arma->malcance=8;
                $arma->dispersion=-60;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=70;
                $arma->nombre='Optimizador';
                $arma->descripcion='Podemos optimizar nuestros diseños empleando parte de la energía sobrante en ciertos sistema para reducir los costos';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=13;
                $arma->clase=7;
                $arma->niveltec=4;
                $arma->malcance=5;
                $arma->dispersion=-5;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=71;
                $arma->nombre='Escudos';
                $arma->descripcion='Combinando u campo elertromagnético y nanotecnología podemos bloquear parte del fuego enemigo';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=16;
                $arma->clase=7;
                $arma->niveltec=6;
                $arma->malcance=5;
                $arma->dispersion=5;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=72;
                $arma->nombre='Salvas';
                $arma->descripcion='Mediante el antiguo sistema de disparar munición falsa para corregir errores en los disparos verdaderos, podemos ahorrar munición';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=10;
                $arma->clase=7;
                $arma->niveltec=10;
                $arma->malcance=5;
                $arma->dispersion=10;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=73;
                $arma->nombre='Standartd';
                $arma->descripcion='Mediante el uso de piezas iguales en todas las naves podemos reducir considerablemente los gastos diarios de las naves';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=15;
                $arma->clase=7;
                $arma->niveltec=11;
                $arma->malcance=5;
                $arma->dispersion=7;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=74;
                $arma->nombre='Ctrl de puntería';
                $arma->descripcion='Estadisticamente podemos predecir las maniobras de cada codigo de nave y así poder mejorar la puntería de nuestras armas';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=0;
                $arma->clase=7;
                $arma->niveltec=7;
                $arma->malcance=2;
                $arma->dispersion=10;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=75;
                $arma->nombre='Aleaciones';
                $arma->descripcion='Incorporando aleaciones mas ligeras en las partes no vitales de las naves podemos reducir sensiblemente su peso, aunque para obtener las mismas prestaciones los costos son elevados';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=12;
                $arma->clase=7;
                $arma->niveltec=8;
                $arma->malcance=5;
                $arma->dispersion=2;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=76;
                $arma->nombre='Baterias';
                $arma->descripcion='Almacenando parte de la energía obtenida durante los desplazamientos podemos usarla mas adelante durante los sistemas de armas';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=13;
                $arma->clase=7;
                $arma->niveltec=9;
                $arma->malcance=5;
                $arma->dispersion=10;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=77;
                $arma->nombre='Distribuidor';
                $arma->descripcion='Colocando esta mejora al final de todas reduce el costo de  todas las mejoras anteriores ya que las redistribuye dentro de la nave de la forma optima';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=13;
                $arma->clase=7;
                $arma->niveltec=3;
                $arma->malcance=10;
                $arma->dispersion=1;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=78;
                $arma->nombre='Compactador';
                $arma->descripcion='La óptima distribución de la carga en una bodega puede mejorar de forma considerable la capacidad, esta mejora aumenta la carga por unidad';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=0;
                $arma->clase=7;
                $arma->niveltec=2;
                $arma->malcance=10;
                $arma->dispersion=30;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=79;
                $arma->nombre='Prop. maniobra';
                $arma->descripcion='Gran cantidad de combustible se va en las maniobras de atraque y reajuste de rumbo. Con pequeños motores químicos podemos reducir el gasto de los motores principales';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=1;
                $arma->malcance=2;
                $arma->dispersion=10;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=80;
                $arma->nombre='C. Nanos';
                $arma->descripcion='Podemos catalizar los procesos naníticos de producción de naves mejorando enormemente la velocidad de construcción';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=14;
                $arma->clase=7;
                $arma->niveltec=5;
                $arma->malcance=4;
                $arma->dispersion=10;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=81;
                $arma->nombre='Plegado';
                $arma->descripcion='Partes de las naves que queremos meter en los hangares pueden ser desmontadas o plegadas aumentando la capacidad disponible hasta un límite';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=13;
                $arma->clase=7;
                $arma->niveltec=12;
                $arma->malcance=2;
                $arma->dispersion=70;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=82;
                $arma->nombre='Ariete';
                $arma->descripcion='Con esta mejora podemos aumentar mucho el daño de las armas a corta distancia';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=3;
                $arma->malcance=2;
                $arma->dispersion=70;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=83;
                $arma->nombre='Foco';
                $arma->descripcion='Podemos mejorar el daño a las naves que mas daño queremos hacer ';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=4;
                $arma->malcance=2;
                $arma->dispersion=127;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=84;
                $arma->nombre='F-caza';
                $arma->descripcion='Con esta mejora nuestras armas a cazas realizan una predicción de posición de mas efectiva aumentando el daño a los cazas';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=13;
                $arma->malcance=2;
                $arma->dispersion=127;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=85;
                $arma->nombre='F-ligera';
                $arma->descripcion='Podemos aumentar el daño sólo a naves ligeras sin seguimos sus patrones de movimiento';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=14;
                $arma->malcance=2;
                $arma->dispersion=127;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=86;
                $arma->nombre='F-media';
                $arma->descripcion='Conociendo la estruictura de las naves medias es facil causar más daños, esto lo consigue esta mejora a bajo costo.';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=15;
                $arma->malcance=2;
                $arma->dispersion=127;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=87;
                $arma->nombre='F-pesada';
                $arma->descripcion='Causar más daño a pesadas no es sólo cuestión de potencia, esta mejora analiza sus puntos débiles.';
                $arma->jugadores_id=1;
                $arma->ranura="mejoras";
                $arma->potencia=8;
                $arma->clase=7;
                $arma->niveltec=16;
                $arma->malcance=2;
                $arma->dispersion=127;
                $arma->imagen="";
                array_push($armas, $arma);


                $arma =new Armas();
                $arma->codigo=90;
                $arma->nombre='Contenedor de carga';
                $arma->descripcion='Módulo básico de carga, compuesto de un contenedor standard intercambiable';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=20000;
                $arma->clase=9;
                $arma->niveltec=1;
                $arma->malcance=10;
                $arma->dispersion=1;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=91;
                $arma->nombre='Vagón de carga';
                $arma->descripcion='Contenedor de carga ampliado y mejorado, con sistema de descarga rápido y enganche magnético';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=40000;
                $arma->clase=9;
                $arma->niveltec=5;
                $arma->malcance=10;
                $arma->dispersion=2;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=92;
                $arma->nombre='Bahia de carga';
                $arma->descripcion='Enorme sistema de carga con sistema de compresión incluido';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMedia";
                $arma->potencia=200000;
                $arma->clase=9;
                $arma->niveltec=8;
                $arma->malcance=10;
                $arma->dispersion=2;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=93;
                $arma->nombre='Gran hangar de carga';
                $arma->descripcion='Sistema mejorado de almacenamiento y distribucion robotizado';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=500000;
                $arma->clase=9;
                $arma->niveltec=14;
                $arma->malcance=10;
                $arma->dispersion=3;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=94;
                $arma->nombre='Contenedor Adimensional';
                $arma->descripcion='Almacena la carga en un estado de indeterminación entre varios universos paralelos';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=1000000;
                $arma->clase=9;
                $arma->niveltec=23;
                $arma->malcance=10;
                $arma->dispersion=3;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=95;
                $arma->nombre='Hangar';
                $arma->descripcion='Cada unidad de hangar da cabida para un caza';
                $arma->jugadores_id=1;
                $arma->ranura="cargaPequeña";
                $arma->potencia=1;
                $arma->clase=9;
                $arma->niveltec=3;
                $arma->malcance=0;
                $arma->dispersion=1;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=96;
                $arma->nombre='Muelle naves ligeras';
                $arma->descripcion='Hangar de atraque para naves ligeras, cada uno da cabida para una nave ligera';
                $arma->jugadores_id=1;
                $arma->ranura="cargaMedia";
                $arma->potencia=1;
                $arma->clase=9;
                $arma->niveltec=12;
                $arma->malcance=0;
                $arma->dispersion=2;
                $arma->imagen="";
                array_push($armas, $arma);

                $arma =new Armas();
                $arma->codigo=97;
                $arma->nombre='Puerto naves medias';
                $arma->descripcion='Puerto para atracar naves medias, con todos los sistemas de reparacion y mantenimiento necesarios para 1 nave media';
                $arma->jugadores_id=1;
                $arma->ranura="cargaGrande";
                $arma->potencia=1;
                $arma->clase=9;
                $arma->niveltec=16;
                $arma->malcance=0;
                $arma->dispersion=3;
                $arma->imagen="";
                array_push($armas, $arma);



            foreach($armas as $estearma){
                $estearma->save();
            }

        //return $result;
    }






}