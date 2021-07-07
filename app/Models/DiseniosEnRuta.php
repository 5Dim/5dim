<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseniosEnRuta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enFlota',
        'enHangar',
        'cantidad',
        'tipo',
        'disenios_id',
        'planetas_id',
        'en_recoleccion_id',
        'en_orbita_id',
        'en_vuelo_id',
    ];

    public function ruta()
    {
        return $this->belongsTo(RutasPredefinidas::class);
    }

    public function disenios()
    {
        return $this->belongsTo(Disenios::class);
    }
}
