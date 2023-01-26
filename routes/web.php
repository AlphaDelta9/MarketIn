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

// Route::name('page.')->group(function () {
//     Route::get('', [PageController::class, 'home'])->name('home');

//     Route::name('forum.')->prefix('forum')->group(function () {
//         Route::get('/', [PageController::class, 'forum'])->name('index');
//         Route::get('buat', [PageController::class, 'forumCreate'])->name('create');
//     });

//     Route::middleware('user.auth')->group(function () {
//         Route::get('login', [PageController::class, 'login'])->name('login');
//         Route::get('register', [PageController::class, 'register'])->name('register');
//     });

//     Route::middleware('jwt.auth')->group(function () {
//         Route::get('riwayat', [PageController::class, 'history'])->name('history');
//         Route::get('profil', [PageController::class, 'profile'])->name('profile');
//     });

//     Route::name('project.')->prefix('project')->group(function () {
//         Route::get('/', [PageController::class, 'project'])->name('index');

//         Route::middleware(['jwt.auth', 'role.auth:pengguna'])->group(function () { // role: pengguna
//             Route::get('buat', [PageController::class, 'projectCreate'])->name('create');
//         });

//         Route::prefix('{id}')->group(function () {
//             Route::get('/', [PageController::class, 'projectDetail'])->name('detail');

// //            Route::name('forum.')->prefix('forum')->group(function () {
// //                Route::get('/', [PageController::class, 'forum'])->name('index');
// //                Route::get('buat', [PageController::class, 'forumCreate'])->name('create');
// //            });
//         });
//     });

//     Route::name('users.')->prefix('users')->group(function () {
//         Route::get('{id}', [PageController::class, 'userDetail'])->name('detail');
//     });
// });

// Route::prefix('system')->name('system.')->group(function () {
//     Route::prefix('auth')->name('auth.')->group(function () {
//         Route::middleware('user.auth')->group(function () {
//             Route::post('register', [AuthController::class, 'register'])->name('register');
//             Route::post('login', [AuthController::class, 'login'])->name('login');
//         });

//         Route::middleware('jwt.auth')->get('logout', [AuthController::class, 'logout'])->name('logout');
//     });

// //    Route::name('project.')->prefix('project')->group(function () {
// //        Route::name('forum.')->prefix('forum')->group(function () {
// //            Route::post('create', [ForumController::class, 'forumCreate'])->name('create');
// //        });
// //    });
// });

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

Route::post('/project/{id}', [ProjectDetailController::class,'store']);
Route::delete('/project/{projectDetail}', [ProjectDetailController::class,'destroy']);
Route::put('/accept/{projectDetail}', [ProjectDetailController::class,'update']);
Route::patch('/reject/{projectDetail}', [ProjectDetailController::class,'update']);
Route::post('/upload/{projectDetail}', [ProjectDetailController::class,'update']);
Route::get('/download/{projectDetail}/{name}', [ProjectDetailController::class,'file']);
Route::get('/assign/{projectDetail}', [ProjectDetailController::class,'show']);

Route::get('/shop', [ShopController::class, 'index'])->name('shop.all');
Route::get('/shop/by-hero', [ShopController::class,'index'])->name('shop.by-hero');
Route::get('/shop/by-hero/{hero}', [ShopController::class,'show'])->name('shop.by-hero.hero');

Route::get('/shop/by-category', [ShopByCategoryController::class,'index'])->name('shop.by-category');
Route::get('/shop/by-category/{category}', [ShopByCategoryController::class,'show'])->name('shop.by-category.category');

Route::get('/shop/by-benefit', [ShopByBenefitController::class,'index'])->name('shop.by-benefit');
Route::get('/shop/by-benefit/{benefit}', [ShopByBenefitController::class,'show'])->name('shop.by-benefit.benefit');

Route::get('/product/{slug}', [ShopController::class,'show'])->name('shop.show');

Route::get('/journal', 'JournalController@index')->name('journal');
Route::get('/journal/{slug}', 'JournalController@show')->name('journal.show');


Route::get('/quiz', function () {
    return view('front.quiz.index');
})->name('quiz');
Route::post('/quiz/start', [QuizController::class,'start'])->name('quiz.start');

Route::post('/subscribe/popup', [HomepageController::class,'popup'])->name('subscribe.popup');

Route::group(['middleware' => ['auth']], function(){
    // Route::post('/change-password', [ChangePasswordController::class,'update'])->name('change-password');
    // Route::get('/logout', [LoginController::class,'logout']);
    // Route::get('/home', function(){
    //     return redirect('/admin/journal');
    // })->name('home');
    // Route::get('/register', function(){
    //     return redirect('/login');
    // })->name('register');
    // Route::get('/password/reset', function(){
    //     return redirect('/login');
    // })->name('password.request');
});

Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function(){
    Route::get('/journal', 'Admin\JournalController@index')->name('admin.journal');
    Route::get('/journal/indexSSP', 'Admin\JournalController@indexSSP')->name('admin.journal.all');
    Route::get('/journal/create', 'Admin\JournalController@create')->name('admin.journal.create');
    Route::post('/journal/store', 'Admin\JournalController@store')->name('admin.journal.store');
    Route::get('/journal/{slug}/edit', 'Admin\JournalController@edit')->name('admin.journal.edit');
    Route::post('/journal/{slug}/update', 'Admin\JournalController@update')->name('admin.journal.update');
    Route::get('/journal/{slug}/delete', 'Admin\JournalController@destroy')->name('admin.journal.destroy');
    Route::post('/journal/image', 'Admin\JournalController@image')->name('admin.journal.image');

    // Route::get('/product', 'Admin\ProductController@index')->name('admin.product');
    // Route::get('/product/indexSSP', 'Admin\ProductController@indexSSP')->name('admin.product.all');
    // Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create');
    // Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
    // Route::get('/product/{slug}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
    // Route::post('/product/{slug}/update', 'Admin\ProductController@update')->name('admin.product.update');
    // Route::get('/product/{slug}/delete', 'Admin\ProductController@destroy')->name('admin.product.destroy');
});
