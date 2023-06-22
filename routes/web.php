<?php

use App\Http\Controllers\AllergieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route naar de index van allergeen
Route::get('/allergeen', 'App\Http\Controllers\AllergieController@index')->name('allergeen.index');

//route naar de show van de juist id
//Route::resource('/allergeen/show/{id}', 'App\Http\Controllers\AllergieController@show')->name('allergeen.show');

//route met resource naar de controller
Route::resource('allergeen', AllergieController::class);
