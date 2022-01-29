<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallecargahoraria extends Model
{
    protected $guarded=[];
    public function detallecargalectiva()
    {
        return $this->belongsTo('App\Detallecargalectiva');
    }
    public function detallecarga()
    {
        return $this->belongsTo('App\Detallecarga');
    }
    public function aula()
    {
        return $this->belongsTo('App\Aula');
    }
}
