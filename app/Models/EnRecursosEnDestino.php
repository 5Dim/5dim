<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnRecursosEnDestino extends Model
{
    use HasFactory;

    public function destino()
    {
        return $this->hasOne(Destinos::class);
    }
}
