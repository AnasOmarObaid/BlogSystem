<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->middleware(['auth', 'can:admin'])->name('admin.')->group(function () {

    // route for welcome 
    Route::get('/', WelcomeController::class)->name('welcome');

    // route for posts
    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
        Route::get('/{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/{post:slug}/update', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}/delete', [PostController::class, 'destroy'])->name('destroy');
    });
});
