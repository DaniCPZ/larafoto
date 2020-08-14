<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // Relacion de muchos a uno porque muchas imagenes pueden tener un unico creador
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
