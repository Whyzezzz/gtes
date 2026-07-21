<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CarrinhoController;    
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
    return view('welcome');
});
Route::get('/about', function () {
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/adicionar-jogos', [JogoController::class, 'adicionarJogos']);
Route::get('/catalogo', [JogoController::class, 'visualizarJogos'])->name('catalogo');
Route::get('/detalhes-do-jogo/{nomeDoJogo}', [JogoController::class, 'visualizarDetalhesDoJogo'])->name('detalhes-do-jogo');
Route::get('/suggestions', [JogoController::class, 'suggestions']);

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionarAoCarrinho']);
Route::delete('/carrinho/remover', [CarrinhoController::class, 'removerDoCarrinho'])->name('carrinho.remover');


Route::get('/about', function () {
    return view('about.index');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
