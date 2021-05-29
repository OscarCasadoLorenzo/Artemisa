<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\Collection;
use App\Museum;
use App\Author;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArtworkRequest;
use Illuminate\Support\Facades\Auth;

class ArtworkController extends Controller
{
    public function getArtworks($idM, $idC){
        $artworks = Artwork::where('collection_id','=', $idC)->paginate(3);
        return view('listObjects.artwork', ['artworks'=>$artworks]);
    }

    public static function getArtworksAuthor($idA){
        $artworks = Artwork::where('author_id','=', $idA)->get();
        return $artworks;
    }

    public function getArtworksList(){              //funcion de pruba, borrar
        $artworks = Artwork::paginate(4);
        return view('listObjects.artwork', ['artworks' => $artworks]);
    }

    public function getArtwork($id){
        $artwork = Artwork::find($id);
        $author = Author::find($artwork->author_id);
        $collection = Collection::find($artwork->collection_id);
        $museum = Museum::find($collection->museum_id);
        $corazon = 0;
        if(Auth::check()){
            if(User::find(Auth::User()->id)->artworks()->having('pivot_artwork_id','=',$id)->get()->isEmpty()){
                $corazon = 0;
            }
            else{
                $corazon = 1;
            }
        }
        return view('singleObject.artwork', ['artwork'=>$artwork, 'author'=>$author, 'museum'=>$museum, 'collection'=>$collection, 'corazon' => $corazon]);
    }

    public function getDetails($id = 0)
    {
        $art = Artwork::where('id',$id)->first();
        return response()->json($art);
    }

    public function createArtwork(){
        $collections = Collection::all();
        $authors = Author::all();
        return view('createObjects.artwork', compact('collections'), compact('authors'));
    }

    public function saveArtwork(ArtworkRequest $request){
        $request->validate(
            [
                'title' => 'required|unique:artworks,title'
            ]);
        $artwork = new artwork();
        $artwork->title = $request->input('title');
        $artwork->movement = $request->input('movement');
        $artwork->genre = $request->input('genre');
        $artwork->dimensions = $request->input('dimensions');
        $artwork->year = $request->input('year');
        $artwork->author_id = $request->input('author_id');
        $artwork->collection_id = $request->input('collection_id');
        if (is_uploaded_file($_FILES['imgRoute']['tmp_name']))
        {
            //Validamos que el archivo tenga contenido
            if(empty($_FILES['imgRoute']['name']))
            {
                return Redirect::to('/artworks/create')->withErrors(['Archivo no encontrado']);
            }

            $upload_file_name = $_FILES['imgRoute']['name'];
            //Compruebo que el nombre no sea demasiado largo
            if(strlen ($upload_file_name)>100)
            {
                return Redirect::to('/artworks/create')->withErrors(['Nombre del archivo demasiado grande']);
            }
            //Elimino todos los caracteres "raros"
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
            //Limite fichero
            if ($_FILES['imgRoute']['size'] > 1000000)
            {
                return Redirect::to('/artworks/create')->withErrors(['Imagen demasiado grande']);
            }
            //Save the file
            $dest=dirname(__DIR__, 3).'/public/';
            if (!move_uploaded_file($_FILES['imgRoute']['tmp_name'], $dest.'images/artworks/'.$request->input('title').'.png'))
            {
                return Redirect::to('/artworks/create')->withErrors(['Error subiendo el archivo']);
            }
            $artwork->imgRoute = 'images/artworks/'.$request->input('title').'.png';
        }
        $artwork->save();
        return Redirect::to('/artworks/create')->withErrors(['CREADO CON EXITO']);
    }

