<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GameController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('users', UsersController::class);
Route::resource('questions', QuestionsController::class);


//Route::get('products', [ProductController::class, 'index'])->name('products.index');        // Listar todos os produtos
//Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // Formulário de criação de produto
//Route::post('products', [ProductController::class, 'store'])->name('products.store');         // Salvar um novo produto
//Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');   // Exibir um produto específico
//Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Formulário de edição de produto
//Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');  // Atualizar um produto específico
//Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Excluir um produto específico


Route::get('/game', [GameController::class, 'play'])->name('game');
Route::post('/game/result', [GameController::class, 'processResult'])->name('game.result');
