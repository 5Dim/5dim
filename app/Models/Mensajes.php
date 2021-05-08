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

    public static function transporte($destino)
    {
        $contenido = "<p>La flota <b class='text-success'>" . $destino->flota->nombre . "</b> ha llegado a <b class='text-success'>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            $contenido .= $destino->planetas->nombre . " (" . $destino->planetas->estrella . "x" . $destino->planetas->orbita. ')';
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
        Log::info("destino " . $destino);
        Log::info("destinoAnterior " . $destinoAnterior);
        $contenido .= "</b> con mision <b>" . $destino->mision . "</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td class='text-success'> Accion </td> <td class='text-success'> Personal </td> <td class='text-success'> Mineral </td> <td class='text-success'> Cristal </td> <td class='text-success'> Gas </td> <td class='text-success'> Plástico </td> <td class='text-success'> Cerámica </td> <td class='text-success'> Líquido </td> <td class='text-success'> Micros </td> <td class='text-success'> Fuel </td> <td class='text-success'> MA </td> <td class='text-success'> Munición </td> <td class='text-success'> Créditos </td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Tienes </td> <td class='text-light'>" . number_format($recursosQueTienes->personal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->mineral, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->cristal, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->gas, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->plastico, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ceramica, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->liquido, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->micros, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->fuel, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->ma, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->municion, 0, ',', '.') . "</td> <td class='text-light'>" . number_format($recursosQueTienes->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Dejas </td> <td class='text-success'>" . number_format($destinoAnterior->recursos->personal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->mineral, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->cristal, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->gas, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->plastico, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ceramica, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->liquido, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->micros, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->fuel, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->ma, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->municion, 0, ',', '.') . "</td> <td class='text-success'>" . number_format($destinoAnterior->recursos->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Recojes </td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->personal, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->mineral, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->cristal, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->gas, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->plastico, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->ceramica, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->liquido, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->micros, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->fuel, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->ma, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->municion, 0, ',', '.') . "</td> <td class='text-danger'>" . number_format($destino->flota->recursosEnFlota->creditos, 0, ',', '.') . "</td> </tr>";
        $contenido .= "<tr> <td class='text-warning'> Prioridades </td> <td class='text-light'>" . $destino->prioridades->personal . "</td> <td class='text-light'>" . $destino->prioridades->mineral . "</td> <td class='text-light'>" . $destino->prioridades->cristal . "</td> <td class='text-light'>" . $destino->prioridades->gas . "</td> <td class='text-light'>" . $destino->prioridades->plastico . "</td> <td class='text-light'>" . $destino->prioridades->ceramica . "</td> <td class='text-light'>" . $destino->prioridades->liquido . "</td> <td class='text-light'>" . $destino->prioridades->micros . "</td> <td class='text-light'>" . $destino->prioridades->fuel . "</td> <td class='text-light'>" . $destino->prioridades->ma . "</td> <td class='text-light'>" . $destino->prioridades->municion . "</td> <td class='text-light'>" . $destino->prioridades->creditos . "</td> </tr> </table> ";

        $mensaje = new Mensajes();
        $mensaje->mensaje = $contenido;
        $mensaje->asunto = "La flota " . $destino->flota->nombre . " ha llegado a su destino";
        $mensaje->categoria = 'flotas';
        $mensaje->emisor = $destino->flota->jugadores_id;
        $mensaje->emisor_sys = 'test';
        $mensaje->save();

        $receptor = new MensajesIntervinientes();
        $receptor->leido = false;
        $receptor->mensajes_id = $mensaje->id;
        $receptor->receptor = $destino->flota->jugadores_id;
        $receptor->save();
    }
}
