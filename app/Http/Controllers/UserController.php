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

    public function getUser($id){
        $user = User::find($id);
        return view('singleObject.user', ['user'=>$user]);
    }

    public function createUser(){
        return view('createObjects.user');
    }

    public function saveUser(Request $request){

    }

    public function deleteUser(){
        $users = User::where('type', '!=', 'admin')->get(); //cogemos los usuarios que no son admin

        return view('deleteObjects.user', compact('users'));
    }

    public function destroyUser(Request $request){
        $aux = User::findOrFail($request->user_id);
        $aux->delete();

        return redirect('/museums');
    }

    public function findUsers(){

    }
}
