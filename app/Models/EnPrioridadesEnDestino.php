<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnPrioridadesEnDestino extends Model
{
    use HasFactory;

    public function destino()
    {
        return $this->hasOne(Destinos::class);
    }
}
