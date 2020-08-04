<?php

use Illuminate\Support\Facades\Route;

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

Route::get('about','PostController@about');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', 'UserController@index');
    Route::get("show/{id}",'UserController@show');
    Route::get('profile_edit/{id}','UserController@edit');
    Route::post('profile_edit','UserController@update');
    Route::get('create/{id}','PostController@create');
    Route::post('create','PostController@store');
    Route::get('post_edit/{id}','PostController@edit');
    Route::post('post_edit','PostController@update');
    Route::post('post_delete','PostController@delete');
});

Auth::routes();

