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

Route::get('account/{name}','AccountController@index')->name('account');

Route::get('login','AccountController@loginindex')->name('login');
Route::get('signup','AccountController@signupindex')->name('signup');

// Route::get('orders','AccountController@accountorderhistoryindex')->name('orders');
// Route::get('wishlist','AccountController@accountwishlistindex')->name('wishlist');
// Route::get('address','AccountController@accountaddressindex')->name('address');
// Route::get('details','AccountController@accountdetailsindex')->name('details');

Route::get('product','BooksController@productindex')->name('product');
Route::resource('books','BooksController');
