<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaracionjurada extends Model
{
    protected $guarded=[];

    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }
    public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }
    public function cargalectiva()
    {
        return $this->hasOne('App\Cargalectiva');
    }
}
