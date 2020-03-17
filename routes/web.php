<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ChatsController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('messages', 'ChatsController@fetchMessages');
    Route::post('messages', 'ChatsController@sendMessage');
});
