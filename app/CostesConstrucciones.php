<?php
namespace App;
use App\Constantes;
use Illuminate\Database\Eloquent\Model;
class CostesConstrucciones extends Model
{
    public $timestamps = false;

    public function construcciones ()
    {
        return $this->belongsTo(Construcciones::class);
    }

}