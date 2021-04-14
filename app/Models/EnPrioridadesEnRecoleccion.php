<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnPrioridadesEnRecoleccion extends Model
{
    use HasFactory;

    public function recoleccion()
    {
        return $this->hasOne(EnRecoleccion::class);
    }
}
