<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\VueJs\IndexController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index')->middleware('auth');

                         /*  VueJs */
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* Все что после слэша можно добавлять */
//Route::get('/{page}',[IndexController::class,'index'])->where('page','.*');

Route::get('/',[IndexController::class,'index']);

                         /*   Admin panel auth */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/employees', EmployeeController::class);

});



