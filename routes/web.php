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

// Route::get('/', function () {
//     return view('welcome');
// });

/*******************************/

Route::get('/', 'HomeController@index');
Route::get('/contacts', 'HomeController@contacts');
Route::post('/contacts', 'HomeController@getContacts');
Route::get('/product/{id}', 'HomeController@product');
Route::get('/product/{id}/review/{id_review}', 'HomeController@productReview');
// Route::get('/news/1', 'HomeController@getContacts');

//два варианта или метод any
// Route::match(['GET', 'POST'], '/contacts', 'HomeController@getContacts')
// Route::any('/contacts', 'HomeController@getContacts')

Route::resource('/category', 'CotegoryController');
Route::resource('/news', 'NewsController');