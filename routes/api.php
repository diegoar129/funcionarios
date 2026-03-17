<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FuncionarioApiController;
use App\Http\Controllers\Api\EstudioApiController;
use App\Http\Controllers\Api\ExperienciaApiController;

Route::get('/funcionarios', [FuncionarioApiController::class, 'index']);
Route::post('/funcionarios', [FuncionarioApiController::class, 'store']);
Route::get('/funcionarios/{id}', [FuncionarioApiController::class, 'show']);
Route::put('/funcionarios/{id}', [FuncionarioApiController::class, 'update']);

Route::post('/estudios', [EstudioApiController::class, 'store']);
Route::get('/funcionarios/{id}/estudios', [EstudioApiController::class, 'indexByFuncionario']);

Route::post('/experiencias', [ExperienciaApiController::class, 'store']);
Route::get('/funcionarios/{id}/experiencias', [ExperienciaApiController::class, 'indexByFuncionario']);
