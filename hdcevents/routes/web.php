<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;

Route::get('/', [SiteController::class, 'main'])->name('site.main');
Route::get('/detalhes/{slug}', [SiteController::class, 'detalhes'])->name('site.detalhes');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/contato', [ContatoController::class, 'contato_form'])->name('contato.contato')->middleware('auth');
Route::post('/contato', [ContatoController::class, 'enviar_mensagem'])->name('contato.store')->middleware('auth');

Route::get('/favoritos', [FavController::class, 'mostrar_favoritos'])->name('fav.favoritos');
Route::post('/favorito', [FavController::class, 'fav_adicionar'])->name('fav.favoritar')->middleware('auth');
Route::get('/favoritos_remover', [FavController::class, 'fav_remover'])->name('fav.remover')->middleware('auth');
Route::get('/favoritos_limpar', [FavController::class, 'fav_limpar'])->name('fav.limpar')->middleware('auth');

Route::get('/adicionar', [ListaController::class, 'add_form'])->name('lista.addForm')->middleware('auth');
Route::post('/adicionar', [ListaController::class, 'adicionar_ebooks'])->name('lista.adicionar')->middleware('auth');
Route::get('/limpar', [ListaController::class, 'limpar_ebooks'])->name('lista.limpar')->middleware('auth');
Route::get('/delete', [ListaController::class, 'deletar_ebooks'])->name('lista.delete')->middleware('auth');
Route::get('/editar/{ebook}', [ListaController::class, 'edit_form'])->name('lista.editForm')->middleware('auth');
Route::put('/editar', [ListaController::class, 'editar_ebooks'])->name('lista.editar')->middleware('auth');

Route::get('/entrar', [LoginController::class, 'login_form'])->name('site.loginForm')->middleware('guest');
Route::post('/entrar', [LoginController::class, 'login'])->name('site.login')->middleware('guest');
Route::get('/registrar', [LoginController::class, 'register_form'])->name('site.registerForm')->middleware('guest');
Route::post('/registrar', [LoginController::class, 'register'])->name('site.register')->middleware('guest');
Route::get('/sair', [LoginController::class, 'logout'])->name('site.logout');