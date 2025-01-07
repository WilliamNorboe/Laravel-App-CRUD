<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProductController;
use App\Models\Flight;
use Illuminate\Support\Facades\Route;

use App\Models\Product; // does not need to be here

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', ['products'=>$products]);
}); 

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'updateProd'])->name('product.updateProd');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/view/{product}', [ProductController::class, "show"])->name("product.view");

Route::get('/flight', [FlightController::class, 'index'])->name("flight.index");
