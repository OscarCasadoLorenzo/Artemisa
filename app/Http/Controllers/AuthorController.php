<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function getAuthors(){
        $authors = Author::all();
        return view('listObjects.author', ['authors'=>$authors]);
    }

    public function createAuthor(){
        return view('createObjects.author');
    }

    public function saveAuthor(Request $request){

    }

    public function findAuthors(Request $request){
      
    }
}
