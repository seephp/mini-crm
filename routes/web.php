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

Route::get('/', 'BlogController@index')->name('home');

Route::get('/post/{post}', 'BlogController@showPost');

Auth::routes();

Route::resource('posts', 'PostController')->middleware('auth');

