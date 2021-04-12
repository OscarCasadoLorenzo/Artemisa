<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class ArtworkController extends Controller
{
    public function getArtworks($idM, $idC){
        $artworks = Artwork::where('collection_id','=', $idC)->paginate(3);
        return view('listObjects.artwork', ['artworks'=>$artworks]);
    }

    public function createArtwork(){
        return view('createObjects.artwork');
    }
    
    public function saveArtwork(Request $request){
        
    }

    public function findArtworks(){
      
    }
}
