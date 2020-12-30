<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

Route::get('/', [App\Http\Controllers\ChatsController::class,'index']);
Route::get('messages', [App\Http\Controllers\ChatsController::class,'fetchMessages']);
Route::post('messages', [App\Http\Controllers\ChatsController::class,'sendMessage']);

});
