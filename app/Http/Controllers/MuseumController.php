<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
use \App\Http\Controllers\CollectionController;
use App\Http\Requests\MuseumRequest;
use Illuminate\Support\Facades\Redirect;

class MuseumController extends Controller
{
    public function paginaInicial(){
        // $museums = Museum::all();
        // return view('listObjects.museum', compact('museums'));
        return redirect('/museums');
    }

    public function getMuseums(){
        $museums = Museum::all();
        //Pasar un array como 2º parámetro a la view
        return view('listObjects.museum', ['museums'=>$museums]);
    }

    public function createMuseum(){
        return view('createObjects.museum');
    }

    public function saveMuseum(MuseumRequest $request){

        $request->validate(
            [
                'name' => 'unique:museums',
            ]);

        $input = $request->all();
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/museums', $filename);
            $path = '/images/museums/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Museum::create($input);
        return Redirect::to('/museums/create')->withErrors(['CREADO CON EXITO']);
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

    public function getDetails($id = 0)
    {
        $museums = Museum::where('id',$id)->first();
        return response()->json($museums);
    }

    public function modifyMuseum()
    {
        $museums = Museum::all();
        return view('updateObject.museum', compact('museums',$museums));
    }

    public function update(MuseumRequest $request)
    {
        $museum = Museum::findOrFail($request->input('museum_id'));
        if($museum->name != $request->input('name')){
            $request->validate(
            [
                'name' => 'required|unique:museums,name'
            ]);
        }
        $museum -> name = $request->input('name');
        $museum->location = $request->input('location');
        $museum->address = $request->input('address');
        $museum->email = $request->input('email');
        if (is_uploaded_file($_FILES['imgRoute']['tmp_name'])) 
        {
            //Validamos que el archivo tenga contenido
            if(empty($_FILES['imgRoute']['name']))
            {
                return Redirect::to('/museums/update')->withErrors(['Archivo no encontrado']);
            }

            $upload_file_name = $_FILES['imgRoute']['name'];
            //Compruebo que el nombre no sea demasiado largo
            if(strlen ($upload_file_name)>100)
            {
                return Redirect::to('/museums/update')->withErrors(['Nombre del archivo demasiado grande']);
            }
            //Elimino todos los caracteres "raros"
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
            //Limite fichero
            if ($_FILES['imgRoute']['size'] > 1000000) 
            {
                return Redirect::to('/museums/update')->withErrors(['Imagen demasiado grande']);
            }
            //Save the file
            $dest=dirname(__DIR__, 3).'/public/';
            if (!move_uploaded_file($_FILES['imgRoute']['tmp_name'], $dest.'images/museums/'.$upload_file_name)) 
            {
                return Redirect::to('/museums/update')->withErrors(['Error subiendo el archivo']);
            }
            //Muevo y renombro
            $dbroute = $dest.$museum->imgRoute;
            $extension_pos = strrpos($dbroute, '.');
            $old = substr($dbroute, 0, $extension_pos) . '.old' . substr($dbroute, $extension_pos);
            rename($dbroute, $old);
            rename($dest.'images/museums/'.$upload_file_name,$dbroute);
        }
        $museum->save();
        return Redirect::to('/museums/update')->withErrors(['ACTUALIZADO CON EXITO']);
    }

    public function destroyMuseum(Request $request){
        $aux = Museum::findOrFail($request->museum_id);
        $aux->delete();

        return Redirect::to('/museums/delete')->withErrors(['ELIMINADO CON EXITO']);
    }

    public function buscar(Request $request){
        $nombre = $request->get('name');
        $location = $request->get('location');
        if(isset($nombre) && isset($location)){ //si nos pasan los dos criterios
            $museums = Museum::where([['name', 'like', '%'.$nombre.'%'], ['location', 'like', '%'.$location.'%' ]])->paginate(2);
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
