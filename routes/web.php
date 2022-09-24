<?php

use App\Http\Controllers\GranjaController;
use App\Http\Controllers\OvoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/usuarios', function () {
    Route::get('/listar', [UserController::class, 'index'])->name('listar.usuario');
    Route::get('/mostrar', [UserController::class, 'show'])->name('mostrar.usuario');
    Route::get('/criar', [UserController::class, 'create'])->name('form.criar.usuario');
    Route::post('/criar', [UserController::class, 'store'])->name('criar.usuario');
    Route::get('/editar', [UserController::class, 'edit'])->name('form.editar.usuario');
    Route::put('/editar', [UserController::class, 'update'])->name('editar.usuario');
    Route::delete('deletar', [UserController::class, 'destroy'])->name('deletar.usuario');
});

Route::prefix('/granjas', function () {
    Route::get('/listar', [GranjaController::class, 'index'])->name('listar.granja');
    Route::get('/mostrar', [GranjaController::class, 'show'])->name('mostrar.granja');
    Route::get('/criar', [GranjaController::class, 'create'])->name('form.criar.granja');
    Route::post('/criar', [GranjaController::class, 'store'])->name('criar.granja');
    Route::get('/editar', [GranjaController::class, 'edit'])->name('form.editar.granja');
    Route::put('/editar', [GranjaController::class, 'update'])->name('editar.granja');
    Route::delete('deletar', [GranjaController::class, 'destroy'])->name('deletar.granja');
});

Route::prefix('/setores', function () {
    Route::get('/listar', [SetorController::class, 'index'])->name('listar.setor');
    Route::get('/mostrar', [SetorController::class, 'show'])->name('mostrar.setor');
    Route::get('/criar', [SetorController::class, 'create'])->name('form.criar.setor');
    Route::post('/criar', [SetorController::class, 'store'])->name('criar.setor');
    Route::get('/editar', [SetorController::class, 'edit'])->name('form.editar.setor');
    Route::put('/editar', [SetorController::class, 'update'])->name('editar.setor');
    Route::delete('deletar', [SetorController::class, 'destroy'])->name('deletar.setor');
});

Route::prefix('/ovos', function () {
    Route::get('/listar', [OvoController::class, 'index'])->name('listar.ovo');
    Route::get('/mostrar', [OvoController::class, 'show'])->name('mostrar.ovo');
    Route::get('/criar', [OvoController::class, 'create'])->name('form.criar.ovo');
    Route::post('/criar', [OvoController::class, 'store'])->name('criar.ovo');
    Route::get('/editar', [OvoController::class, 'edit'])->name('form.editar.ovo');
    Route::put('/editar', [OvoController::class, 'update'])->name('editar.ovo');
    Route::delete('deletar', [OvoController::class, 'destroy'])->name('deletar.ovo');
});

require __DIR__.'/auth.php';
