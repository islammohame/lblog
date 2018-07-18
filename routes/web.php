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


//This is Route Home==================>
Route::get('/','PagsController@index');
//====================================>

//This is About Page==========================================>
Route::get('/about','PagsController@about')->name('aboutPage');
//============================================================>

//This is Contact Page=========================>
Route::get('/contact','PagsController@contact');
Route::post('/dosend','PagsController@dosend');
//=============================================>

//This is Posts Page=======================>
Route::resource('/posts','PostsController');
//=========================================>

//This is Comments Page==========================================================>
Route::get('/comments/{slug}','CommentsController@store')->name('comments.store');
//===============================================================================>

//This is Authroutes Page===============================>
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//=======================================================>
