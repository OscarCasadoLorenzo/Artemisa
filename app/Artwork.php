<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    public function museum(){
        return $this->belongsTo('App\Museum');
    }
}
