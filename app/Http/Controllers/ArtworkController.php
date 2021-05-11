<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;
use App\Collection;
use App\Museum;
use App\Author;

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

    public function getArtwork($id){
        $artwork = Artwork::find($id);
        $author = Author::find($artwork->author_id);


        return view('singleObject.artwork', ['artwork'=>$artwork, 'author'=>$author]);
    }

    public function createArtwork(){
        $collections = Collection::all();
        $authors = Author::all();
        return view('createObjects.artwork', compact('collections'), compact('authors'));
    }

    public function saveArtwork(Request $request){
        $input = $request->all();
        if($file = $request->file('imgRoute')){
            $filename = $file->getClientOriginalName();
            $file->move('images/artworks', $filename);
            $path = '/images/artworks/';
            $filepath = $path . $filename;
            $input['imgRoute'] = $filepath;
        }
        Artwork::create($input);
        return "Obra $request->name añadida a la BD!";
    }

    public function deleteArtwork(){
        $artworks = Artwork::all();

        return view('deleteObjects.artwork', compact('artworks'));
    }

    public function destroyArtwork(Request $request){
        $art = Artwork::findOrFail($request->artwork_id);
        $art->delete();

        return redirect('/museums');
    }

    public function update(Request $request)
    {
        $art = Artwork::table('title')->where('title',$request->input('old_title'))->first();
        $request->validate(
        [
            'title' => 'required|unique:Artwork,title'
        ]);
        $art->movement = $request->input('movement');
        $art->genre = $request->input('genre');
        $art->dimensions = $request->input('dimensions');
        $art->title = $request->input('title');
        $art->year = $request->input('year');
        $art->imgRoute = $request->input('imgRoute');
        $art->eWiki = $request->input('eWiki');
        $art->author_id = $request->input('author_id');         //Validar foreign key?
        $art->collection_id = $request->input('collection_id');
        $art->save();
        return "Artwork con nombre $request->old_title actualizado correctamente";
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
