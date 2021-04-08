<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function prueba(Request $request){
        return "Acción de pruebas de AUTHOR-CONTROLLER";
    }
}
