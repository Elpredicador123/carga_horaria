<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $guarded=[];
    public function facultad()
    {
        return $this->belongsTo('App\Facultad');
    }
}
