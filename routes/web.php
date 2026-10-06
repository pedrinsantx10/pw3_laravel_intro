<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

use App\Http\Controllers\UserController;

// Rota da listagem e painel administrativo (GET)
Route::get('/admin', [UserController::class, 'index']);

// Rotas para carregar o formulário (GET)
Route::get('/usuarios/novo', [UserController::class, 'create']);

// Rotas para salvar o formulário (POST)
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de criação
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

// Rota de exclusão (DELETE)
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);


use App\Http\Controllers\LivroController;

Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);

use App\Http\Controllers\ProdutoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

use App\Http\Controllers\EventoController;

// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);

use App\Models\User;

Route::get('/teste-orm', function() {
    User::create([
     'name' => 'Pedro Henrique',
     'email' => 'pedro.henrique@escola.sp.gov.br',
     'password' => '12345678',
    ]);
    return User::all();
});