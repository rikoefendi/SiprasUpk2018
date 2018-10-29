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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/inbox', 'InboxController@index');
// Route::get('/inbox/create', 'InboxController@create');
// Route::post('/inbox', 'InboxController@store');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/inbox',  'InboxController@index')->name('inbox.index');
//
//     // Route::get('user/profile', function () {
//     //     // Uses first & second Middleware
//     // });
// });

Route::get('/inbox/search', 'InboxController@search')->middleware('auth');
Route::get('/inbox/{inbox}/print', 'InboxController@print')->middleware('auth');
Route::resource('inbox', 'InboxController')->middleware('auth');
Route::get('/outbox/search', 'OutboxController@search')->middleware('auth');
Route::resource('outbox', 'OutboxController')->middleware('auth');
Route::get('/disposisi/{id_surat}/show', 'DisposisiController@show')->middleware('auth');
Route::get('/disposisi/{id}/create', 'DisposisiController@create')->middleware('auth');
Route::post('/disposisi/{id}', 'DisposisiController@store')->middleware('auth');
Route::resource('disposisi', 'DisposisiController')->middleware('auth');
//

Route::get('users/verify/{id}/{token}', 'UserController@verify')->name('signup.verify');
Route::get('users/{id}/show', 'UserController@show')->name('signup.verify');
Route::get('users/{id}/password', 'UserController@editPassword')->name('signup.verify');
Route::put('users/{id}/password', 'UserController@updatePassword')->name('signup.verify');
Route::resource('users', 'UserController')->middleware('auth');
