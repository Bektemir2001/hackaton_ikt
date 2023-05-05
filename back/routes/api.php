<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/register', [App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('/auth', App\Http\Controllers\API\AuthController::class);
Route::post('/respond', App\Http\Controllers\API\User\RespondController::class);
Route::post('/update/like', [App\Http\Controllers\API\User\LikeRespondController::class, 'updateLike']);
Route::post('/set/like', [App\Http\Controllers\API\User\LikeRespondController::class, 'like']);

Route::group(['prefix' => 'user'], function (){
    Route::get('/get/points', [App\Http\Controllers\API\User\IndexController::class, 'getBadPoints']);
    Route::get('/get/point/{point}', [App\Http\Controllers\API\User\IndexController::class, 'getPoint']);
});


Route::post('/define/address', App\Http\Controllers\API\GetAddressController::class);
