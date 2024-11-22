<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::resource('libros', LibroController::class);
