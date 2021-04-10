<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getUsers(){
       $u = User::all();
       return $u;
    }

    public function createUser(){
        return view('createObjects.user');
    }

    public function saveUser(Request $request){

    }

    public function findUsers(){
      
    }
}
