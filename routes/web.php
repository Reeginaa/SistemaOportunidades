<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('publico');
// });
Route::get('/', [App\Http\Controllers\PublicoController::class, 'index'])->name('publico');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('cidade', 'App\Http\Controllers\CidadeController');
    Route::get('cidade/{id}/destroy', 'App\Http\Controllers\CidadeController@destroy');

    Route::resource('area', 'App\Http\Controllers\AreaController');
    Route::get('area/{id}/destroy', 'App\Http\Controllers\AreaController@destroy');

    Route::resource('tipocontratacoes', 'App\Http\Controllers\TipoContratacoesController');
    Route::get('tipocontratacoes/{id}/destroy', 'App\Http\Controllers\TipoContratacoesController@destroy');

    Route::resource('formatotrabalhos', 'App\Http\Controllers\FormatoTrabalhosController');
    Route::get('formatotrabalhos/{id}/destroy', 'App\Http\Controllers\FormatoTrabalhosController@destroy');

    Route::resource('divulgadores', 'App\Http\Controllers\DivulgadoresController');
    Route::get('divulgadores/{id}/destroy', 'App\Http\Controllers\DivulgadoresController@destroy');

    Route::resource('vagas', 'App\Http\Controllers\VagaController');
    Route::get('vaga/{id}/destroy', 'App\Http\Controllers\VagaController@destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
