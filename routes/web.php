<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImagemPostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('adm.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categoria', CategoriaController::class)->middleware(['auth']);
Route::resource('post', ArtigoController::class)->middleware(['auth']);
Route::resource('sessao', SessaoController::class)->middleware(['auth']);
Route::resource('imagem', ImagemPostController::class)->middleware(['auth']);
