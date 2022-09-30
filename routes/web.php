<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\GranjaController;
use App\Http\Controllers\OvoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisaoBDController;
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

Route::prefix('/usuarios')->group(function () {
    Route::view('/opcoes', 'usuarios.opcoes')->name('opcoes.usuario');
    Route::get('/listar', [UserController::class, 'index'])->name('listar.usuario');
    Route::get('/mostrar/{id}', [UserController::class, 'show'])->name('mostrar.usuario');
    Route::get('/criar', [UserController::class, 'create'])->name('form.criar.usuario');
    Route::post('/criar', [UserController::class, 'store'])->name('criar.usuario');
    Route::get('/editar/{id}', [UserController::class, 'edit'])->name('form.editar.usuario');
    Route::put('/editar/{id}', [UserController::class, 'update'])->name('editar.usuario');
    Route::delete('deletar/{id}', [UserController::class, 'destroy'])->name('deletar.usuario');
});

Route::prefix('/granjas')->group(function () {
    Route::view('/opcoes', 'granjas.opcoes')->name('opcoes.granja');
    Route::get('/listar', [GranjaController::class, 'index'])->name('listar.granja');
    Route::get('/mostrar/{id}', [GranjaController::class, 'show'])->name('mostrar.granja');
    Route::get('/criar', [GranjaController::class, 'create'])->name('form.criar.granja');
    Route::post('/criar', [GranjaController::class, 'store'])->name('criar.granja');
    Route::get('/editar/{id}', [GranjaController::class, 'edit'])->name('form.editar.granja');
    Route::put('/editar/{id}', [GranjaController::class, 'update'])->name('editar.granja');
    Route::delete('deletar/{id}', [GranjaController::class, 'destroy'])->name('deletar.granja');
});

Route::prefix('/setores')->group(function () {
    Route::view('/opcoes', 'setores.opcoes')->name('opcoes.setor');
    Route::get('/listar', [SetorController::class, 'index'])->name('listar.setor');
    Route::get('/mostrar/{id}', [SetorController::class, 'show'])->name('mostrar.setor');
    Route::get('/criar', [SetorController::class, 'create'])->name('form.criar.setor');
    Route::post('/criar', [SetorController::class, 'store'])->name('criar.setor');
    Route::get('/editar/{id}', [SetorController::class, 'edit'])->name('form.editar.setor');
    Route::put('/editar/{id}', [SetorController::class, 'update'])->name('editar.setor');
    Route::delete('/deletar/{id}', [SetorController::class, 'destroy'])->name('deletar.setor');
});

Route::prefix('/ovos')->group(function () {
    Route::view('/opcoes', 'ovos.opcoes')->name('opcoes.ovo');
    Route::get('/listar', [OvoController::class, 'index'])->name('listar.ovo');
    Route::get('/mostrar/{id}', [OvoController::class, 'show'])->name('mostrar.ovo');
    Route::get('/criar', [OvoController::class, 'create'])->name('form.criar.ovo');
    Route::post('/criar', [OvoController::class, 'store'])->name('criar.ovo');
    Route::get('/editar/{id}', [OvoController::class, 'edit'])->name('form.editar.ovo');
    Route::put('/editar/{id}', [OvoController::class, 'update'])->name('editar.ovo');
    Route::delete('deletar/{id}', [OvoController::class, 'destroy'])->name('deletar.ovo');
});

Route::prefix('/consultas')->group(function () {
    Route::get('', [ConsultasController::class, 'mostrarConsultas'])->name('mostrar.consulta');
});

Route::prefix('/visoes')->group(function () {
    Route::get('', [VisaoBDController::class, 'mostrarVisoes'])->name('mostrar.visao');
    Route::get('/granja', [VisaoBDController::class, 'carregarVisaoGranja'])->name('granja.visao');
    Route::get('/setor', [VisaoBDController::class, 'carregarVisaoSetor'])->name('setor.visao');
});

require __DIR__.'/auth.php';
