<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallecarga extends Model
{
    protected $guarded=[];
    public function carga()
    {
        return $this->belongsTo('App\Carga');
    }
}
