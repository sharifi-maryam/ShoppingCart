<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReportController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart/add', [ShoppingCartController::class, 'store']); // Add new Item into shopping cart
    Route::get('/cart/show', [ShoppingCartController::class, 'show']); // show user's items
    Route::post('/cart/remove', [ShoppingCartController::class, 'destroy']); // remove item from shopping carT

    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/product/report', [ProductReportController::class, 'index']);

});

Route::get('/auth', function () {
    dd(User::whereEmail('kaitlin97@example.org')->first()->createToken('maryam'));
});
