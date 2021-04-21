<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseniosEnFlota extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cantidad',
        'tipo',
        'disenios_id',
        'planetas_id',
    ];

    public function envuelo()
    {
        return $this->belongsTo(EnVuelo::class);
    }

    public function disenios()
    {
        return $this->belongsTo(Disenios::class);
    }

    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }
}
