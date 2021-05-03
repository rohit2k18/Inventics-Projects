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
    //return view('welcome');
    return redirect()->route('books');
});

Route::get('account/{name}','AccountController@index')->name('account');

Route::get('login','AccountController@loginindex')->name('login');
Route::get('signup','AccountController@signupindex')->name('signup');
Route::get('gallery','AccountController@galleryindex')->name('gallery');
Route::get('faq','AccountController@faqindex')->name('faq');
Route::get('aboutus','AccountController@aboutusindex')->name('aboutus');
Route::get('contactus','AccountController@contactusindex')->name('contactus');
Route::get('error','AccountController@errorindex')->name('error');
Route::get('commingsoon','AccountController@commingsoonindex')->name('commingsoon');
Route::get('emptycategory','AccountController@ecategoryindex')->name('ecategory');
Route::get('category','AccountController@categoryindex')->name('category');

// Route::get('orders','AccountController@accountorderhistoryindex')->name('orders');
// Route::get('wishlist','AccountController@accountwishlistindex')->name('wishlist');
// Route::get('address','AccountController@accountaddressindex')->name('address');
// Route::get('details','AccountController@accountdetailsindex')->name('details');

Route::get('product','BooksController@productindex')->name('product');
Route::get('books','BooksController@index')->name('books');
Route::resource('book','BooksController');
