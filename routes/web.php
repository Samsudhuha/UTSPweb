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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/login', 'Auth\LoginController@login')->middleware('checkrole');
Route::get('/admin', 'BookController@index');
Route::get('/user', 'ReviewController@index');
Route::get('/user/review/{id}', 'ReviewController@create');
Route::get('/user/edit/{id}', 'ReviewController@edit');
Route::get('/user/delete/{id}', 'ReviewController@destroy');
Route::post('/review-book', 'ReviewController@store')->name('review.store');
Route::post('/update-review', 'ReviewController@update')->name('review.update');

Route::get('/review-book/{id}', 'ReviewController@view');
Route::get('/search-book', 'ReviewController@show');
Route::get('/home', 'BookController@index')->name('home');
Route::post('/upload-book', 'BookController@store')->name('book.store');
Route::post('/update-book', 'BookController@update')->name('book.update');
Route::get('/create-book', 'BookController@create')->name('book.create');
Route::get('/deletebook/{id}', 'BookController@destroy');
Route::get('/editbook/{id}', 'BookController@edit');
Route::get('/book/{id}', 'BookController@show');
