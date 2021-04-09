<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
class MuseumController extends Controller
{
    public function test(Request $request){
        return "Acción de pruebas de MUSEUM-CONTROLLER";
    }

    public function getMuseums(Request $request){
        $u = Museum::all();
        return $u;
    }

    public function createMuseum(){
        return view('createObjects.museum');
    }

    public function saveMuseum(Request $request){
        Museum::create($request->all());
        return "Museo $request->name añadido a la BD!";
    }

    public function findMuseum(Request $request){
      
    }


}
