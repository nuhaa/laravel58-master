<?php
Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
});
