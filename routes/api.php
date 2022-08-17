<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewCustomer;
use App\Http\Controllers\RegisterController;
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
Route::post('register', RegisterController::class);
Route::post('authenticate', AuthController::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('new-customer', [NewCustomer::class, 'store']);
    Route::get('new-customer/{id}', [NewCustomer::class, 'show']);
    Route::get('new-customer-by-id/{id}', [NewCustomer::class, 'showById']);
    Route::delete('new-customer/{id}', [NewCustomer::class, 'destroy']);
    Route::put('new-customer/{id}', [NewCustomer::class, 'update']);
});


