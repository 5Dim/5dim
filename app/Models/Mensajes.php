<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public static function enviarMensajeFlota($destino, $errores)
    {
        if (empty($errores)) {
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
                case "Extraer":
                    Mensajes::extraer($destino);
                    break;
                case "Orbitar":
                    Mensajes::orbitar($destino);
                    break;
            }
        } else {
            Mensajes::errorFlota($destino, $errores);
        }
    }

    public static function errorFlota($destino, $errores)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado con el siguiente mensaje: <b class='text-danger'>";
        $contenido .= strtolower($errores);
        $contenido .= "</b>.</p>";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> No ha podido cumplir su misión</b>";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesErrorFlotas($mensaje->id, $destino);
    }

    public static function transporte($destino)
    {
        $elDestino = "";
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            $propietarioDestino = $destino->planetas->jugadores->id;
            $contenido .= $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
            $elDestino = $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enVuelo->recursosEnFlota;
            $propietarioDestino = $destino->enVuelo->jugadores->id;
            $contenido .= $destino->enVuelo->nombre;
            $elDestino = $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enRecoleccion->recursosEnFlota;
            $propietarioDestino = $destino->enRecoleccion->jugadores->id;;
            $contenido .= $destino->enRecoleccion->nombre;
            $elDestino = $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enOrbita->recursosEnFlota;
            $propietarioDestino = $destino->enOrbita->jugadores->id;
            $contenido .= $destino->enOrbita->nombre;
            $elDestino = $destino->enOrbita->nombre;
        }
        $duenioFlota = $destino->flota->jugadores->id;
        $jugadorAlianza = null;
        if (!empty($destino->flota->jugadores->alianzas)) {
            $jugadorAlianza = Alianzas::jugadorAlianza($destino->flota->jugadores->alianzas->id);
        }

        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transportar</b>.</p>
        <table class='table table-sm table-borderless text-center anchofijo align-middle'>
            <tr>
                <td class='text-warning'> Accion </td>
                <td class='text-warning'> Personal </td>
                <td class='text-warning'> Mineral </td>
                <td class='text-warning'> Cristal </td>
                <td class='text-warning'> Gas </td>
                <td class='text-warning'> Plástico </td>
                <td class='text-warning'> Cerámica </td>
                <td class='text-warning'> Líquido </td>
                <td class='text-warning'> Micros </td>
                <td class='text-warning'> Fuel </td>
                <td class='text-warning'> MA </td>
                <td class='text-warning'> Munición </td>
                <td class='text-warning'> Créditos </td>
            </tr>";
        if ($propietarioDestino == $duenioFlota || (!empty($jugadorAlianza) && $propietarioDestino == $jugadorAlianza->id)) {
            $contenido .= "<tr>
                <td class='text-warning'> En destino </td>
                <td class='text-light'>" . number_format($recursosQueTienes->personal, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->mineral, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->cristal, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->gas, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->plastico, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->ceramica, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->liquido, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->micros, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->fuel, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->ma, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->municion, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->creditos, 0, ',', '.') . "</td>
            </tr>";
            $contenido .= "<tr>
                <td class='text-warning'> Dejas </td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
            </tr>";
            $contenido .= "<tr>
                <td class='text-warning'> Recojes </td>
                <td class='text-danger'>" . number_format($destino->recursos->personal, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->mineral, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->cristal, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->gas, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->plastico, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->ceramica, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->liquido, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->micros, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->fuel, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->ma, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->municion, 0, ',', '.') . "</td>
                <td class='text-danger'>" . number_format($destino->recursos->creditos, 0, ',', '.') . "</td>
            </tr>";
            $contenido .= "<tr>
                <td class='text-warning'> Balance </td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->personal - $destino->recursos->personal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral - $destino->recursos->mineral, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal - $destino->recursos->cristal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->gas - $destino->recursos->gas, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico - $destino->recursos->plastico, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica - $destino->recursos->ceramica, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido - $destino->recursos->liquido, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->micros - $destino->recursos->micros, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel - $destino->recursos->fuel, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ma - $destino->recursos->ma, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->municion - $destino->recursos->municion, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos - $destino->recursos->creditos, 0, ',', '.') . "</td>
            </tr>";
            $contenido .= "<tr>
                <td class='text-warning'> Prioridades </td>
                <td class='text-light'>" . $destino->prioridades->personal . "</td>
                <td class='text-light'>" . $destino->prioridades->mineral . "</td>
                <td class='text-light'>" . $destino->prioridades->cristal . "</td>
                <td class='text-light'>" . $destino->prioridades->gas . "</td>
                <td class='text-light'>" . $destino->prioridades->plastico . "</td>
                <td class='text-light'>" . $destino->prioridades->ceramica . "</td>
                <td class='text-light'>" . $destino->prioridades->liquido . "</td>
                <td class='text-light'>" . $destino->prioridades->micros . "</td>
                <td class='text-light'>" . $destino->prioridades->fuel . "</td>
                <td class='text-light'>" . $destino->prioridades->ma . "</td>
                <td class='text-light'>" . $destino->prioridades->municion . "</td>
                <td class='text-light'>" . $destino->prioridades->creditos . "</td>
            </tr>";
        } else {
            $contenido .= "<tr>
                <td class='text-warning'> Dejas </td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->personal - $destino->recursos->personal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral - $destino->recursos->mineral, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal - $destino->recursos->cristal, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->gas - $destino->recursos->gas, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico - $destino->recursos->plastico, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica - $destino->recursos->ceramica, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido - $destino->recursos->liquido, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->micros - $destino->recursos->micros, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel - $destino->recursos->fuel, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->ma - $destino->recursos->ma, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->municion - $destino->recursos->municion, 0, ',', '.') . "</td>
                <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos - $destino->recursos->creditos, 0, ',', '.') . "</td>
            </tr>";
        }
        $contenido .= " </table>";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a transportar a <b>" . $elDestino . "</b>";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
    }

    public static function transferir($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            if(!empty($destino->planetas->jugadores)){
                $propietarioDestino = $destino->planetas->jugadores->id;
            } else {
                $propietarioDestino=0;
            }

            $contenido .= $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
            $elDestino = $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')';
        } elseif (!empty($destino->en_vuelo_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enVuelo->recursosEnFlota;
            $propietarioDestino = $destino->enVuelo->jugadores->id;
            $contenido .= $destino->enVuelo->nombre;
            $elDestino = $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enRecoleccion->recursosEnFlota;
            $propietarioDestino = $destino->enRecoleccion->jugadores->id;;
            $contenido .= $destino->enRecoleccion->nombre;
            $elDestino = $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enOrbita->recursosEnFlota;
            $propietarioDestino = $destino->enOrbita->jugadores->id;
            $contenido .= $destino->enOrbita->nombre;
            $elDestino = $destino->enOrbita->nombre;
        }
        $duenioFlota = $destino->flota->jugadores->id;
        $jugadorAlianza = null;
        if (!empty($destino->flota->jugadores->alianzas)) {
            $jugadorAlianza = Alianzas::jugadorAlianza($destino->flota->jugadores->alianzas->id);
        }

        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "</b> con mision <b>transferir</b>.</p>
        <table class='table table-sm table-borderless text-center anchofijo align-middle'>
        <tr>
            <td class='text-warning'> Accion </td>
            <td class='text-warning'> Personal </td>
            <td class='text-warning'> Mineral </td>
            <td class='text-warning'> Cristal </td>
            <td class='text-warning'> Gas </td>
            <td class='text-warning'> Plástico </td>
            <td class='text-warning'> Cerámica </td>
            <td class='text-warning'> Líquido </td>
            <td class='text-warning'> Micros </td>
            <td class='text-warning'> Fuel </td>
            <td class='text-warning'> MA </td>
            <td class='text-warning'> Munición </td>
            <td class='text-warning'> Créditos </td>
        </tr>";
        if ($propietarioDestino == $duenioFlota || $propietarioDestino == $jugadorAlianza->id) {
            $contenido .= "<tr>
                <td class='text-warning'> En destino </td>
                <td class='text-light'>" . number_format($recursosQueTienes->personal, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->mineral, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->cristal, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->gas, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->plastico, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->ceramica, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->liquido, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->micros, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->fuel, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->ma, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->municion, 0, ',', '.') . "</td>
                <td class='text-light'>" . number_format($recursosQueTienes->creditos, 0, ',', '.') . "</td>
            </tr>";
        }
        $contenido .= "<tr>
            <td class='text-warning'> Dejas </td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= "</table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'>
        <tr>
            <td class='text-warning'> Nave </td>
            <td class='text-warning'> Cantidad </td>
        </tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr>
                <td class='text-light'> " . $disenio->disenios->nombre . " </td>
                <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td>
            </tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a transferir a <b>" . $elDestino . "</b>";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
    }

    public static function colonizar($destino)
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

        $contenido .= "</b> con mision <b>colonizar</b>.</p>";
        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "<table class='table table-sm table-borderless text-center anchofijo align-middle'>
        <tr>
            <td class='text-warning'> Accion </td>
            <td class='text-warning'> Personal </td>
            <td class='text-warning'> Mineral </td>
            <td class='text-warning'> Cristal </td>
            <td class='text-warning'> Gas </td>
            <td class='text-warning'> Plástico </td>
            <td class='text-warning'> Cerámica </td>
            <td class='text-warning'> Líquido </td>
            <td class='text-warning'> Micros </td>
            <td class='text-warning'> Fuel </td>
            <td class='text-warning'> MA </td>
            <td class='text-warning'> Munición </td>
            <td class='text-warning'> Créditos </td>
        </tr>";
        $contenido .= "<tr>
            <td class='text-warning'> Dejas </td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= "<tr>
            <td class='text-warning'> Recojes </td>
            <td class='text-danger'>" . number_format($destino->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-danger'>" . number_format($destino->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'> <tr><td class='text-warning'> Nave </td>
        <td class='text-warning'> Cantidad </td>
        </tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr>
                <td class='text-light'> " . $disenio->disenios->nombre . " </td>
                <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td>
            </tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a colonizar a <b>" . "(" . $destino->planetas->estrella . "x" . $destino->planetas->orbita . ')' . "</b>";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
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
        $contenido .= "<table class='table table-sm table-borderless text-center anchofijo align-middle'>
        <tr>
            <td class='text-warning'> Accion </td>
            <td class='text-warning'> Personal </td>
            <td class='text-warning'> Mineral </td>
            <td class='text-warning'> Cristal </td>
            <td class='text-warning'> Gas </td>
            <td class='text-warning'> Plástico </td>
            <td class='text-warning'> Cerámica </td>
            <td class='text-warning'> Líquido </td>
            <td class='text-warning'> Micros </td>
            <td class='text-warning'> Fuel </td>
            <td class='text-warning'> MA </td>
            <td class='text-warning'> Munición </td>
            <td class='text-warning'> Créditos </td>
        </tr>";
        $contenido .= "<tr>
            <td class='text-warning'> Dejas </td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'>
        <tr>
            <td class='text-warning'> Nave </td>
            <td class='text-warning'> Cantidad </td>
        </tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr>
                <td class='text-light'> " . $disenio->disenios->nombre . " </td>
                <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td>
            </tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a recolectar";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
    }

    public static function extraer($destino)
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

        $contenido .= "</b> con mision <b>extraer</b>.</p>";
        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "<table class='table table-sm table-borderless text-center anchofijo align-middle'>
        <tr>
            <td class='text-warning'> Accion </td>
            <td class='text-warning'> Personal </td>
            <td class='text-warning'> Mineral </td>
            <td class='text-warning'> Cristal </td>
            <td class='text-warning'> Gas </td>
            <td class='text-warning'> Plástico </td>
            <td class='text-warning'> Cerámica </td>
            <td class='text-warning'> Líquido </td>
            <td class='text-warning'> Micros </td>
            <td class='text-warning'> Fuel </td>
            <td class='text-warning'> MA </td>
            <td class='text-warning'> Munición </td>
            <td class='text-warning'> Créditos </td>
        </tr>";
        $contenido .= "<tr>
            <td class='text-warning'> Dejas </td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'>
        <tr>
            <td class='text-warning'> Nave </td>
            <td class='text-warning'> Cantidad </td>
        </tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr>
                <td class='text-light'> " . $disenio->disenios->nombre . " </td>
                <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td>
            </tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a extraer";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
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

        $contenido .= "</b> con mision <b>orbitar</b>.</p>";
        $destinoAnterior = Destinos::destinoAnterior($destino);
        $contenido .= "<table class='table table-sm table-borderless text-center anchofijo align-middle'>
        <tr>
            <td class='text-warning'> Accion </td>
            <td class='text-warning'> Personal </td>
            <td class='text-warning'> Mineral </td>
            <td class='text-warning'> Cristal </td>
            <td class='text-warning'> Gas </td>
            <td class='text-warning'> Plástico </td>
            <td class='text-warning'> Cerámica </td>
            <td class='text-warning'> Líquido </td>
            <td class='text-warning'> Micros </td>
            <td class='text-warning'> Fuel </td>
            <td class='text-warning'> MA </td>
            <td class='text-warning'> Munición </td>
            <td class='text-warning'> Créditos </td>
        </tr>";
        $contenido .= "<tr>
            <td class='text-warning'> Dejas </td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td>
            <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td>
        </tr>";
        $contenido .= " </table> ";
        $contenido .= "<table class='table table-sm table-borderless text-center align-middle'>
        <tr>
            <td class='text-warning'> Nave </td>
            <td class='text-warning'> Cantidad </td>
        </tr>";
        foreach ($destino->flota->diseniosEnFlota as $disenio) {
            $contenido .= "<tr>
                <td class='text-light'> " . $disenio->disenios->nombre . " </td>
                <td class='text-light'> " . number_format(intval($disenio->enFlota) + intval($disenio->enHangar), 0, ',', '.') . " </td>
            </tr>";
        }
        $contenido .= " </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a orbitar";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesDeFlotas($destino, $mensaje->id);
    }

    public static function bienvenida($idJugador)
    {
        $contenido = "<p>Bienvenido a la <b>Alfa 0.1</b> de 5dim.es. Ahí van unos consejos de inicio:
            <br>- Todo lo relacionado con combates <b>NO está implementado</b>, de modo que no investigues ni diseñes con armas o blindajes.
            <br>- Céntrate al inicio en subir las minas  de tu planeta inicial, priorizando el mineral.
            <br>- Construir una nave y mandarla a recolectar en los asteroides que tienes al lado de tu planeta es una buena idea una vez puedas permitirte construir una nave.
            <br>- Colonizar planetas cercanos es una buena opción, puedes hacerlo incluso con una sonda ya que es muy barata.
            <br>- Además puedes mandar tu sonda (con combustible) a orbitar otras estrellas fuera de tu visión, ya que también da algo de visión.
            <br>- Crear una alianza o aliarte con amigos es muy buena idea ya que las tecnologías se comparten de forma automática.
            <br>- Además las naves se mejoran automaticamente cada vez que subes una tecnología.
            <br>- Subir la tecnología de fuselajes es siempre muy rentable, pero ten en cuenta que las naves mas avanzadas son mas caras de construir.
            <br>- Si tienes preguntas no dudes en conectarte nuestro canal de <a href='https://discord.gg/X4hRNCYyt8'>discord</a>.

            <br><br>Disfruta del juego, y gracias por participar en la versión alpha de 5dim.es.</p>";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "Bienvenido a 5Dim.";
        $mensaje->categoria = 'recibidos';
        $mensaje->emisor = null;
        $mensaje->emisor_sys = 'Comandante';
        $mensaje->save();

        MensajesIntervinientes::intervinientesBienvenida($mensaje->id, $idJugador);
    }
}
