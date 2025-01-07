<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PhotoDayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('registro', [UsuarioController::class, 'create'])->name('registro');

Route::resource('/photodays',PhotoDayController::class)->only(['index', 'create', 'store']);
Route::resource('/usuarios',UsuarioController::class)->only(['index', 'create', 'store','update']);;

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


