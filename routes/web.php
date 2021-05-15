<?php

use App\Http\Controllers\ArtworkController;
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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MuseumController@paginaInicial');

//Rutas de extracción de listados
Route::get('/users', 'UserController@getUsers');
Route::get('/museums', 'MuseumController@getMuseums');
Route::get('/authors', 'AuthorController@getAuthors');

//Rutas de extracción de objeto unico
Route::get('/artworks/{id}', 'ArtworkController@getArtwork')->where('id', '\d+');
Route::get('/authors/{id}', 'AuthorController@getAuthor')->where('id', '\d+');
Route::get('/users/{id}', 'UserController@getUser')->where('id', '\d+');
Route::get('/museums/{id}', 'MuseumController@getMuseum')->where('id', '\d+'); //solo permite que id sean numeros
Route::get('/collections/{id}', 'CollectionController@getCollection')->where('id', '\d+'); //solo permite que id sean numeros

//Rutas para login
Route::post('/users/login', 'UserController@login');

//Inserción de elementos
Route::post('/users', 'UserController@saveUser');
Route::post('/museums', 'MuseumController@saveMuseum');
Route::post('/authors', 'AuthorController@saveAuthor');
Route::post('/collections', 'CollectionController@saveCollection');
Route::post('/artworks', 'ArtworkController@saveArtwork');

//Destruccion de elementos
Route::delete('/users', 'UserController@destroyUser');
Route::delete('/museums', 'MuseumController@destroyMuseum');
Route::delete('/collections', 'CollectionController@destroyCollection');
Route::delete('/artworks', 'ArtworkController@destroyArtwork');
Route::delete('/authors', 'AuthorController@destroyAuthor');

//Creación de elementos
Route::get('/users/create', 'UserController@createUser');
Route::get('/museums/create', 'MuseumController@createMuseum');
Route::get('/collections/create', 'CollectionController@createCollection');
Route::get('/artworks/create', 'ArtworkController@createArtwork');
Route::get('/authors/create', 'AuthorController@createAuthor');

//Modificacion
Route::get('/users/update', 'UserController@modifyUser')->name('user.modifyUser');
Route::post('/users/update', 'UserController@update')->name('user.update');
Route::get('/museums/update', 'MuseumController@modifyMuseum');
Route::post('/museums/update', 'MuseumController@update')->name('museum.update');
Route::get('/collections/update', 'CollectionController@modifyCollection');
Route::get('/artworks/update', 'ArtworkController@modifyArtwork');
Route::get('/authors/update', 'AuthorController@modifyAuthor');
Route::post('/artworks/update', 'AuthorController@update')->name('author.update');


//Eliminación de elementos
Route::get('/users/delete', 'UserController@deleteUser');
Route::get('/museums/delete', 'MuseumController@deleteMuseum');
Route::get('/collections/delete', 'CollectionController@deleteCollection');
Route::get('/artworks/delete', 'ArtworkController@deleteArtwork');
Route::get('/authors/delete', 'AuthorController@deleteAuthor');

//RUTAS + COMPLEJAS
Route::get('/museums/{idM}/collections/{idC}', 'CollectionController@getCollection')->where('idM', '\d+');
Route::get('/museums/{idM}/collections/{idC}/artworks', 'ArtworkController@getArtworks')->where('idM', '\d+');
//Route::get('/museums/{idM}/collections/{idC}/artworks/{idA}', 'ArtworkController@getArtwork');

//FILTRACION DE ELEMENTOS
Route::get('/filterCollection', 'CollectionController@ordenar')->name('collection.filter');
Route::get('/filterArtwork', 'ArtworkController@ordenar')->name('artwork.filter');
Route::get('/museums', 'MuseumController@buscar');
Route::get('/authors', 'AuthorController@buscar');


//AJAX
Route::get('get/details/user{id}', 'UserController@getDetails')->name('getDetailsUser');
Route::get('get/details/author{id}', 'AuthorController@getDetails')->name('getDetailsAuthor');
Route::get('get/details/museum{id}', 'MuseumController@getDetails')->name('getDetailsMuseum');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
