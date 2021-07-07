<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursosEnRuta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'personal',
        'mineral',
        'cristal',
        'gas',
        'plastico',
        'ceramica',
        'liquido',
        'micros',
        'fuel',
        'ma',
        'municion',
        'creditos'
    ];

    public function destino()
    {
        return $this->hasOne(DestinosEnRuta::class);
    }
}
