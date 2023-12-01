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
Route::prefix('clients')->group(function () {
    Route::get('/getInfo', [\App\Http\Controllers\ClientController::class, 'index']);
    Route::delete('/delete-clients/{id}', [\App\Http\Controllers\ClientController::class, 'delete']);
    Route::post('/create-clients', [\App\Http\Controllers\ClientController::class, 'store']);
    Route::put('/update-clients/{id}', [\App\Http\Controllers\ClientController::class, 'update']);
    Route::post('/restore-clients', [\App\Http\Controllers\ClientController::class, 'restore']);
});

Route::prefix('/products') -> group(function () {
    Route::get('/getInfo', [\App\Http\Controllers\ProductController::class, 'getInfo']);
    Route::delete('/delete-products/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
    Route::post('/create-products', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::post('/restore-products', [\App\Http\Controllers\ProductController::class, 'restore']);
    Route::put('/update-products/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
});

Route::prefix('/categories') -> group(function () {
    Route::get('/getInfo', [\App\Http\Controllers\CategoriesController::class, 'getInfo']);
    Route::delete('/delete-categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'delete']);
    Route::post('/create-categories', [\App\Http\Controllers\CategoriesController::class, 'store']);
    Route::post('/restore-categories', [\App\Http\Controllers\CategoriesController::class, 'restore']);
    Route::put('/update-categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'update']);
});

Route::prefix('/orders') -> group(function () {
    Route::get('/getInfo', [\App\Http\Controllers\OrdersController::class, 'getInfo']);
    Route::delete('/delete-orders/{id}', [\App\Http\Controllers\OrdersController::class, 'delete']);
    Route::post('/create-orders', [\App\Http\Controllers\OrdersController::class, 'store']);
    Route::post('/restore-orders', [\App\Http\Controllers\OrdersController::class, 'restore']);
    Route::put('/update-orders/{id}', [\App\Http\Controllers\OrdersController::class, 'update']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
