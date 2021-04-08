<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function prueba(Request $request){
        return "Acción de pruebas de MUSEUM-CONTROLLER";
    }
}
