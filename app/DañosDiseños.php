<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DañosDiseños extends Model
{
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }
}