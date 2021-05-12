<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $guarded = ['id']; 

    // protected $hidden = ['password'];

    //Relacion N:N con Artworks (loved)
    public function artworks(){
        return $this->belongToMany('App\Artwork');
    }
}
