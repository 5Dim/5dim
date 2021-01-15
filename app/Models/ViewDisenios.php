<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewDisenios extends Model
{
    use HasFactory;

    protected $readFrom = "view_disenio";

    public function disenios ()
    {
        return $this->belongsTo(Disenios::class);
    }
}
