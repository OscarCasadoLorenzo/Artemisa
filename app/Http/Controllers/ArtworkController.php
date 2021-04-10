<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class ArtworkController extends Controller
{
    public function getArtworks(){
        $u = Artwork::all();
        return $u;
    }

    public function createArtwork(){
        return view('createObjects.artwork');
    }
    
    public function saveArtwork(Request $request){

    }

    public function findArtworks(){
      
    }
}
