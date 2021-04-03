<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnRecursosEnVuelo extends Model
{
    use HasFactory;

    public function envuelo()
    {
        return $this->hasOne(EnVuelo::class);
    }
}
