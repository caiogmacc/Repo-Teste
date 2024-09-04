<?php


// Define a rota principal '/'
use Illuminate\Support\Facades\Route;


// Retorna a view 'welcome'
Route::get('/', function () {
    return view('welcome');
});
