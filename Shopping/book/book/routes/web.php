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

Route::get('ajax',function() {
    return view('message');
 });

Route::get('account/{name}','AccountController@index')->name('Account');
Route::get('loginn','AccountController@loginindex')->name('Login');
Route::get('signupp','AccountController@signupindex')->name('SignUp');


Route::post('add_to_cart','CartController@addToCart')->name('addtocart');
Route::post('add_to_cart_post_try','CartController@addToPostTest')->name('addtocartposttry');
Route::get('add_to_cart1/{id}','CartController@addToGetTest')->name('addtocart1');

include('cartroute.php');



Route::get('gallery','AccountController@galleryindex')->name('Gallery');
Route::get('faq','AccountController@faqindex')->name('FAQ');
Route::get('aboutus','AccountController@aboutusindex')->name('AboutUs');
Route::get('contactus','AccountController@contactusindex')->name('ContactUs');
Route::get('error','AccountController@errorindex')->name('Error');
Route::get('commingsoon','AccountController@commingsoonindex')->name('CommingSoon');

Route::get('emptycategory','CategoryController@ecategoryindex')->name('EmptyCategory');
Route::get('category/{slug}','CategoryController@index')->name('Category');

Route::get('cart','CartController@index')->name('Cart');
Route::get('emptycart','CartController@emptycartindex')->name('EmptyCart');
Route::get('checkout','CartController@checkoutcartindex')->name('Checkout');

Route::get('blogcategory','BlogController@blogcategoryindex')->name('BlogCategory');
Route::get('bloglist','BlogController@bloglistindex')->name('BlogList');
Route::get('blogpost/{slug}','BlogController@blogpostindex')->name('BlogPost');

Route::get('product/{catgroup}/{catname}/{slug}','ProductController@productindex')->name('Product');
Route::get('/','BooksController@index')->name('Books');
Route::get('books/product/{name}/{cat}/{sub}','BooksController@product_cat_Index')->name('BookProduct');
Route::resource('books','BooksController');


// Route::get('orders','AccountController@accountorderhistoryindex')->name('orders');
// Route::get('wishlist','AccountController@accountwishlistindex')->name('wishlist');
// Route::get('address','AccountController@accountaddressindex')->name('address');
// Route::get('details','AccountController@accountdetailsindex')->name('details');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
