<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PhotoDayController;


Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Rutas sense autentificació
Route::get('/login', [UsuarioController::class, 'loginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
Route::get('/registrarse', [UsuarioController::class, 'registerForm'])->name('registrarse');
Route::post('/registrarse', [UsuarioController::class, 'store'])->name('registrarse.store');

// Rutes protegides
Route::middleware('auth')->group(function () {
    //usuario autenticat
    Route::get('/bienvenidousuario', [UsuarioController::class, 'bienvenidoUsuario'])->name('bienvenidousuario');

    // admin
    Route::middleware('admin')->group(function () {
        Route::get('/admin/bienvenido', [UsuarioController::class, 'bienvenidoAdmin'])->name('admin.bienvenido');
        Route::get('/admin/listadousuarios', [UsuarioController::class, 'index'])->name('admin.listadousuarios');
    });

    // Fotos
    Route::resource('photodays', PhotoDayController::class);/*->only(['index', 'show]); ->except(['edit', 'destroy']) Per a dir quines rutes mostrar o quines NO mostrar*/

    /*
    Route::get('/photodays', [PhotoDayController::class, 'index'])->name('photodays.index');
    Route::get('/photodays/create', [PhotoDayController::class, 'create'])->name('photodays.create');
    Route::post('/photodays', [PhotoDayController::class, 'store'])->name('photodays.store');
    Route::get('/photodays/{photoDay}', [PhotoDayController::class, 'show'])->name('photodays.show');
    Route::delete('/photodays/{photoDay}', [PhotoDayController::class, 'destroy'])->name('photodays.destroy');
    */
});
