<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
use \App\Http\Controllers\CollectionController;

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

        $input = $request->all();
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/museums', $filename);
            $path = '/images/museums/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Museum::create($input);
        return "Museo $request->name añadido a la BD!";
    }

    public function getMuseum($id){
      $museum = Museum::find($id);
      $collections = CollectionController::getCollections($id);
      return view('singleObject.museum', ['museum'=>$museum, 'collections'=>$collections]);
    }

    public function deleteMuseum(){
        $museums = Museum::all(); //cogemos los usuarios que no son admin

        return view('deleteObjects.museum', compact('museums'));
    }

    public function destroyMuseum(Request $request){
        $aux = Museum::findOrFail($request->museum_id);
        $aux->delete();

        return redirect('/museums');
    }


    public function findMuseum(){

    }


}
