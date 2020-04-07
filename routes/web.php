<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

//Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ChatsController@index')->name('chats.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('messages', 'ChatsController@fetchMessages')->name('chats.fetch');
    Route::post('messages', 'ChatsController@sendMessage')->name('chats.send');
//});
