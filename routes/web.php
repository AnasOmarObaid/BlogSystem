<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscribeController;

// route for post
Route::name('post.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('post/{post:slug}', [PostController::class, 'show'])->name('show');
});

// route for category
Route::name('category.')->group(function () {
    Route::get('/category/{category:name}', [CategoryController::class, 'show'])->name('show');
});

// route for register
Route::middleware('guest')->group(function () {
    Route::resource('/register', RegisterController::class)->only(['create', 'store']);
});

// route for comment
Route::name('comment.')->group(function () {
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('store');
});

//route to logout
Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');

// route to login
Route::middleware('guest')->group(function () {
    Route::resource('/login', LoginController::class)->only(['create', 'store']);
});

// route for subscribe
Route::name('subscribe.')->group(function () {
    Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');
    Route::get('/subscribe/lists', [SubscribeController::class, 'lists'])->name('lists');
});
