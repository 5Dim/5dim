<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseniosEnPlaneta extends Model
{
    use HasFactory;

    public function disenios ()
    {
        return $this->belongsTo(Disenios::class);
    }
    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }
}
