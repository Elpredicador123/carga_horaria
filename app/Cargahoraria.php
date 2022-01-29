<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargahoraria extends Model
{
    protected $guarded=[];

    public function detallecargahorarias()
    {
        return $this->hasMany('App\Detallecargahoraria');
    }
    public function cargalectiva()
    {
        return $this->belongsTo('App\Cargalectiva');
    }
}
