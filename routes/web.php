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
});
Route::resource('task', 'Task\TaskController')->middleware('auth');

Route::group(['namespace' => 'Task'], function () {
    Route::get('register', ['uses' => 'UserController@index', 'as' => 'register']);

    Route::post('register', ['uses' => 'UserController@store', 'as' => 'store']);
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', ['uses' => 'AuthController@login', 'as' => 'login']);

    Route::post('login', ['uses' => 'AuthController@showLogin', 'as' => 'showLogin']);

    Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);
});
