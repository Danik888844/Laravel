<?php

use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CcdCarShopController;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::resource('posts', PostController::class);
Route::resource('ccd_car_shops', CcdCarShopController::class);
