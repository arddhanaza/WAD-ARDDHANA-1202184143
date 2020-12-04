<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/products',[\App\Http\Controllers\ProductsController::class,'index'])->name('show_products');
Route::get('/products/create',[\App\Http\Controllers\ProductsController::class,'create'])->name('create_product');
Route::post('/products/create/store',[\App\Http\Controllers\ProductsController::class,'store'])->name('store_product');
Route::get('/products/edit/{id}',[\App\Http\Controllers\ProductsController::class,'edit'])->name('edit_product');
Route::post('/products/edit/{id}',[\App\Http\Controllers\ProductsController::class,'update'])->name('save_edit_product');
Route::get('/products/delete/{id}',[\App\Http\Controllers\ProductsController::class,'destroy'])->name('delete_product');

Route::get('/orders',[\App\Http\Controllers\ProductsController::class,'show_product_to_order'])->name('show_products_to_order');
Route::get('/orders/history',[\App\Http\Controllers\OrdersController::class,'index'])->name('show_order_history');
Route::get('/orders/create/{id}',[\App\Http\Controllers\OrdersController::class,'create'])->name('create_order');
Route::post('/orders/create/{id}/store',[\App\Http\Controllers\OrdersController::class,'store'])->name('store_order');
