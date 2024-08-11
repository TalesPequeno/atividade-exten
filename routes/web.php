<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rotas de recurso para Loja
Route::resource('lojas', LojaController::class);
Route::get('/lojas', [LojaController::class, 'index'])->name('lojas.index');

// Rotas específicas para Cadastros
Route::get('cadastros/lojas', [CadastroController::class, 'createLoja'])->name('cadastros.lojas');
Route::get('cadastros/clientes', [CadastroController::class, 'clientes'])->name('cadastros.clientes');
Route::get('cadastros/produtos', [CadastroController::class, 'produtos'])->name('cadastros.produtos');
Route::get('cadastros/fornecedores', [CadastroController::class, 'fornecedores'])->name('cadastros.fornecedores');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/get-estados/{pais_id}', [CadastroController::class, 'getEstados']);
Route::get('/get-cidades/{uf}', [CadastroController::class, 'getCidades']);
