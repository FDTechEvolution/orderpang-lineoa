<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API V1
use App\Http\Controllers\Api\V1\MessageServiceController as MessageService;

// API V2
use App\Http\Controllers\Api\V2\UserServiceController as UserService;
use App\Http\Controllers\Api\V2\OrderServiceController as OrderService;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->group(function () {
    Route::post('message', [MessageService::class, 'getMessage']);
});

Route::prefix('v2')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('{orgid}/{status?}', [UserService::class, 'getUserByStatus']);
        Route::get('line/{line_userid}', [UserService::class, 'getUserBylineUserId']);

        Route::post('update', [UserService::class, 'updateUser']);
    });

    Route::prefix('order')->group(function () {
        Route::get('{orgid}/{status?}', [OrderService::class, 'getOrder']);
        // Route::get('orgid/{orgid}', [OrderService::Class, 'getOrderByOrgid']);

        Route::post('update', [OrderService::class, 'updateOrder']);
    });
});