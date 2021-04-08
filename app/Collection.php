<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //Relacion 1:N con Museum (composicion)
    public function museum(){
        return $this->belongsTo('App\Museum');
    }

    //Relacion 1:N con Artworks (expone)
    public function artworks(){
        return $this->hasMany('App\Artwork');
    }
}
