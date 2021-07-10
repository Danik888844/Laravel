<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\DashboardController;

Route::get('/',DashboardController::class)
    ->name('dashboard');

Route::resource('categories',CategoryController::class);
Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);
