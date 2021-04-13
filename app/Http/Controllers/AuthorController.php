<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function getAuthors(){
        $authors = Author::paginate(4);
        return view('listObjects.author', ['authors'=>$authors]);
    }

    public function createAuthor(){
        return view('createObjects.author');
    }

    public function saveAuthor(Request $request){
        $input = $request->all();
        $path = '/images/authors/';
        $filepath = $path . $input['imgRoute'];
        $file->move('images/authors', $input['imgRoute']);
        $input['imgRoute'] = $filepath;
        Author::create($input);
        return "Autor $request->name añadida a la BD!";
    }

    public function findAuthors(Request $request){
      
    }
}
