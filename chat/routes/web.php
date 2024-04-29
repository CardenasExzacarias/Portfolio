<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Log
Route::get('/', 'App\Http\Controllers\UserController@index');

Route::get('/login', 'App\Http\Controllers\UserController@login')
    ->middleware(['login', 'verifyUser']);

Route::post('/register', 'App\Http\Controllers\UserController@registerUser')
    ->middleware(['register', 'verifyRegister']);

//Send Messages
Route::post('/home/update', 'App\Http\Controllers\MessagesController@update')
    ->middleware('verifySession');
Route::post('/home/send', 'App\Http\Controllers\MessagesController@send')
    ->middleware('verifySession');

Route::get('/logout', 'App\Http\Controllers\UserController@logout')
    ->middleware('verifySession');
Route::get('/register', 'App\Http\Controllers\UserController@register');

//Notification related
Route::get('/home/notification', 'App\Http\Controllers\NotificationController@get')
    ->middleware('verifySession');
Route::delete('/home/seen/{post}', 'App\Http\Controllers\NotificationController@seen')
    ->middleware('verifySession');

//load chat
Route::get('/home', 'App\Http\Controllers\ChatController@index')
    ->middleware('verifySession');
Route::get('/home/contacts', 'App\Http\Controllers\ChatController@contacts')
    ->middleware('verifySession');
Route::get('/home/{id}', 'App\Http\Controllers\MessagesController@get')
    ->middleware('verifySession');
Route::get('/home/unseen/{id}', 'App\Http\Controllers\MessagesController@unseen')
    ->middleware('verifySession');

//user related
Route::get('/search', 'App\Http\Controllers\UserController@search')
    ->middleware('verifySession');
Route::get('/found/{id}', 'App\Http\Controllers\MessagesController@get')
    ->middleware('verifySession');

//friends related
Route::post('/add', 'App\Http\Controllers\FriendController@set')
    ->middleware('verifySession');

Route::post('/delete', 'App\Http\Controllers\FriendController@set')
    ->middleware('verifySession');
