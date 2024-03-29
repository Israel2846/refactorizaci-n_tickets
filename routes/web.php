<?php

use App\Controllers\AlmacenController;
use App\Controllers\AreaController;
use App\Controllers\CategoriaController;
use App\Controllers\SubcategoriaController;
use App\Controllers\TicketController;
use App\Controllers\UsuarioController;
use Lib\Route;

Route::get('/', [UsuarioController::class, 'login_form']);
Route::get('/error/:error', [UsuarioController::class, 'login_form']);
Route::post('/', [UsuarioController::class, 'login']);
Route::get('/cerrar_sesion', [UsuarioController::class, 'logout']);

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

Route::get('/almacen', [AlmacenController::class, 'index']);
Route::post('/almacen/create', [AlmacenController::class, 'store']);
Route::get('/almacen/edit/:id', [AlmacenController::class, 'edit']);
Route::post('/almacen/edit/:id', [AlmacenController::class, 'update']);
Route::post('/almacen/delete/:id', [AlmacenController::class, 'destroy']);

Route::get('/area', [AreaController::class, 'index']);
Route::post('/area/create', [AreaController::class, 'store']);
Route::get('/area/edit/:id', [AreaController::class, 'edit']);
Route::post('/area/edit/:id', [AreaController::class, 'update']);
Route::post('/area/delete/:id', [AreaController::class, 'destroy']);

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario/comboArea/:id', [AreaController::class, 'getAreaPorAlmacen']);
Route::post('/usuario/create', [UsuarioController::class, 'create']);
Route::get('/usuario/edit/:id', [UsuarioController::class, 'edit']);
Route::post('/usuario/edit/:id', [UsuarioController::class, 'update']);
Route::post('/usuario/delete/:id', [UsuarioController::class, 'destroy']);

Route::get('/ticket', [TicketController::class, 'index']);
Route::post('/ticket/create', [TicketController::class, 'create']);
Route::get('/ticket/comboSubCat/:id', [SubcategoriaController::class, 'getSubCat']);

Route::dispatch();
