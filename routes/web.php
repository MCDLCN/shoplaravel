<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return 'Hello Laravel!';
});
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);