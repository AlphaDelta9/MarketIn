<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectDetailController;
use App\Http\Controllers\ProjectHeaderController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ShopByBenefitController;
use App\Http\Controllers\ShopByCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomepageController::class,'landing']);
Route::get('/home', [HomepageController::class,'index']);

Route::get('/register/{role?}', [UserController::class,'create']);
Route::post('/register/{role?}', [UserController::class,'store']);
Route::get('/login', [UserController::class,'index']);
Route::post('/login', [UserController::class,'login']);
Route::get('/logout', [UserController::class,'logout']);
Route::get('/profile/{user?}', [UserController::class,'edit']);
Route::put('/profile/{user?}', [UserController::class,'update']);
Route::get('/history/{user?}', [UserController::class,'show']);

Route::get('/create/{type}', [ProjectHeaderController::class,'create']);
Route::post('/create/{type}', [ProjectHeaderController::class,'store']);
Route::get('/project/{projectHeader}', [ProjectHeaderController::class,'show'])->withTrashed();
Route::get('/edit/{projectHeader}', [ProjectHeaderController::class,'edit']);
Route::put('/edit/{projectHeader}', [ProjectHeaderController::class,'update']);
Route::post('/download/{projectHeader}/{name}', [ProjectHeaderController::class,'file']);
Route::get('/search', [ProjectHeaderController::class,'index']);
Route::get('/iklanin', [ProjectHeaderController::class,'index']);

Route::post('/project/{id}', [ProjectDetailController::class,'store']);
Route::delete('/project/{projectDetail}', [ProjectDetailController::class,'destroy']);
Route::put('/accept/{projectDetail}', [ProjectDetailController::class,'update']);
Route::patch('/reject/{projectDetail}', [ProjectDetailController::class,'destroy']);
Route::post('/upload/{projectDetail}', [ProjectDetailController::class,'update']);
Route::get('/download/{projectDetail}/{name?}', [ProjectDetailController::class,'file']);
Route::get('/assign/{projectDetail}', [ProjectDetailController::class,'show']);
Route::get('/detail/{projectDetail}', [ProjectDetailController::class,'show']);
Route::post('/complete/{projectDetail}', [ProjectDetailController::class,'finalize']);

Route::get('/pay/{projectDetail}', [ProjectDetailController::class,'finalize']);
Route::patch('/pay/{projectDetail}', [ProjectDetailController::class,'update']);
Route::get('/verify', [ProjectDetailController::class,'index']);
Route::get('/verify/{projectDetail}/{name?}', [ProjectDetailController::class,'receipt']);
Route::patch('/verify/{projectDetail}', [ProjectDetailController::class,'finalize']);
Route::delete('/verify/{projectDetail}', [ProjectDetailController::class,'finalize']);
Route::get('/complete', [ProjectDetailController::class,'create']);
