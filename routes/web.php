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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/museums/{id}', function ($id) {
    try{
        $m = Museum::findOrFail($id);
        return $m;
    } catch(\Exception $e){
        return response()->json(['message'=>"museum $id not found"], 404);
    }
});