<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'inicio'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Docentes
Route::get('/docentes', [App\Http\Controllers\DocenteController::class, 'list'])->middleware(['auth'])
->name('admin_docentes');

Route::get('/docente/crear', [App\Http\Controllers\DocenteController::class, 'form_crear'])->middleware(['auth'])
->name('form_crear_docente');
Route::post('/crear_docente', [App\Http\Controllers\DocenteController::class, 'crear'])->middleware(['auth'])
->name('crear_docente');

Route::get('/docente/ver/{docente}', [App\Http\Controllers\DocenteController::class, 'read'])->middleware(['auth'])
->name('read_docente');

Route::get('/docente/actualizar/{docente}', [App\Http\Controllers\DocenteController::class, 'form_actualizar'])->middleware(['auth'])
->name('form_actualizar_docente');
Route::post('/actualizar_docente/{docente}', [App\Http\Controllers\DocenteController::class, 'actualizar'])->middleware(['auth'])
->name('actualizar_docente');

Route::get('/docente/inactivar/{docente}', [App\Http\Controllers\DocenteController::class, 'inactivar'])->middleware(['auth'])
->name('inactivar_docente');


// Horarios
Route::get('/horario/crear', [App\Http\Controllers\HorarioController::class, 'form_crear'])->middleware(['auth'])
->name('form_crear_horario');
Route::post('/crear_horario', [App\Http\Controllers\HorarioController::class, 'crear'])->middleware(['auth'])
->name('crear_horario');

Route::get('/horario/{id}', [App\Http\Controllers\HorarioController::class, 'read_horario'])->middleware(['auth'])
->name('ver_horario');
