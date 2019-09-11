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


Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','PagesController@index');
Route::get('/test','PagesController@test');
/*Route::get('/posts','PostsController@index');
Route::post('/posts/store','PostsController@store');*/
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
