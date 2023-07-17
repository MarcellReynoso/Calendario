<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('evento.index');
}) -> middleware("auth");

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::delete('/evento/borrar/{evento}', [App\Http\Controllers\EventoController::class, 'destroy']);
Route::post('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


