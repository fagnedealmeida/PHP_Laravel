<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticador;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
   echo "Olá mundo! Estou programando em laravel!"; 
});

Route::get('/series', 
    'App\Http\Controllers\SeriesController@listarSeries')->name('series.index')->middleware(Autenticador::class);

Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')->name('series.create')->middleware(Autenticador::class);

Route::post('/series/criar', 
    'App\Http\Controllers\SeriesController@store')->name('series.store');

Route::post('/series/remover/{id}', 'App\Http\Controllers\SeriesController@destroy');

Route::get('/series/{serie}/edit', 'App\Http\Controllers\SeriesController@edit')->name('series.edit');

Route::post('/series/{serie}', 'App\Http\Controllers\SeriesController@update')->name('series.update');

Route::get('/series/{series}/seasons', 
    'App\Http\Controllers\SeasonsController@index')->name('seasons.index');


Route::get('/seasons/{season}/episodes', 
    'App\Http\Controllers\EpisodesController@index')->name('episodes.index');
	
Route::post('/seasons/{season}/episodes', 
	'App\Http\Controllers\EpisodesController@update')->name('episodes.update');

Route::get('/login', 
    'App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login', 
    'App\Http\Controllers\LoginController@store')->name('signin');
    
Route::get('/users/create', 
        'App\Http\Controllers\UsersController@create')->name('users.create');
        
Route::post('/register', 
    'App\Http\Controllers\UsersController@store')->name('users.store');

Route::get('/logout', [LoginController::class,'destroy'])->name('logout');
