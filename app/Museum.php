<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $guarded = ['id']; 

    public function collections(){
        return $this->hasMany('App\Collection');
    }
}
