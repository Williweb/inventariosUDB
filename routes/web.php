<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\UsuarioController;

// Login
Route::get('/', [LoginController::class, 'index'])->middleware('guest.custom');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard — todos los usuarios autenticados
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth.custom');

// Productos — todos los usuarios autenticados
Route::get('/productos', [ProductoController::class, 'index'])->middleware('auth.custom');
Route::get('/productos/create', [ProductoController::class, 'create'])->middleware('auth.custom');
Route::post('/productos', [ProductoController::class, 'store'])->middleware('auth.custom');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->middleware('auth.custom');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->middleware('auth.custom');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->middleware('auth.custom');

// Entradas — solo Administrador
Route::get('/entradas', [EntradaController::class, 'index'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/entradas/create', [EntradaController::class, 'create'])->middleware(['auth.custom', 'admin.custom']);
Route::post('/entradas', [EntradaController::class, 'store'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/entradas/{entrada}/edit', [EntradaController::class, 'edit'])->middleware(['auth.custom', 'admin.custom']);
Route::put('/entradas/{entrada}', [EntradaController::class, 'update'])->middleware(['auth.custom', 'admin.custom']);
Route::delete('/entradas/{entrada}', [EntradaController::class, 'destroy'])->middleware(['auth.custom', 'admin.custom']);

// Usuarios — solo Administrador
Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->middleware(['auth.custom', 'admin.custom']);
Route::post('/usuarios', [UsuarioController::class, 'store'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->middleware(['auth.custom', 'admin.custom']);
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->middleware(['auth.custom', 'admin.custom']);
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->middleware(['auth.custom', 'admin.custom']);

// Salidas — solo Administrador
Route::get('/salidas', [SalidaController::class, 'index'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/salidas/create', [SalidaController::class, 'create'])->middleware(['auth.custom', 'admin.custom']);
Route::post('/salidas', [SalidaController::class, 'store'])->middleware(['auth.custom', 'admin.custom']);
Route::get('/salidas/{salida}/edit', [SalidaController::class, 'edit'])->middleware(['auth.custom', 'admin.custom']);
Route::put('/salidas/{salida}', [SalidaController::class, 'update'])->middleware(['auth.custom', 'admin.custom']);
Route::delete('/salidas/{salida}', [SalidaController::class, 'destroy'])->middleware(['auth.custom', 'admin.custom']);
