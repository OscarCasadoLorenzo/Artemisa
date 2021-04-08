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

//Rutas de prueba para el linkado de controladores
Route::get('/users/test', 'UserController@test');
Route::get('/museums/test', 'MuseumController@test'); 
Route::get('/collections/test', 'CollectionController@test'); 
Route::get('/artworks/test', 'ArtworkController@test'); 
Route::get('/authors/test', 'AuthorController@test'); 

//Registro e inicio de sesion
Route::post('/api/register', 'UserController@register');
Route::post('/api/login', 'UserController@login');

//Rutas de extracción de listados
Route::get('/users/', 'UserController@getUsers');
Route::get('/museums/', 'MuseumController@getMuseums'); 
Route::get('/collections/', 'CollectionController@getCollections'); 
Route::get('/artworks/', 'ArtworkController@getArtworks'); 
Route::get('/authors/', 'AuthorController@getAuthors'); 

//Creación de elementos
Route::get('/users/create', 'UserController@createUser');
Route::get('/museums/create', 'MuseumController@createMuseum'); 
Route::get('/collections/create', 'CollectionController@createCollection'); 
Route::get('/artworks/create', 'ArtworkController@createArtwork'); 
Route::get('/authors/create', 'AuthorController@createAuthor'); 