<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
class MuseumController extends Controller
{
    public function getMuseums(){
        $museums = Museum::all();
        //Pasar un array como 2º parámetro a la view
        return view('listObjects.museum', ['museums'=>$museums]);
    }

    public function createMuseum(){
        return view('createObjects.museum');
    }

    public function saveMuseum(Request $request){
        Museum::create($request->all());
        return "Museo $request->name añadido a la BD!";
    }

    public function findMuseum(){
      
    }


}
