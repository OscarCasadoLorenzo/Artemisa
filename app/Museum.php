<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    public function artwork(){
        return $this->hasMany('App\Artwork');
    }

    public function users(){
        return $this->belongsToMany('App\User','users_museums','museum_id','user_id');
    }

    public function id(){
        return $this->id;
    }
}
