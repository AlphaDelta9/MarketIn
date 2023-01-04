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
Route::get('/profile/{user}', 'UserController@edit');
Route::post('/profile/{user}', 'UserController@update');

Route::get('/index', 'ProjectHeaderController@index');
Route::get('/create', 'ProjectHeaderController@create');
Route::post('/create', 'ProjectHeaderController@store');
Route::get('/project/{projectHeader}', 'ProjectHeaderController@show');
Route::post('/project/{id}', 'ProjectDetailController@store');
Route::get('/project/{id}/{projectDetail}', 'ProjectDetailController@show');
Route::get('/edit/{projectHeader}', 'ProjectHeaderController@edit');
Route::post('/edit/{projectHeader}', 'ProjectHeaderController@update');
