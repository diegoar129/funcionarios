<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\ExperienciaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect()->route('login.funcionario');
})->name('login');
Route::get('/login/funcionario', [AuthController::class, 'showFuncionarioLogin'])->name('login.funcionario');
Route::post('/login/funcionario', [AuthController::class, 'loginFuncionario'])->name('login.funcionario.submit');
Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Redirect singular to plural to avoid 404 on /funcionario
Route::redirect('/funcionario', '/funcionarios');

Route::middleware(['web'])->group(function () {
    Route::get('/admin/usuarios', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/usuarios/{id}/verificar', [AdminUserController::class, 'verify'])->name('admin.users.verify');
    Route::patch('/admin/usuarios/{id}/desverificar', [AdminUserController::class, 'unverify'])->name('admin.users.unverify');
    Route::delete('/admin/usuarios/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionarios.show');

    Route::get('/funcionarios/{id}/estudios/create', [EstudioController::class, 'create'])->name('estudios.create');
    Route::post('/funcionarios/{id}/estudios', [EstudioController::class, 'store'])->name('estudios.store');

    Route::get('/funcionarios/{id}/experiencias/create', [ExperienciaController::class, 'create'])->name('experiencias.create');
    Route::post('/funcionarios/{id}/experiencias', [ExperienciaController::class, 'store'])->name('experiencias.store');
});

