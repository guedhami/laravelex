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

Route::get('/', 'App\Http\Controllers\PagesController@index');


Route::get('/blog', 'App\Http\Controllers\PostsController@index');
Route::post('/blog', 'App\Http\Controllers\PostsController@store');
Route::get('/blog/create', 'App\Http\Controllers\PostsController@create');
Route::get('/blog/{slug}', 'App\Http\Controllers\PostsController@show');
Route::get('/blog/{slug}/edit', 'App\Http\Controllers\PostsController@edit');
Route::put('/blog/{slug}', 'App\Http\Controllers\PostsController@update');
Route::delete('/blog/{slug}', 'App\Http\Controllers\PostsController@destroy');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

