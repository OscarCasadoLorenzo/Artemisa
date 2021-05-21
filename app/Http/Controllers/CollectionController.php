<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Museum;
use App\Artwork;
use App\Http\Requests\CollectionRequest;

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

    public function saveCollection(CollectionRequest $request){
        $request->validate(
            [
                'name' => 'unique:users',
            ]);

        $valores = array('_token' => $request->_token, 'name' => $request->name, 'museum_id' => $request->museum_id);
        Collection::create($valores);
        $museums = Museum::all();
        return view('createObjects.collection', compact('museums'));
    }

    public function deleteCollection(){
        $collections = Collection::all();

        return view('deleteObjects.collection', compact('collections'));
    }

    public function destroyCollection(Request $request){
        $col = Collection::findOrFail($request->collection_id);
        $col->delete();

        $collections = Collection::all();

        return view('deleteObjects.collection', compact('collections'));
    }

    public function findCollection(){

    }

    public function modifyCollection()
    {
        $collections = Collection::all();
        $artworks = Artwork::all();
        $museums = Museum::all();
        return view('updateObject.collection') -> with(compact('museums','artworks','collections'));
    }

    public function getDetails($id = 0)
    {
        $collections = Collection::where('id',$id)->first();
        return response()->json($collections);
    }

    public function getCollectionArtwork($id = 0)
    {
        $artworks = Artwork::select('id')->where('collection_id', $id)->get();
        return response()->json($artworks);
    }

    public function update(CollectionRequest $request)
    {
        $coll = Collection::findOrFail($request->input('id'));
        if($coll->name != $request->input('name'))
        {
            $request->validate(
            [
                'name' => 'required|unique:Collection,name'
            ]);
            $coll -> name = $request->input('name');
        }
        $coll->museum_id = $request->input('museum_id');
        $artworks = Artwork::all();
        $selected = $request->input('art');
        foreach($artworks as $artwork)
        {
            if(in_array($artwork->id, $selected)) return Redirect::to('/collections/update')->withErrors(['ACTUALIZADO CON EXITO']);
        }
        $coll->save();
        return Redirect::to('/collections/update')->withErrors(['ACTUALIZADO CON EXITO']);
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
