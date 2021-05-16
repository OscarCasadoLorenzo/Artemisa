<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function getUsers(){
       $u = User::all();
       return $u;
    }

    public function login(Request $request){

        // $pass = bcrypt($request->password);
        // return $user->password;
        if(isset($request->email) && isset($request->password)){
            $user = User::where('email', '=', $request->email)->first();
            // if($pass == $user->password){
            if(Hash::check($request->password, $user->password)){
                //continuará...
                return redirect('/museums');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function getUser($id){
        $user = User::find($id);
        return view('singleObject.user', ['user'=>$user]);
    }

    public function createUser(){
        return view('createObjects.user');
    }

    public function saveUser(User $user){
    // public function saveUser(UserRequest $request){
        // $encript = bcrypt($request->password);
        // $request['password']= $encript;
        // User::create($request->all());
        // return redirect('/');
        $name = request('name');
        $surname1 = request('surname1');
        $surname2 = request('surname2');
        $location = request('location');
        $birth_date = request('birth_date');
        $email = request('email');
        $password = request('password');

        User::create([
            'name' => $name,
            'surname1' => $surname1 ,
            'surname2' => $surname2 ,
            'location' => $location,
            'birth_date' => $birth_date,
            'email' => $email,
            'password' => $password
        ]);
        return redirect('/museums');
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

    public function update(UserRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        if($user->email != $request->input('email')){
            $request->validate(
            [
                'email' => 'required|unique:users,email',
                //'birth_date' => 'date' ???
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
        if(($password = $request->input('aPassword')) != "" && $request->input('nPassword') != "")
        {
            if(Hash::check($password, $user->password))
            {
                if(($password = $request->input('nPassword')) == $request->input('nPassword2'))
                { 
                    $user->password = Hash::make($password);
                }
                else return Redirect::to('/users/update')->withErrors(['La nuevas contraseñas no coinciden'])
                                                         ->with(['user' => $request->all()])->withInput();
            }
            else return Redirect::to('/users/update')->withErrors(['Antigua contraseña no coincide'])
                                                     ->with(['user' => $request->all()])->withInput();
        }
        $user->save();
        // return "Usuario con email ".$request->input('email'). " actualizado correctamente";
        return Redirect::to('/users/update')->withErrors(['ACTUALIZADO CON EXITO']);
    }
}
