<?php
use App\Museum;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@show');

//Rutas de extracción de listados
Route::get('/users/', 'UserController@getUsers');
Route::get('/museums/', 'MuseumController@getMuseums'); 
Route::get('/authors/', 'AuthorController@getAuthors'); 
Route::get('/artworks/', 'ArtworkController@getArtworks'); 

//Inserción de elementos
Route::post('/users', 'UserController@saveUser'); 
Route::post('/museums', 'MuseumController@saveMuseum'); 
Route::post('/authors', 'AuthorController@saveAuthors'); 
Route::post('/collections', 'CollectionController@saveCollection'); 
Route::post('/artworks', 'ArtworkController@saveArtworks'); 


//Creación de elementos
Route::get('/users/create', 'UserController@createUser');
Route::get('/museums/create', 'MuseumController@createMuseum'); 
Route::get('/collections/create', 'CollectionController@createCollection'); 
Route::get('/artworks/create', 'ArtworkController@createArtwork'); 
Route::get('/authors/create', 'AuthorController@createAuthor'); 

//RUTAS + COMPLEJAS
Route::get('/museums/{id}', 'MuseumController@getMuseum'); 
Route::get('/museums/{idM}/collections/{idC}', 'CollectionController@getCollection');
Route::get('/museums/{idM}/collections/{idC}/artworks', 'ArtworkController@getArtworks');
//Route::get('/museums/{idM}/collections/{idC}/artworks/{idA}', 'ArtworkController@getArtwork');





