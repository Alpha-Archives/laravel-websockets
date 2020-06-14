<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::view('/', 'welcome');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/chats', 'ChatsController@index')->name('chats.index');


    Route::get('messages', 'ChatsController@fetchMessages')->name('chats.fetch');
    Route::post('messages', 'ChatsController@sendMessage')->name('chats.send');
});
