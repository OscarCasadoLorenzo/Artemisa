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

    public function getCollection($id){
        $collection = Collection::find($id);

        return view('singleObject.collection', ['collection'=>$collection]);
    }

    public function createCollection(){
        $museums = Museum::all();
        return view('createObjects.collection', compact('museums'));  //modificado compact para el desplegable
    }

    public function saveCollection(Request $request){
        Collection::create($request);
        return "Colección $request->name añadida a la BD!";
    }

    public function deleteCollection(){
        $collections = Collection::all();

        return view('deleteObjects.collection', compact('collections'));
    }

    public function destroyCollection(Request $request){
        $col = Collection::findOrFail($request->collection_id);
        $col->delete();

        return redirect('/museums');
    }

    public function findCollection(){

    }

    public function update(Request $request)
    {
        $coll = Collection::table('name')->where('name',$request->input('old_name'))->first();
        $coll->validate(
        [
            'name' => 'required|unique:Collection,name'
        ]);
        $coll -> name = $request->input('name');
        $coll->nacionality = $request->input('nacionality');
        $coll->museum_id = $request->input('museum_id');
        $coll->save();
        return "Museo con nombre $request->old_name actualizado correctamente";
    }

    public function ordenar(Request $request){
        $opcion = $request->option;
        $idmuseo = $request->museum;
        $museo = Museum::find($idmuseo);
        if($opcion == 1){
            $collections = CollectionController::getCollections($idmuseo)->sortBy('id');
            return view('singleObject.museum', ['museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 2){
            $collections = CollectionController::getCollections($idmuseo)->sortBy('name');
            return view('singleObject.museum', ['museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 3){
            $collections = CollectionController::getCollections($idmuseo)->sortBy('updated_at');
            return view('singleObject.museum', ['museum'=>$museo, 'collections'=>$collections]);
        }
        else{
            $collections = CollectionController::getCollections($idmuseo);
            return view('singleObject.museum', ['museum'=>$museo, 'collections'=>$collections]);
        }
    }
}
