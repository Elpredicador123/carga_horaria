<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallecargalectiva extends Model
{
    protected $guarded=[];
    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    public function ciclo()
    {
        return $this->belongsTo('App\Ciclo');
    }
    public function seccion()
    {
        return $this->belongsTo('App\Seccion');
    }
}
