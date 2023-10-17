<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticador;


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

Route::get('/contatos', 'App\Http\Controllers\ContatosController@listarContatos')->name('contatos.index');

Route::get('/contatos/criar', 'App\Http\Controllers\ContatosController@create')->name('contatos.create')->middleware(Autenticador::class);
Route::post('/contatos/criar', 'App\Http\Controllers\ContatosController@store')->name('contatos.store');

Route::get('/contatos/{contato}/edit', 
    'App\Http\Controllers\ContatosController@edit')->name('contatos.edit');
Route::post('/contatos/{contato}', 
    'App\Http\Controllers\ContatosController@update')->name('contatos.update');

Route::post('/contatos/remover/{id}', 
    'App\Http\Controllers\ContatosController@destroy')->name('contatos.destroy');

Route::get('/login','App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login','App\Http\Controllers\LoginController@store')->name('signin');

Route::get('/logout', [LoginController::class,'destroy'])->name('logout');

Route::get('/users/create','App\Http\Controllers\UsersController@create')->name('users.create');
        
Route::post('/register','App\Http\Controllers\UsersController@store')->name('users.store');