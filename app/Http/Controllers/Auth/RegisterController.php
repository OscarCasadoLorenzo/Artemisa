<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'surname1' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'surname2' => 'regex:/^[a-zA-Z]+$/u|min:3|max:50|required',
            'email' => 'required|unique:users',
            'birth_date' => 'date',
            'location' => 'regex:/^[a-zA-Z]+$/u|min:3|max:75|required',
            'password' => ['required',
                            'min:6',
                            'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])/',
                            'confirmed'
                        ] //should contain at least 3 of a-z or A-Z and a number.
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname1' => $data['surname1'],
            'surname2' => $data['surname2'],
            'location' => $data['location'],
            'birth_date' => $data['birth_date'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

