<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    public function test(Request $request){
        return "Acción de pruebas de COLLECTION-CONTROLLER";
    }

    public function getCollections(Request $request){
        $u = Collection::all();
        return $u;
    }

    public function createCollection(){
        return view('createObjects.collection');
    }

    public function saveCollection(Request $request){

    }

    public function findCollection(Request $request){
      
    }
}
