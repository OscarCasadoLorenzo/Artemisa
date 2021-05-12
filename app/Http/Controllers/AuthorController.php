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

    public static function getAuthor($id){
        $author = Author::find($id);
        $artworks = ArtworkController::getArtworksAuthor($id);
        return view('singleObject.author', ['author'=>$author], ['artworks'=>$artworks]);
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

    public function getDetails($id = 0)
    {
        $authors = Author::where('id',$id)->first();
        return response()->json($authors);
    }

    public function modifyAuthor()
    {
        $authors = Author::all();
        return view('updateObject.author', compact('authors',$authors));
    }

    public function update(Request $request)
    {
        $authors = Author::findOrFail($request->input('author_id'));
        if($authors->name != $request->input('name')){
            $request->validate(
            [
                'name' => 'required|unique:authors,name',
                //'birth_date' => 'date' Multivalidación?
            ]);
        }
        $authors -> name = $request->input('name');
        $authors->nacionality = $request->input('nacionality');
        $authors->birth_date = $request->input('birth_date');
        $authors->movement = $request->input('movement');
        $authors->imgRoute = $request->input('imgRoute');
        $authors->save();
        return "Autor con nombre $request->name actualizado correctamente";
    }

    public function destroyAuthor(Request $request){
        $aux = Author::findOrFail($request->author_id);
        $aux->delete();

        return redirect('/museums');
    }

    public function buscar(Request $request){
        $nombre = $request->get('name');
        if(isset($nombre)){               //si nos pasan solo el criterio nombre
            $authors = Author::where([['name', 'like', '%'.$nombre.'%']])->paginate(3);
            return view('listObjects.author',compact('authors'));
        }else{                                  //si no nos pasan ningun criterio
            $authors = Author::paginate(3);
            return view('listObjects.author', compact('authors'));
        }
    }

    public function findAuthors(Request $request){

    }
}
