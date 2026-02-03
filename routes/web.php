<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show')->where('id', '[0-9]+');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
/* Route::get('/product/{product}', function(Product $product) {
    return $product->name;
}); */



Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

Route::resource('categories', CategoryController::class);

Route::post('/logout', [PageController::class, 'logout'])->name('logout');
Route::post('/login', [PageController::class, 'login'])->name('login');
Route::post('/register', [PageController::class, 'register'])->name('register');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');





Route::fallback(function () {
    return 'Page not found! <meta http-equiv="refresh" content="5;url=/" />Redirecting to <a href="/">home</a>.';
});