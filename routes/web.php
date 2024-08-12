<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanySelectionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppController;

// Rotas de autenticação (login, registro, etc.)
Auth::routes();

// Protege todas as rotas para que exijam autenticação
Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [AppController::class, 'showDashboard'])->name('dashboard');

    Route::get('/select-company', [CompanySelectionController::class, 'selectCompany'])->name('select.company');

    Route::get('/company/select/{id}', [CompanySelectionController::class, 'select'])->name('company.select');

    Route::get('/app', [AppController::class, 'processToken'])->name('app.process');

    Route::resource('lojas', LojaController::class);

    Route::get('/lojas', [LojaController::class, 'index'])->name('lojas.index');

    Route::get('cadastros/lojas', [CadastroController::class, 'createLoja'])->name('cadastros.lojas');
    Route::get('cadastros/clientes', [CadastroController::class, 'clientes'])->name('cadastros.clientes');
    Route::get('cadastros/produtos', [CadastroController::class, 'produtos'])->name('cadastros.produtos');
    Route::get('cadastros/fornecedores', [CadastroController::class, 'fornecedores'])->name('cadastros.fornecedores');

    Route::get('/search', [SearchController::class, 'search'])->name('search');

    Route::get('/get-estados/{pais_id}', [CadastroController::class, 'getEstados']);
    Route::get('/get-cidades/{uf}', [CadastroController::class, 'getCidades']);
});

// Rota para registrar novos usuários (pública)
Route::post('/register', [RegisterController::class, 'register'])->name('register');
