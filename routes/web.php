<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});

Route::get('/admin/search', [AdminController::class, 'search']);
