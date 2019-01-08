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

Auth::routes();
Route::pattern('id', '[0-9]+');


/// profile routes
Route::get('/', 'TopicController@index')->name('topic');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/update', 'ProfileController@update')->name('update');
Route::post('/updateprofile','ProfileController@updateProfile')->name('updateprofile');

///topic routes
Route::get('/topic_show/{id}', 'TopicController@show')->name('topic_show');
Route::get('/topic_search', 'TopicController@search')->name('top_search');

/// thread routes
Route::get('/mythread_show/{thread}', 'ThreadController@show')->name('thread_show');
Route::get('/mythreads', 'ThreadController@index')->name('mythreads');
Route::get('/addthread', 'ThreadController@create')->name('addthread');
Route::post('/newthread', 'ThreadController@store')->name('newthread');
Route::get('/edit_mythread/{thread}', 'ThreadController@edit')->name('edit_mythread');
Route::post('/updthread', 'ThreadController@update')->name('updthread');
Route::delete('/delete_mythread/{id}', 'ThreadController@destroy')->name('delete_mythread');

/// reply routes
Route::get('/newreply/{id}', 'ReplyController@newreply')->name('newreply');
Route::post('/createreply', 'ReplyController@create')->name('createreply');
Route::get('/thanks', 'ThanksController@index');


Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function()
{
Route::resource('admin', 'AdminController');
});