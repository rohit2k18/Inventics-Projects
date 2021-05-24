<?php

//test routes
Route::get('account_login_test','Auth\LoginController@getThings')->name('test1');
Route::get('account_login_test2','Auth\LoginController@readDataTest')->name('test2');

Route::get('account/{name}','AccountController@index')->name('Account');
// Route::get('account_login','AccountController@loginindex')->name('Login');
Route::get('account_login','Auth\LoginController@getThings')->name('Login');
Route::get('account_signup','Auth\RegisterController@signupindex')->name('SignUp');
// Route::post('account_signup_createAccount','AccountController@createNewAccount')->name('SignUpStore');
Route::post('account_signup_createAccount','Auth\RegisterController@createNewAccount')->name('SignUpStore');