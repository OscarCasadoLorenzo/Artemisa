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

    public function createArtwork(){
        $collections = Collection::all();
        $authors = Author::all();
        return view('createObjects.artwork', compact('collections'), compact('authors'));
    }
    
    public function saveArtwork(Request $request){
        $input = $request->all();
        $path = '/images/artworks/';
        $filepath = $path . $input['imgRoute'];
        $file->move('images/artworks', $input['imgRoute']);
        $input['imgRoute'] = $filepath;
        Artwork::create($input);
        return "Obra $request->name añadida a la BD!";
    }

    public function findArtworks(){
      
    }
}
