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
    return view('welcome');
});

Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');
Route::get('/login', 'UserController@index');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::get('/index', 'ProjectHeaderController@index');
Route::get('/create', 'ProjectHeaderController@create');
Route::post('/create', 'ProjectHeaderController@store');
Route::get('/show/{projectHeader}', 'UserController@show');
