<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function test(Request $request){
        return "Acción de pruebas de AUTHOR-CONTROLLER";
    }

    public function getAuthors(Request $request){
        $u = Author::all();
        return $u;
    }

    public function createAuthor(Request $request){
        return view('create.author');
    }
}
