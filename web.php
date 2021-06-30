<?php

use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('form', [HomeController::class, 'form'])
    ->name('form');

Route::post('/', [HomeController::class, 'handle'])
    ->name('form.handle');
