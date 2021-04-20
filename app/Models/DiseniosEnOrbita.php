<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseniosEnOrbita extends Model
{
    use HasFactory;

    public function disenios()
    {
        return $this->belongsTo(Disenios::class);
    }
}
