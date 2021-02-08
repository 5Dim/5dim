<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planetas extends Model
{
    use HasFactory;

    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function recursos ()
    {
        return $this->hasOne(Recursos::class);
    }

    public function construcciones ()
    {
        return $this->hasMany(Construcciones::class);
    }

    public function industrias ()
    {
        return $this->hasOne(Construcciones::class);
    }

    public function enInvestigaciones ()
    {
        return $this->hasMany(EnInvestigaciones::class);
    }

    public function cualidades ()
    {
        return $this->hasOne(CualidadesPlanetas::class);
    }

    public function estacionadas ()
    {
        return $this->hasMany(DiseniosEnPlaneta::class);
    }

    public function enDisenios ()
    {
        return $this->hasMany(EnDisenios::class);
    }
}
