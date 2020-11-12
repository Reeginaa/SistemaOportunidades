<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('cidade', 'App\Http\Controllers\CidadeController');
Route::get('cidade/{id}/destroy', 'App\Http\Controllers\CidadeController@destroy');


Route::resource('area', 'App\Http\Controllers\AreaController');
Route::get('area/{id}/destroy', 'App\Http\Controllers\AreaController@destroy');
