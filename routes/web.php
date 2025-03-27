<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PaisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('comunas', ComunaController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('paises', PaisController::class);
Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');
Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');