<?php

use App\Models\ccdCarShop;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\CcdCarShopController;
use \App\Http\Controllers\CommentController;
use Illuminate\Validation\Rule;

Route::redirect('/','ccd_car_shops')
    ->name('index');

Route::resource('ccd_car_shops',CcdCarShopController::class)
    ->except('index','show')
    ->middleware('auth');

Route::resource('ccd_car_shops',CcdCarShopController::class)
    ->only('index','show');

Route::prefix('ccd_car_shops/{ccd_car_shop}')
    ->middleware('auth')
->group(function(){

    Route::resource('comments',CommentController::class)
    ->only('store');

});

Route::resource('comments',CommentController::class)
    ->middleware('auth')
    ->only('destroy');

Route::resource('users',\App\Http\Controllers\UserController::class)
    ->only('show');


