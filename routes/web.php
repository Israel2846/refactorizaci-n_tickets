<?php

use App\Controllers\CategoriaController;
use Lib\Route;

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::post('/categoria/create', [CategoriaController::class, 'store']);
Route::get('/categoria/edit/:id', [CategoriaController::class, 'edit']);
Route::post('/categoria/edit/:id', [CategoriaController::class, 'update']);
Route::post('/categoria/delete/:id', [CategoriaController::class, 'destroy']);

Route::dispatch();
