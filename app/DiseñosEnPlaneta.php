<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseñosEnPlaneta extends Model
{
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }
    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }
}