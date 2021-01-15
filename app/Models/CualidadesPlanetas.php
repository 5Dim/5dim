<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CualidadesPlanetas extends Model
{
    use HasFactory;

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }
}
