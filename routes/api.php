<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Visitor\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*  Passport  */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/posts', [AuthController::class, 'getPostList']);

/*  Vue.js  */
Route::group(['namespace' => 'Visitor', 'prefix' => 'people'], function () {
    Route::post('/', [StoreController::class, 'create']);
    Route::get('/', [StoreController::class, 'index']);
    Route::get('/{visitor}', [StoreController::class, 'show']);
    Route::patch('/{visitor}', [StoreController::class, 'update']);
    Route::delete('/{visitor}', [StoreController::class, 'delete']);
});
