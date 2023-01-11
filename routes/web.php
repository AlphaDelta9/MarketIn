<?php

use App\Http\Controllers\ProjectDetailController;
use App\Http\Controllers\ProjectHeaderController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [UserController::class,'create']);
Route::post('/register', [UserController::class,'store']);
Route::get('/login', [UserController::class,'index']);
Route::post('/login', [UserController::class,'login']);
Route::get('/logout', [UserController::class,'logout']);
Route::get('/profile/{user}', [UserController::class,'edit']);
Route::put('/profile/{user}', [UserController::class,'update']);
Route::get('/history/{user}/{type}', [UserController::class,'show']);

Route::get('/index', [ProjectHeaderController::class,'index']);
Route::get('/create', [ProjectHeaderController::class,'create']);
Route::post('/create', [ProjectHeaderController::class,'store']);
Route::get('/project/{projectHeader}', [ProjectHeaderController::class,'show']);
Route::post('/project/{id}', [ProjectDetailController::class,'store']);
Route::get('/project/{id}/{projectDetail}', [ProjectDetailController::class,'show']);
Route::get('/edit/{projectHeader}', [ProjectHeaderController::class,'edit']);
Route::put('/edit/{projectHeader}', [ProjectHeaderController::class,'update']);
