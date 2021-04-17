<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\Collection;
use App\Museum;
use App\Author;

class ArtworkController extends Controller
{
    public function getArtworks($idM, $idC){
        $artworks = Artwork::where('collection_id','=', $idC)->paginate(3);
        return view('listObjects.artwork', ['artworks'=>$artworks]);
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
        return "Obra $request->name añadida a la BD!";
    }

    public function deleteArtwork(){
        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function destroyArtwork(Request $request){
        $art = Artwork::findOrFail($request->artwork_id);
        $art->delete();

        return redirect('/museums');
    }

    public function findArtworks(){

    }

    public function ordenar(Request $request){
        $opcion = $request->option;
        $idcol = $request->collection;
        $idmuseo = $request->museum;
        $museo = Museum::find($idmuseo);
        $coleccion = Collection::find($idcol);
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
