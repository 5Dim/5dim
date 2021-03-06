<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industrias extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relacion de los construcciones con el planeta
     */
    public function planeta ()
    {
        return $this->belongsTo(Planetas::class);
    }
}
