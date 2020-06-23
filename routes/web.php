<?php

use App\User;
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
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});


Route::get('noti', function () {
    $user = auth()->user();
    $users  = User::all();
    $user->notify(new App\Notifications\InvoicePaid());
    // Notification::send($users, new App\Notifications\InvoicePaid());
    return "Notified!";
});



Route::get('job', 'ReportController@generate')->name('reports.generate');
