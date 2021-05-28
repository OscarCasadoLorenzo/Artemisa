<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Artwork;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AuthorRequest;

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

    public function saveAuthor(AuthorRequest $request){

        $request->validate(
        [
            'name' => 'unique:authors,name',
        ]);
        
        $author = new author();
        $author->name = $request->input('name');
        $author->nacionality = $request->input('nacionality');
        $author->birth_date = $request->input('birth_date');
        $author->movement = $request->input('movement');
        if (is_uploaded_file($_FILES['imgRoute']['tmp_name']))
        {
            //Validamos que el archivo tenga contenido
            if(empty($_FILES['imgRoute']['name']))
            {
                return Redirect::to('/authors/create')->withErrors(['Archivo no encontrado']);
            }

            $upload_file_name = $_FILES['imgRoute']['name'];
            //Compruebo que el nombre no sea demasiado largo
            if(strlen ($upload_file_name)>100)
            {
                return Redirect::to('/authors/create')->withErrors(['Nombre del archivo demasiado grande']);
            }
            //Elimino todos los caracteres "raros"
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
            //Limite fichero
            if ($_FILES['imgRoute']['size'] > 1000000)
            {
                return Redirect::to('/authors/create')->withErrors(['Imagen demasiado grande']);
            }
            //Save the file
            $dest=dirname(__DIR__, 3).'/public/';
            if (!move_uploaded_file($_FILES['imgRoute']['tmp_name'], $dest.'images/authors/'.$request->input('name').'.png'))
            {
                return Redirect::to('/authors/create')->withErrors(['Error subiendo el archivo']);
            }
            $author->imgRoute = 'images/authors/'.$request->input('name').'.png';
        }
        $author->save();
        return Redirect::to('/authors/create')->withErrors(['Autor creado correctamente']);
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

    public function update(AuthorRequest $request)
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
        //Subir fichero
        if (is_uploaded_file($_FILES['imgRoute']['tmp_name']))
        {
            //Validamos que el archivo tenga contenido
            if(empty($_FILES['imgRoute']['name']))
            {
                return Redirect::to('/authors/update')->withErrors(['Archivo no encontrado']);
            }

            $upload_file_name = $_FILES['imgRoute']['name'];
            //Compruebo que el nombre no sea demasiado largo
            if(strlen ($upload_file_name)>100)
            {
                return Redirect::to('/authors/update')->withErrors(['Nombre del archivo demasiado grande']);
            }
            //Elimino todos los caracteres "raros"
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
            //Limite fichero
            if ($_FILES['imgRoute']['size'] > 1000000)
            {
                return Redirect::to('/authors/update')->withErrors(['Imagen demasiado grande']);
            }
            //Save the file
            $dest=dirname(__DIR__, 3).'/public/';
            if (!move_uploaded_file($_FILES['imgRoute']['tmp_name'], $dest.'images/authors/'.$upload_file_name))
            {
                return Redirect::to('/authors/update')->withErrors(['Error subiendo el archivo']);
            }
            //Muevo y renombro
            if(file_exists($dest.'images/authors/'.$authors->name.'.png'))
            {
                $dbroute = $dest.$authors->imgRoute;
                $extension_pos = strrpos($dbroute, '.');
                $old = substr($dbroute, 0, $extension_pos) . '.old' . substr($dbroute, $extension_pos);
                rename($dbroute, $old);
                rename($dest.'images/authors/'.$upload_file_name,$dbroute);
            }
            else
            {
                rename($dest.'images/authors/'.$upload_file_name,$dest.'images/authors/'.$authors->name.'.png');
            }
        }
        $authors->save();
        //cambiar el redirect para que lleve a la pagina del author modificado
        return Redirect::to('/authors/update')->withErrors(['ACTUALIZADO CON EXITO']);
    }

    public function destroyAuthor(Request $request){
        $aux = Author::findOrFail($request->author_id);
        $aux->delete();

        $authors = Author::all();

        return Redirect::to('/authors/delete')->withErrors(['ELIMINADO CON EXITO']);
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
