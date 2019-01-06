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

//Route::get('/', function () {
 //  return view('welcome');
//});

Route::get('/', 'TopicController@index')->name('topic');


Auth::routes();
Route::pattern('id', '[0-9]+');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/update', 'ProfileController@update')->name('update');
Route::post('/updateprofile','ProfileController@updateProfile')->name('updateprofile');
Route::get('/topic_show/{id}', 'TopicController@show')->('topic_show');