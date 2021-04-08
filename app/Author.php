<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    //Relacion 1:N con Author (realizado)
    public function artworks(){
        return $this->hasMany('App\Artwork');
    }
}
