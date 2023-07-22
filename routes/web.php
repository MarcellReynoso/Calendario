<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComunicadoController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/evento', [EventoController::class, 'index'])->name('evento');
    Route::post('/evento/agregar', [EventoController::class, 'store']);
    Route::post('/evento/editar/{id}', [EventoController::class, 'edit']);
    Route::post('/evento/actualizar/{evento}', [EventoController::class, 'update']);
    Route::delete('/evento/borrar/{evento}', [EventoController::class, 'destroy']);
    Route::post('/evento/mostrar', [EventoController::class, 'show']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Rutas CRUD de usuarios
    Route::resource('users', UserController::class);

    // Rutas para comunicados de usuario
    Route::resource('comunicados', ComunicadoController::class);

    // Rutas para CRUD de comunicados
});

Auth::routes();


