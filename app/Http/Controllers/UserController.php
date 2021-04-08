<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function prueba(Request $request){
        return "Acción de pruebas de USER-CONTROLLER";
    }

    public function getUsers(Request $request){
       $u = User::all();
       return $u;
    }

    public function createUser(Request $request){
        return view('create.user');
    }
}
