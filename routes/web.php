<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/contact', 'contact')->name('contact');

Route::get('/blog/{category:slug}', [CategoryController::class, 'show'])
    ->name('category.show');

Route::get('/blog/{category:slug}/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');
