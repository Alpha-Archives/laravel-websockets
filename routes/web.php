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



Route::get('test', function () {
    // try {
    //     event(new App\Events\StatusLiked('Someone'));
    //     return "Event has been sent!";
    // } catch (\Throwable $th) {
    //     dd($th);
    //     return "error kama zote!";
    //     // throw $th;
    // }
    event(new App\Events\StatusLiked('Someone'));
        return "Event has been sent!";
});


Route::get('job','ReportController@generate')->name('reports.generate');
