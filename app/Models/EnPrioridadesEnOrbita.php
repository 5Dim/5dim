<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnPrioridadesEnOrbita extends Model
{
    use HasFactory;

    public function orbita()
    {
        return $this->hasOne(EnOrbita::class);
    }
}
