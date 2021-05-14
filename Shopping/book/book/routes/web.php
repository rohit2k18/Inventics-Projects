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
    return redirect()->route('Books');
});

Route::get('account/{name}','AccountController@index')->name('Account');
Route::get('login','AccountController@loginindex')->name('Login');
Route::get('signup','AccountController@signupindex')->name('SignUp');

Route::get('gallery','AccountController@galleryindex')->name('Gallery');
Route::get('faq','AccountController@faqindex')->name('FAQ');
Route::get('aboutus','AccountController@aboutusindex')->name('AboutUs');
Route::get('contactus','AccountController@contactusindex')->name('ContactUs');
Route::get('error','AccountController@errorindex')->name('Error');
Route::get('commingsoon','AccountController@commingsoonindex')->name('CommingSoon');

Route::get('emptycategory','AccountController@ecategoryindex')->name('EmptyCategory');
Route::get('category','AccountController@categoryindex')->name('Category');

Route::get('cart','AccountController@cartpageindex')->name('Cart');
Route::get('emptycart','AccountController@cartpageindex')->name('EmptyCart');
Route::get('checkout','AccountController@cehckoutindex')->name('Checkout');

Route::get('blogcategory','AccountController@blogcategoryindex')->name('BlogCategory');
Route::get('bloglist','AccountController@bloglistindex')->name('BlogList');
Route::get('blogpost','AccountController@blogpostindex')->name('BlogPost');

Route::get('product/{slug}','BooksController@productindex')->name('Product');
Route::get('/','BooksController@index')->name('Books');
Route::get('books/product/{name}','BooksController@product_cat_Index')->name('BookProduct');
Route::resource('books','BooksController');


// Route::get('orders','AccountController@accountorderhistoryindex')->name('orders');
// Route::get('wishlist','AccountController@accountwishlistindex')->name('wishlist');
// Route::get('address','AccountController@accountaddressindex')->name('address');
// Route::get('details','AccountController@accountdetailsindex')->name('details');