<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);

