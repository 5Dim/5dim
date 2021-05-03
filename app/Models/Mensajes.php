<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $mensaje = "<p>";
        $mensaje .= "La flota <b>" . $destino->flota->nombre . "</b> ha llegado a <b>";
        if (!empty($destino->planetas_id)) {
            $recursosQueTienes = new Recursos();
            $recursosQueTienes = $destino->planetas->recursos;
            $mensaje .= $destino->planetas->nombre;
        } elseif (!empty($destino->en_vuelo_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enVuelo->recursosEnFlota;
            $mensaje .= $destino->enVuelo->nombre;
        } elseif (!empty($destino->en_recoleccion_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enRecoleccion->recursosEnFlota;
            $mensaje .= $destino->enRecoleccion->nombre;
        } elseif (!empty($destino->en_orbita_id)) {
            $recursosQueTienes = new RecursosEnFlota();
            $recursosQueTienes = $destino->enOrbita->recursosEnFlota;
            $mensaje .= $destino->enOrbita->nombre;
        }
        $mensaje .= "</b> con mision <b>transportar</b>.</p> <table class='table table-sm table-borderless text-center anchofijo align-middle'> <tr> <td>  </td> <td> Personal </td> <td> Mineral </td> <td> Cristal </td> <td> Gas </td> <td> Plástico </td> <td> Cerámica </td> <td> Líquido </td> <td> Micros </td> <td> Fuel </td> <td> MA </td> <td> Munición </td> <td> Créditos </td> </tr>";
        $mensaje .= "<tr> <td> Tienes </td> <td>" . $recursosQueTienes->personal . "</td> <td>" . $recursosQueTienes->mineral . "</td> <td>" . $recursosQueTienes->cristal . "</td> <td>" . $recursosQueTienes->gas . "</td> <td>" . $recursosQueTienes->plastico . "</td> <td>" . $recursosQueTienes->ceramica . "</td> <td>" . $recursosQueTienes->liquido . "</td> <td>" . $recursosQueTienes->micros . "</td> <td>" . $recursosQueTienes->fuel . "</td> <td>" . $recursosQueTienes->ma . "</td> <td>" . $recursosQueTienes->municion . "</td> <td>" . $recursosQueTienes->creditos . "</td> </tr>";
        $mensaje .= "<tr> <td> Dejas </td> <td>" . $destino->recursosEnFlota->personal . "</td> <td>" . $destino->recursosEnFlota->mineral . "</td> <td>" . $destino->recursosEnFlota->cristal . "</td> <td>" . $destino->recursosEnFlota->gas . "</td> <td>" . $destino->recursosEnFlota->plastico . "</td> <td>" . $destino->recursosEnFlota->ceramica . "</td> <td>" . $destino->recursosEnFlota->liquido . "</td> <td>" . $destino->recursosEnFlota->micros . "</td> <td>" . $destino->recursosEnFlota->fuel . "</td> <td>" . $destino->recursosEnFlota->ma . "</td> <td>" . $destino->recursosEnFlota->municion . "</td> <td>" . $destino->recursosEnFlota->creditos . "</td> </tr>";
        $mensaje .= "<tr> <td> Recojes </td> <td>" . $destino->recursosEnFlota->personal . "</td> <td>" . $destino->recursosEnFlota->mineral . "</td> <td>" . $destino->recursosEnFlota->cristal . "</td> <td>" . $destino->recursosEnFlota->gas . "</td> <td>" . $destino->recursosEnFlota->plastico . "</td> <td>" . $destino->recursosEnFlota->ceramica . "</td> <td>" . $destino->recursosEnFlota->liquido . "</td> <td>" . $destino->recursosEnFlota->micros . "</td> <td>" . $destino->recursosEnFlota->fuel . "</td> <td>" . $destino->recursosEnFlota->ma . "</td> <td>" . $destino->recursosEnFlota->municion . "</td> <td>" . $destino->recursosEnFlota->creditos . "</td> </tr>";
        $mensaje .= "<tr> <td> Prioridades </td> <td>" . $destino->prioridades->personal . "</td> <td>" . $destino->prioridades->mineral . "</td> <td>" . $destino->prioridades->cristal . "</td> <td>" . $destino->prioridades->gas . "</td> <td>" . $destino->prioridades->plastico . "</td> <td>" . $destino->prioridades->ceramica . "</td> <td>" . $destino->prioridades->liquido . "</td> <td>" . $destino->prioridades->micros . "</td> <td>" . $destino->prioridades->fuel . "</td> <td>" . $destino->prioridades->ma . "</td> <td>" . $destino->prioridades->municion . "</td> <td>" . $destino->prioridades->creditos . "</td> </tr> </table> ";
    }
}
