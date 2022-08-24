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

Auth::routes();

Route::resource('categoria', 'App\Http\Controllers\CategoriaController')->name('index', 'categoria')->middleware('auth');
Route::resource('noticia', 'App\Http\Controllers\NoticiaController')->name('index', 'noticia')->middleware('auth');
Route::resource('artigo', 'App\Http\Controllers\ArtigoController')->name('index', 'artigo')->middleware('auth');
Route::resource('banner', 'App\Http\Controllers\BannerController')->name('index', 'banner')->middleware('auth');
Route::resource('anuncio', 'App\Http\Controllers\AnuncioController')->name('index', 'anuncio')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

