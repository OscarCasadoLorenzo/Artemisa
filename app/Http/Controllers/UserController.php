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
        $encript = bcrypt($request->password);
        $request['password']= $encript;
        User::create($request->all());
        return "Usuario $request->name añadido a la BD!";
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

    public function modifyUser()
    {
        $users = User::all();
        return view('updateObject.user', compact('users',$users));
    }

    public function getDetails($id = 0)
    {
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        if($user->email != $request->input('email')){
            $request->validate(
            [
                'email' => 'required|unique:users,email',
                'birth_date' => 'date'
            ]);
        }
        $request->validate(
        [
            'birth_date' => 'date'
        ]);
        $user->name = $request->input('name');
        $user->surname1 = $request->input('surname1');
        $user->surname2 = $request->input('surname2');
        $user->birth_date = $request->input('birth_date');
        $user->location = $request->input('location');
        $user->type = $request->input('type');
        $user->email = $request->input('email');
        $user->save();
        return "Usuario con email ".$request->input('email'). " actualizado correctamente";
    }
}
