<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

use App\Http\Controllers\LivroController;

Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);

use App\Http\Controllers\ProdutoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

use App\Models\User;

Route::get('/teste-orm', function() {
    User::create([
     'name' => 'Ana Clara Santos',
     'email' => 'ana.santos@escola.sp.gov.br',
     'password' => '12345678',
    ]);
    return User::all();
});