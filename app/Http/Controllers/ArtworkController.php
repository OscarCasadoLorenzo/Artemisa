<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\Collection;
use App\Author;

class ArtworkController extends Controller
{
    public function getArtworks($idM, $idC){
        $artworks = Artwork::where('collection_id','=', $idC)->paginate(3);
        return view('listObjects.artwork', ['artworks'=>$artworks]);
    }
    public function getSingleArtwork($id){
        $artwork = Artwork::findOrFail($id);

        return view('singleObject.artwork');
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
}
