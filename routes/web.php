<?php

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

Route::get('/', 'FilmController@index')->name('films');

Route::resource('films', 'FilmController');
Route::resource('genres', 'GenreController', ['only' => ['index', 'show']]);