<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PhotoDayController;
use App\Models\PhotoDay;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $photoday = PhotoDay::with('usuario')->where('privada','=','false')->inRandomOrder()->first();
    return view('inicio', compact('photoday'));
})->name('inicio');

Route::get('registro', [UsuarioController::class, 'create'])->name('registro');

Route::resource('/photodays',PhotoDayController::class)->only(['index', 'show', 'create', 'store']);
Route::resource('/usuarios',UsuarioController::class)->only(['index', 'show','create', 'store','update']);;

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


