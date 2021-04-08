<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    //Relacion N:N con Users (loved)
    public function users(){
        return $this->belongToMany('App\User');
    }

    //Relacion 1:N con Artwork (realizado)
    public function author(){
        return $this->belongsTo('App\Author');
    }

    //Relacion 1:N con Collections (expone)
    public function collection(){
        return $this->belongsTo('App\Collection');
    }
}
