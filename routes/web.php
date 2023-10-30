<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistidaController;
use App\Http\Controllers\ServicoController;


Route::get('/', function () {
    return view('home');
});

//Rotas Assistida
Route::get('/',[AssistidaController::class, 'index'])->name('assistida.index');
Route::get('/cadastro',[AssistidaController::class, 'create'])->name('assistida.create');
Route::post('/cadastro/novo',[AssistidaController::class, 'store'])->name('assistida.store');
Route::get('/assistida/{id}',[AssistidaController::class, 'show'])->name('assistida.show');
Route::post('/assistida/update/{id}',[AssistidaController::class, 'update'])->name('assistida.update');
Route::delete('/assistida/delete/{id}', [AssistidaController::class, 'destroy'])->name('assistida.destroy');
//Rotas Dashboard
Route::get('/estatisticas',[ServicoController::class, 'dashboard'])->name('dashboard');

//Rotas Serviços
Route::get('/servico/novo/{id}',[ServicoController::class, 'create'])->name('servico.create');
Route::post('/servico/cadastro_servico/{id}',[ServicoController::class, 'store'])->name('servico.store');
Route::get('/assistida/servico/{id}',[ServicoController::class, 'show'])->name('servico.show');
Route::post('/assistida/servico/update/{servico}',[ServicoController::class, 'update'])->name('servico.update');