    public function deleteArtwork(){
        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function destroyArtwork(Request $request){
        $art = Artwork::findOrFail($request->artwork_id);
        $art->delete();

        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function modifyArtwork()
    {
        $artworks = Artwork::all();
        $authors = Author::all();
        $collections = Collection::all();
        return view('updateObject.artwork') -> with(compact('artworks','authors','collections'));
    }

    public function update(ArtworkRequest $request)
    {
        $art = Artwork::findOrFail($request->input('id'));
        if($art->title != $request->input('title'))
        {
            $request->validate(
            [
                'title' => 'required|unique:artworks,title'
            ]);
            $art->title = $request->input('title');
        }
        $art->movement = $request->input('movement');
        $art->genre = $request->input('genre');
        if($request->input('dimensions') == "") $art->dimensions = 'Desconocido';
        else $art->dimensions = $request->input('dimensions');
        $art->year = $request->input('year');
        //$art->imgRoute = $request->input('imgRoute');
        try
        {
            Author::findOrFail($request->input('author_id'));
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::to('/artworks/update')->withErrors(['El artista ya no existe en la BD'])
                                                     ->with(['art' => $request->all()])->withInput();
        }
        $art->author_id = $request->input('author_id');         //Validar foreign key por si han eliminado el artista antes de guardar
        try
        {
            Collection::findOrFail($request->input('collection_id'));
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::to('/artworks/update')->withErrors(['La coleccion ya no existe en la BD'])
                                                     ->with(['art' => $request->all()])->withInput();
        }
        $art->collection_id = $request->input('collection_id');
        //Subir fichero
        if (is_uploaded_file($_FILES['imgRoute']['tmp_name']))
        {
            //Validamos que el archivo tenga contenido
            if(empty($_FILES['imgRoute']['name']))
            {
                return Redirect::to('/artworks/update')->withErrors(['Archivo no encontrado']);
            }

            $upload_file_name = $_FILES['imgRoute']['name'];
            //Compruebo que el nombre no sea demasiado largo
            if(strlen ($upload_file_name)>100)
            {
                return Redirect::to('/artworks/update')->withErrors(['Nombre del archivo demasiado grande']);
            }
            //Elimino todos los caracteres "raros"
            $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
            //Limite fichero
            if ($_FILES['imgRoute']['size'] > 1000000)
            {
                return Redirect::to('/artworks/update')->withErrors(['Imagen demasiado grande']);
            }
            //Save the file
            $dest=dirname(__DIR__, 3).'/public/';
            if (!move_uploaded_file($_FILES['imgRoute']['tmp_name'], $dest.'images/artworks/'.$upload_file_name))
            {
                return Redirect::to('/artworks/update')->withErrors(['Error subiendo el archivo']);
            }
            //Muevo y renombro
            if(file_exists($dest.'images/artworks/'.$art->title.'.png'))
            {
                $dbroute = $dest.$art->imgRoute;
                $extension_pos = strrpos($dbroute, '.');
                $old = substr($dbroute, 0, $extension_pos) . '.old' . substr($dbroute, $extension_pos);
                rename($dbroute, $old);
                rename($dest.'images/artworks/'.$upload_file_name,$dbroute);
            }
            else
            {
                rename($dest.'images/artworks/'.$upload_file_name,$dest.'images/artworks/'.$art->title.'.png');
                $art->imgRoute = 'images/artworks/'.$art->title.'.png';
            }

        }
        $art->save();
        return Redirect::to('/artworks/update')->withErrors(['ACTUALIZADO CON EXITO']);
    }

    public function findArtworks(){

    }

    public function ordenar(Request $request){
        $opcion = $request->option;
        $idcol = $request->collection;
        $idmuseo = $request->museum;
        $museo = Museum::find($idmuseo);
        $collections = Collection::find($idcol);
        if($opcion == 1){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('id');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$artworks]);
        }
        else if($opcion == 2){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('name');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 3){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('year');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else if($opcion == 4){
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol)->sortBy('movement');
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
        else{
            $artworks = ArtworkController::getArtworks($idmuseo, $idcol);
            return view('listObjects.artwork', ['artwork'=> $artworks, 'museum'=>$museo, 'collections'=>$collections]);
        }
    }
}

