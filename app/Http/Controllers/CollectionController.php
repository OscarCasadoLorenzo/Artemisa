<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    public function getCollections(){
        $u = Collection::all();
        return $u;
    }

    public function createCollection(){
        return view('createObjects.collection');
    }

    public function saveCollection(){

    }

    public function findCollection(){
      
    }
}
