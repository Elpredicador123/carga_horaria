<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $guarded=[];

    public function declaracionjuradas()
    {
        return $this->hasMany('App\Declaracionjurada');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function condicion()
    {
        return $this->belongsTo('App\Condicion');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad');
    }
    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }
}
