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

    public function updateMuseum(Request $request)
    {
        $authors = Museum::table('name')->where('name',$request->input('old_name'))->first();
        $request->validate(
        [
            'name' => 'required|unique:Museum,name'
        ]);
        $authors -> name = $request->input('name');
        $authors->location = $request->input('location');
        $authors->address = $request->input('address');
        $authors->email = $request->input('email');
        $authors->imgRoute = $request->input('imgRoute');
        $authors->save();
        return "Museo con nombre $request->old_name actualizado correctamente";
    }

    public function destroyMuseum(Request $request){
        $aux = Museum::findOrFail($request->museum_id);
        $aux->delete();

        return redirect('/museums');
    }

    public function buscar(Request $request){
        $nombre = $request->get('name');
        $location = $request->get('location');
        if(isset($nombre) && isset($location)){ //si nos pasan los dos criterios
            $museums = Museum::where([['name', 'like', '%'.$nombre.'%'], ['location', '=', $location]])->paginate(2);
            return view('listObjects.museum',compact('museums'));
        }else if(isset($nombre)){               //si nos pasan solo el criterio nombre
            $museums = Museum::where([['name', 'like', '%'.$nombre.'%']])->paginate(2);
            return view('listObjects.museum',compact('museums'));
        }else if(isset($location)){             //si nos pasan solo el criterio location
            $museums = Museum::where([['location', 'like', '%'.$location.'%']])->paginate(2);
            return view('listObjects.museum',compact('museums'));
        }else{                                  //si no nos pasan ningun criterio
            $museums = Museum::all();
            return view('listObjects.museum', compact('museums'));
        }
    }

    public function findMuseum(){

    }


}
