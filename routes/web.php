<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistidaController;
use App\Http\Controllers\ServicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Rotas Assistida
Route::get('/',[AssistidaController::class, 'index'])->name('assistida.index');
Route::get('/cadastro',[AssistidaController::class, 'create'])->name('assistida.create');
Route::post('/cadastro/novo',[AssistidaController::class, 'store'])->name('assistida.store');
Route::get('/assistida/{id}',[AssistidaController::class, 'show'])->name('assistida.show');
Route::post('/assistida/update/{id}',[AssistidaController::class, 'update'])->name('assistida.update');

//Rotas Dashboard
Route::get('/estatisticas',[ServicoController::class, 'dashboard'])->name('dashboard');

//Rotas Serviços
Route::get('/assistida/servico/{id}',[ServicoController::class, 'show'])->name('servico.show');
Route::post('/assistida/servico/update/{id}',[ServicoController::class, 'update'])->name('servico.update');


