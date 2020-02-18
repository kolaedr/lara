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

Route::get('/', 'HomeControllerNew@index');
Route::get('/contacts', 'HomeController@contacts');
Route::get('/profile', 'HomeController@profile');
Route::post('/contacts', 'HomeController@getContacts');
Route::get('/product/{id}', 'HomeController@product');
Route::get('/product/{id}/review/{id_review}', 'HomeController@productReview');
// Route::get('/news/1', 'HomeController@getContacts');

//два варианта или метод any
// Route::match(['GET', 'POST'], '/contacts', 'HomeController@getContacts')
// Route::any('/contacts', 'HomeController@getContacts')

// <<<<<<< HEAD
Auth::routes();  //Общий для работы логина

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');
// =======
Route::resource('/category', 'CotegoryController');
Route::resource('/news', 'NewsController');
Route::resource('/comment', 'CommentController');
// >>>>>>> b09704632d4d2e5e8240c5870f8e88b3ad9897fe
