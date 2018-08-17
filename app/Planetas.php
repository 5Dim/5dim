<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planetas extends Model
{
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
}