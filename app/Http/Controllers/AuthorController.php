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
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/authors', $filename);
            $path = '/images/authors/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Author::create($input);
        return "Autor $request->name añadida a la BD!";
    }

    public function deleteAuthor(){
        $authors = Author::all();

        return view('deleteObjects.author', compact('authors'));
    }

    public function destroyAuthor(Request $request){
        $aux = Author::findOrFail($request->author_id);
        $aux->delete();

        return redirect('/museums');
    }

    public function findAuthors(Request $request){

    }
}
