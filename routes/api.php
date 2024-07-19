<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/hello', function () {
//     return 'Привет, мир!';
// });

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('', 'index')->name('products.index');
    Route::get('{product}', 'show')->name('products.index');
});
Route::get('/db-test', [TestController::class, 'dbTest']);
