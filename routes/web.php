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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('/signup', 'UserController@PostSignUp')->name('signup');
Route::post('/signin', 'UserController@PostSignIn')->name('signin');
Route::get('/dashboard', 'PostController@GetDashboard')->name('dashboard')->middleware('auth');
Route::post('/createpost', 'PostController@postCreatePost')->name('post.create')->middleware('auth');
Route::get('/delete-post/{post_id}', 'PostController@getDeletePost')->name('post.delete')->middleware('auth');
Route::get('/logout', 'UserController@getLogout')->name('logout');
Route::get('/account', 'UserController@getAccount')->name('account');
Route::post('/updateaccount', 'UserController@postSaveAccount')->name('account.save');
Route::get('/userimage/{filename}', 'UserController@getUserImage')->name('account.image');