<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    public static function getCollections($id){
        $collections = Collection::where('museum_id','=', $id)->get();
        return $collections;
    }

    public function createCollection(){
        return view('createObjects.collection');
    }

    public function saveCollection(){

    }

    public function findCollection(){
      
    }
}
