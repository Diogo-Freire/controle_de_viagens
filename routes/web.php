<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\ViagemController;


Route::get('/', function () {
    return view('index');
});


Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/create', [VeiculoController::class, 'create'])->name('veiculos.create');
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
Route::get('/veiculos/{veiculo}/edit', [VeiculoController::class, 'edit'])->name('veiculos.edit');
Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');

Route::get('/motoristas', [MotoristaController::class, 'index'])->name('motoristas.index');
Route::get('/motoristas/create', [MotoristaController::class, 'create'])->name('motoristas.create');
Route::post('/motoristas', [MotoristaController::class, 'store'])->name('motoristas.store');
Route::get('/motoristas/{motorista}', [MotoristaController::class, 'show'])->name('motoristas.show');
Route::get('/motoristas/{motorista}/edit', [MotoristaController::class, 'edit'])->name('motoristas.edit');
Route::put('/motoristas/{motorista}', [MotoristaController::class, 'update'])->name('motoristas.update');
Route::delete('/motoristas/{motorista}', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');

Route::get('/viagens', [ViagemController::class, 'index'])->name('viagens.index');
Route::get('/viagens/create', [ViagemController::class, 'create'])->name('viagens.create');
Route::post('/viagens', [ViagemController::class, 'store'])->name('viagens.store');
Route::get('/viagens/{viagem}', [ViagemController::class, 'show'])->name('viagens.show');
Route::get('/viagens/{viagem}/edit', [ViagemController::class, 'edit'])->name('viagens.edit');
Route::put('/viagens/{viagem}', [ViagemController::class, 'update'])->name('viagens.update');
Route::delete('/viagens/{viagem}', [ViagemController::class, 'destroy'])->name('viagens.destroy');