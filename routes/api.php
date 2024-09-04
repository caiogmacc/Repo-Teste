<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\termoController;


// Rota protegida por autenticação Sanctum que retorna o usuário autenticado

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rota para criar um novo termo via POST
Route::post('/envtermo', [termoController::class, 'store']);

// Rota para gerenciar recursos de termo (index, show, store, update, destroy)
Route::apiResource('/termo', termoController::class);

// Rota para procurar um termo pelas palavras do termo
Route::get('/termo/{palavras-do-termo}', [termoController::class, 'procurarTermo']);

// Rota para buscar um termo pelo ID
Route::get('/termo/id/{id}', [termoController::class, 'search']);