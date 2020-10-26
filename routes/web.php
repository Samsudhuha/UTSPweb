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

Route::get('/search-book', 'PeminjamController@index');
Route::get('/borrow-book', 'PeminjamController@borrow');
Route::get('/list-borrow-book', 'PeminjamController@list');
Route::get('/home', 'BookController@index')->name('home');
Route::post('/upload-book', 'BookController@store')->name('book.store');
Route::post('/update-book', 'BookController@update')->name('book.update');
Route::get('/create-book', 'BookController@create')->name('book.create');
Route::post('/form-borrow-book', 'PeminjamController@store')->name('peminjam.store');
Route::get('/deletebook/{id}', 'BookController@destroy');
Route::get('/editbook/{id}', 'BookController@edit');
Route::get('/borrowbook/{id}', 'PeminjamController@borrowform');
