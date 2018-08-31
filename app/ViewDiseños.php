<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDiseños extends Model
{
    protected $readFrom = "view_diseño";

    public function diseños ()
    {
        return $this->belongsTo(Diseños::class);
    }
}