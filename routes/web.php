<?php

use App\Controllers\CategoriaController;
use App\Controllers\SubcategoriaController;
use Lib\Route;

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::post('/categoria/create', [CategoriaController::class, 'store']);
Route::get('/categoria/edit/:id', [CategoriaController::class, 'edit']);
Route::post('/categoria/edit/:id', [CategoriaController::class, 'update']);
Route::post('/categoria/delete/:id', [CategoriaController::class, 'destroy']);

Route::get('/subcategoria', [SubcategoriaController::class, 'index']);
Route::post('/subcategoria/create', [SubcategoriaController::class, 'store']);
Route::get('/subcategoria/edit/:id', [SubcategoriaController::class, 'edit']);
Route::post('/subcategoria/edit/:id', [SubcategoriaController::class, 'update']);
Route::post('/subcategoria/delete/:id', [SubcategoriaController::class, 'destroy']);

Route::dispatch();
