<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
class MuseumController extends Controller
{
    public function prueba(Request $request){
        return "Acción de pruebas de MUSEUM-CONTROLLER";
    }

    public function getMuseums(Request $request){
        $u = Museum::all();
        return $u;
    }

    public function createMuseum(Request $request){
        return view('createObjects.museum');
    }
}
