<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CualidadesDiseños extends Model
{
    public $timestamps = false;
    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }
}