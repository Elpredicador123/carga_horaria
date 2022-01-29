<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargalectiva extends Model
{
    protected $guarded=[];
    public function declaracionjurada()
    {
        return $this->belongsTo('App\Declaracionjurada');
    }
    public function detallecargalectivas()
    {
        return $this->hasMany('App\Detallecargalectiva');
    }
    public function detallecargas()
    {
        return $this->hasMany('App\Detallecarga');
    }
    public function cargahoraria()
    {
        return $this->hasOne('App\Cargahoraria');
    }
}
