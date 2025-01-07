<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::resource('/posts', PostController::class);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);
