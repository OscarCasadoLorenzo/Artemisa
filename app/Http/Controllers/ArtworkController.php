<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\Collection;
use App\Museum;
use App\Author;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ArtworkController extends Controller
{
    public function getArtworks($idM, $idC){
        $artworks = Artwork::where('collection_id','=', $idC)->paginate(3);
        return view('listObjects.artwork', ['artworks'=>$artworks]);
    }

    public static function getArtworksAuthor($idA){
        $artworks = Artwork::where('author_id','=', $idA)->get();
        return $artworks;
    }

    public function getArtworksList(){              //funcion de pruba, borrar
        $artworks = Artwork::paginate(4);
        return view('listObjects.artwork', ['artworks' => $artworks]);
    }

    public function getArtwork($id){
        $artwork = Artwork::find($id);
        $author = Author::find($artwork->author_id);
        $collection = Collection::find($artwork->collection_id);
        $museum = Museum::find($collection->museum_id);
        $corazon = 0;
        if(Auth::check()){
            if(User::find(Auth::User()->id)->artworks()->having('pivot_artwork_id','=',$id)->get()->isEmpty()){
                $corazon = 0;
            }
            else{
                $corazon = 1;
            }
        }
        return view('singleObject.artwork', ['artwork'=>$artwork, 'author'=>$author, 'museum'=>$museum, 'collection'=>$collection, 'corazon' => $corazon]);
    }

    public function getDetails($id = 0)
    {
        $art = Artwork::where('id',$id)->first();
        return response()->json($art);
    }

    public function createArtwork(){
        $collections = Collection::all();
        $authors = Author::all();
        return view('createObjects.artwork', compact('collections'), compact('authors'));
    }

    public function saveArtwork(Request $request){
        $input = $request->all();
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/artworks', $filename);
            $path = '/images/artworks/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Artwork::create($input);
        $collections = Collection::all();
        $authors = Author::all();
        return view('createObjects.artwork', compact('collections'), compact('authors'));
    }

    public function deleteArtwork(){
        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function destroyArtwork(Request $request){
        $art = Artwork::findOrFail($request->artwork_id);
        $art->delete();

        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function modifyArtwork()
    {
        $artworks = Artwork::all();
        $authors = Author::all();
        $collections = Collection::all();
        return view('updateObject.artwork') -> with(compact('artworks','authors','collections'));
    }
    public function update(Request $request)
    {
        $art = Artwork::findOrFail($request->input('id'));
        if($art->title != $request->input('title'))
        {
            $request->validate(
            [
                'title' => 'required|unique:Artwork,title'
            ]);
            $art->title = $request->input('title');
        }
        $art->movement = $request->input('movement');
        $art->genre = $request->input('genre');
        $art->dimensions = $request->input('dimensions');
        $art->year = $request->input('year');
        //$art->imgRoute = $request->input('imgRoute');
        try
        {
            Author::findOrFail($request->input('author_id'));
        }
        catch(ModelNotFoundException $e)
        {
            Redirect::to('/artwork/update')->withErrors(['El artista ya no existe en la BD'])
                                                     ->with(['art' => $request->all()])->withInput();
        }
        $art->author_id = $request->input('author_id');         //Validar foreign key por si han eliminado el artista antes de guardar
        try
        {
            Collection::findOrFail($request->input('collection_id'));
        }
        catch(ModelNotFoundException $e)
        {
            Redirect::to('/artwork/update')->withErrors(['La coleccion ya no existe en la BD'])
                                                     ->with(['art' => $request->all()])->withInput();
        }
        $art->collection_id = $request->input('collection_id');
        $art->save();
        return Redirect::to('/artwork/update')->withErrors(['ACTUALIZADO CON EXITO']);
    }

    public function findArtworks(){

    }

    public function ordenar(Request $request){
        $opcion = $request->option;
        $idcol = $request->collection;
        $idmuseo = $request->museum;
        $museo = Museum::find($idmuseo);
        $collections = Collection::find($idcol);
        if($opcion == 1){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('id');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$artworks]);
        }
        else if($opcion == 2){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('name');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 3){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('year');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 4){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('movement');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else{
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol);
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
    }
}

