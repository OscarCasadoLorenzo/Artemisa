<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class ArtworkController extends Controller
{
    public function test(Request $request){
        return "Acción de pruebas de ARTWORK-CONTROLLER";
    }

    public function getArtworks(Request $request){
        $u = Artwork::all();
        return $u;
    }

    public function createArtwork(Request $request){
        return view('create.artwork');
    }

    public function findArtworks(){
        $query = Artwork::where('title', 'The Port')->orderBy('year', 'desc')->get();
        return $query;
    }
}
