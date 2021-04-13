<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Museum;

class CollectionController extends Controller
{
    public static function getCollections($id){
        $collections = Collection::where('museum_id','=', $id)->get();
        return $collections;
    }

    public function createCollection(){
        $museums = Museum::all();
        return view('createObjects.collection', compact('museums'));  //modificado compact para el desplegable
    }

    public function saveCollection(Request $request){
        $input = $request->all();
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/collection', $filename);
            $path = '/images/collection/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Collection::create($input);
        return "Colección $request->name añadida a la BD!";
    }

    public function findCollection(){
      
    }
}
