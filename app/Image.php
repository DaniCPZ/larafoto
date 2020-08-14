<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    // Relacion de uno a muchos uno solo modelo va atener muchos comentarios
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }

    // Relacion de muchos a uno porque muchas imagenes pueden tener un unico creador
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
