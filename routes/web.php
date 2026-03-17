<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\ExperienciaController;

Route::get('/', function () {
    return view('welcome');
});

// Redirect singular to plural to avoid 404 on /funcionario
Route::redirect('/funcionario', '/funcionarios');

Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionarios.show');

Route::get('/funcionarios/{id}/estudios/create', [EstudioController::class, 'create'])->name('estudios.create');
Route::post('/funcionarios/{id}/estudios', [EstudioController::class, 'store'])->name('estudios.store');

Route::get('/funcionarios/{id}/experiencias/create', [ExperienciaController::class, 'create'])->name('experiencias.create');
Route::post('/funcionarios/{id}/experiencias', [ExperienciaController::class, 'store'])->name('experiencias.store');

