<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinosEnRuta extends Model
{
    use HasFactory;
    public function recursos()
    {
        return $this->hasOne(RecursosEnRuta::class);
    }

    public function prioridades()
    {
        return $this->hasOne(PrioridadesEnRuta::class);
    }

    public function ruta()
    {
        return $this->belongsTo(RutasPredefinidas::class);
    }
}
