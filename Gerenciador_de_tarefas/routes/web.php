<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get("/", [UsuarioController::class, 'show'])->name('usuario.show');

// ── Cadastro ──────────────────────────────────────────────────────────────
// Exibe o formulário de cadastro
Route::get('/cadastro', [UsuarioController::class, 'create'])
    ->name('login.cadastro');

// Processa o formulário de cadastro
Route::post('/cadastro', [UsuarioController::class, 'store'])
    ->name('usuario.store');

// ── Login ─────────────────────────────────────────────────────────────────
// Exibe o formulário de login
Route::get('/login', [UsuarioController::class, 'edit'])
    ->name('login');

// Processa o login
/*Route::post('/login', [UsuarioController::class, 'show'])
    ->name('usuario.show');*/

// ── Área autenticada ──────────────────────────────────────────────────────
// Página inicial após login bem-sucedido
Route::get('/painel', [UsuarioController::class, 'index'])
    ->name('usuario.index');