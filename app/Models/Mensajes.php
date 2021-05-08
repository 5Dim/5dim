<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Mensajes extends Model
{
    use HasFactory;

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class, 'emisor');
    }

    public function intervinientes()
    {
        return $this->hasMany(MensajesIntervinientes::class);
    }

    public static function enviarMensajeFlota($destino)
    {
        switch ($destino->mision) {
            case "Transportar":
                Mensajes::transporte($destino);
                break;
            case "Transferir":
                Mensajes::transferir($destino);
                break;
            case "Colonizar":
                Mensajes::colonizar($destino);
                break;
            case "Recolectar":
                Mensajes::recolectar($destino);
                break;
            case "Orbitar":
                Mensajes::orbitar($destino);
                break;
        }
    }

    public static function transporte($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            $contenido .= $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enVuelo->recursosEnFlota;
            $contenido .= $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enRecoleccion->recursosEnFlota;
            $contenido .= $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enOrbita->recursosEnFlota;
            $contenido .= $destino->enOrbita->nombre;
        }

        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transportar</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td class='text-warning'> Accion </td> <td class='text-warning'> Personal </td> <td class='text-warning'> Mineral </td> <td class='text-warning'> Cristal </td> <td class='text-warning'> Gas </td> <td class='text-warning'> Plástico </td> <td class='text-warning'> Cerámica </td> <td class='text-warning'> Líquido </td> <td class='text-warning'> Micros </td> <td class='text-warning'> Fuel </td> <td class='text-warning'> MA </td> <td class='text-warning'> Munición </td> <td class='text-warning'> Créditos </td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> En destino </td> <td class='text-light'>" . number_format($recursosQueTienes->personal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->mineral, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->cristal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->gas, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->plastico, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ceramica, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->liquido, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->micros, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->fuel, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ma, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->municion, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Dejas </td> <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Recojes </td> <td class='text-danger'>" . number_format($destino->recursos->personal, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->mineral, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->cristal, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->gas, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->plastico, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->liquido, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->micros, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->fuel, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->ma, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->municion, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Prioridades </td> <td class='text-light'>" . $destino->prioridades->personal . "</td> <td class='text-light'>" . $destino->prioridades->mineral . "</td> <td class='text-light'>" . $destino->prioridades->cristal . "</td> <td class='text-light'>" . $destino->prioridades->gas . "</td> <td class='text-light'>" . $destino->prioridades->plastico . "</td> <td class='text-light'>" . $destino->prioridades->ceramica . "</td> <td class='text-light'>" . $destino->prioridades->liquido . "</td> <td class='text-light'>" . $destino->prioridades->micros . "</td> <td class='text-light'>" . $destino->prioridades->fuel . "</td> <td class='text-light'>" . $destino->prioridades->ma . "</td> <td class='text-light'>" . $destino->prioridades->municion . "</td> <td class='text-light'>" . $destino->prioridades->creditos . "</td> </tr> </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota " . $destino->flota->nombre . " ha llegado a transportar a su destino";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $mensaje->id;
        $receptor->receptor = $destino->flota->jugadores_id;
        $receptor->save();
    }

    public static function transferir($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            $contenido .= $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enVuelo->recursosEnFlota;
            $contenido .= $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enRecoleccion->recursosEnFlota;
            $contenido .= $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enOrbita->recursosEnFlota;
            $contenido .= $destino->enOrbita->nombre;
        }

        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transferir</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td class='text-warning'> Accion </td> <td class='text-warning'> Personal </td> <td class='text-warning'> Mineral </td> <td class='text-warning'> Cristal </td> <td class='text-warning'> Gas </td> <td class='text-warning'> Plástico </td> <td class='text-warning'> Cerámica </td> <td class='text-warning'> Líquido </td> <td class='text-warning'> Micros </td> <td class='text-warning'> Fuel </td> <td class='text-warning'> MA </td> <td class='text-warning'> Munición </td> <td class='text-warning'> Créditos </td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> En destino </td> <td class='text-light'>" . number_format($recursosQueTienes->personal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->mineral, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->cristal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->gas, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->plastico, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ceramica, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->liquido, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->micros, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->fuel, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ma, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->municion, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Dejas </td> <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'> <tr><td class='text-warning'> Nave </td> <td class='text-warning'> Cantidad </td></tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr><td class='text-light'> " . $disenio->disenios->nombre . " </td> <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td></tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota " . $destino->flota->nombre . " ha llegado a su destino";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $mensaje->id;
        $receptor->receptor = $destino->flota->jugadores_id;
        $receptor->save();
    }

    public static function colonizar($destino)
    {
        //
    }

    public static function recolectar($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $contenido .= "Asteroides (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $contenido .= $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $contenido .= $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $contenido .= $destino->enOrbita->nombre;
        }

        $contenido .= "</b> con mision <b>recolectar</b>.</p>";
        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transferir</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td class='text-warning'> Accion </td> <td class='text-warning'> Personal </td> <td class='text-warning'> Mineral </td> <td class='text-warning'> Cristal </td> <td class='text-warning'> Gas </td> <td class='text-warning'> Plástico </td> <td class='text-warning'> Cerámica </td> <td class='text-warning'> Líquido </td> <td class='text-warning'> Micros </td> <td class='text-warning'> Fuel </td> <td class='text-warning'> MA </td> <td class='text-warning'> Munición </td> <td class='text-warning'> Créditos </td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Dejas </td> <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'> <tr><td class='text-warning'> Nave </td> <td class='text-warning'> Cantidad </td></tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr><td class='text-light'> " . $disenio->disenios->nombre . " </td> <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td></tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota " . $destino->flota->nombre . " ha llegado a recolectar";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $mensaje->id;
        $receptor->receptor = $destino->flota->jugadores_id;
        $receptor->save();
    }

    public static function orbitar($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $contenido .= "(" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $contenido .= $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $contenido .= $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $contenido .= $destino->enOrbita->nombre;
        }

        $contenido .= "</b> con mision <b>recolectar</b>.</p>";
        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transferir</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td class='text-warning'> Accion </td> <td class='text-warning'> Personal </td> <td class='text-warning'> Mineral </td> <td class='text-warning'> Cristal </td> <td class='text-warning'> Gas </td> <td class='text-warning'> Plástico </td> <td class='text-warning'> Cerámica </td> <td class='text-warning'> Líquido </td> <td class='text-warning'> Micros </td> <td class='text-warning'> Fuel </td> <td class='text-warning'> MA </td> <td class='text-warning'> Munición </td> <td class='text-warning'> Créditos </td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Dejas </td> <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'> <tr><td class='text-warning'> Nave </td> <td class='text-warning'> Cantidad </td></tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr><td class='text-light'> " . $disenio->disenios->nombre . " </td> <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td></tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota " . $destino->flota->nombre . " ha llegado a orbitar";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $mensaje->id;
        $receptor->receptor = $destino->flota->jugadores_id;
        $receptor->save();
    }
}
