<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    public function artwork(){
        return $this->hasMany('App\Artwork');
    }
}
