<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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


// Private ROUTE
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class,'destroy']);

// categories
Route::middleware('auth:sanctum')->post('categories/create', [CategoryController::class,'store']);
Route::middleware('auth:sanctum')->get('categories/{category}', [CategoryController::class,'show']);
Route::middleware('auth:sanctum')->put('categories/{category}', [CategoryController::class,'update']);
Route::middleware('auth:sanctum')->delete('categories/{category}', [CategoryController::class,'destroy']);




// PUBLIC ROUTE

Route::post('register',[RegisteredUserController::class,'store']);
Route::post('login',[AuthenticatedSessionController::class,'store']);

Route::get('categories',[CategoryController::class,'index']);
