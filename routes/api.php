<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\termoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/envtermo', [termoController::class, 'store']);
Route::apiResource('/termo', termoController::class);
Route::get('/termo/supabase/{letra}', [termoController::class, 'supabase']);
Route::patch('/termo/supabase/subs/{palavra}', [termoController::class, 'delpalavra']);
Route::get('/termo/supabase/subs/{palavra}', [termoController::class, 'delpalavra']);