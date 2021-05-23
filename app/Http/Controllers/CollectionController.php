<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Museum;
use DB;
use App\Artwork;
use App\Http\Requests\CollectionRequest;
use Illuminate\Support\Facades\Redirect;

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
        $artworks = Artwork::all();
        return view('createObjects.collection', compact('museums','artworks'));  //modificado compact para el desplegable
    }

    public function saveCollection(CollectionRequest $request){
        $coll = new Collection;
        $coll -> id = DB::select("SHOW TABLE STATUS LIKE 'collections'")[0]->Auto_increment + 1;
        $validator = $request->validate(
        [
            'name' => 'required|unique:collections,name'
        ]);
        $coll -> name = $request->input('name');
        if(!isset($_POST['museum']) || empty($_POST['museum'])) return Redirect::to('/collections/create')->withInput($request->all())->withErrors(['You must select the museum']);
        $coll->museum_id = $_POST['museum'];
        $artworks = Artwork::all();
        $selected = $request->input('art');
        foreach($artworks as $artwork)
        {
            if(in_array($artwork->id, $selected)) 
            {
                $artwork->collection_id = $coll->id;
            }
        }
        $coll->save();
        foreach($artworks as $artwork) $artwork->save();
        return Redirect::to('/collections/create')->withErrors(['Collection Created']);
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
        $coll = Collection::findOrFail($request->input('collection_id'));
        if($coll->name != $request->input('name'))
        {
            $validator = $request->validate(
            [
                'name' => 'required|unique:collections,name'
            ]);
            $coll -> name = $request->input('name');
        }
        $coll->museum_id = $_POST["museum"];
        $artworks = Artwork::all();
        $selected = $request->input('art');
        foreach($artworks as $artwork)
        {
            if(in_array($artwork->id, $selected))  //Separar los actualizados de los no actualizados
            {
                if($artwork->collection_id != $coll->id)
                {
                    $artwork->collection_id = $coll->id;
                    $updated[] = $artwork;
                }
            }
            else
            {
                if(($newcol = $request->input('collectSub'.$artwork->id)) == "-1") return Redirect::to('/collections/update')->withInput($request->all())->withErrors(['You must choose the new collection in deselected artwork']);
                else if((int)$newcol > -1)
                {
                    $artwork->collection_id = $newcol;
                    $updated[] = $artwork;
                }
            }
        }
        foreach($updated as $artwork) $artwork->save();
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
