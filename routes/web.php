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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', 'HomeController@index');

// Hotspot
Route::get('/user', 'UserController@index');
Route::get('/hotspot/user/add', 'UserController@add');
Route::post('/hotspot/user/store', 'UserController@store');
Route::get('/hotspot/user/quick', 'UserController@quick');
Route::get('/hotspot/user/remove/{id}', 'UserController@destroy');
