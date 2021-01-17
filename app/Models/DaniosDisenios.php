<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaniosDisenios extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function disenios ()
    {
        return $this->belongsTo(Disenios::class);
    }
}
