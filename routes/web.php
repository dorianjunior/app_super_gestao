<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return 'welcome';
});

Route::get('/sobre', function () {
    return 'Sobre';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Sem Nome', //se não passar ela vai para contato
        int $categoria_id = 1
    ) {
        return "<h1> Dados pela url: $nome - $categoria_id </h1>";
    }
)->where('nome','[A-Za-z]+')->where('categoria_id', '[0-9]+');

Route::get('/rota1', function () {
    return '1';
})->name('site.rota1');

Route::get('/rota2', function () {
return redirect()->route('site.rota1');
})->name('site.rota2');

Route::redirect('/rota2','/rota1');

Route::fallback(function(){
    echo "404 Não encontrada.  <a href='/'>INDEX</a>";
});
*/

// Rotas públicas do site
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre', [\App\Http\Controllers\SobreController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato.salvar');

// Rotas de autenticação
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('login.autenticar');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'sair'])->name('logout');

// Rotas protegidas da área administrativa
Route::prefix('/app')->middleware('auth')->group(function () {
    Route::get('/home', [\App\Http\Controllers\AppController::class, 'home'])->name('app.home');

    // Rotas de Fornecedores (CRUD completo)
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/fornecedores/criar', [\App\Http\Controllers\FornecedorController::class, 'create'])->name('app.fornecedores.create');
    Route::post('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'store'])->name('app.fornecedores.store');
    Route::get('/fornecedores/{id}/editar', [\App\Http\Controllers\FornecedorController::class, 'edit'])->name('app.fornecedores.edit');
    Route::put('/fornecedores/{id}', [\App\Http\Controllers\FornecedorController::class, 'update'])->name('app.fornecedores.update');
    Route::delete('/fornecedores/{id}', [\App\Http\Controllers\FornecedorController::class, 'destroy'])->name('app.fornecedores.destroy');

    // Rotas de Produtos (CRUD completo)
    Route::get('/produtos', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produtos');
    Route::get('/produtos/criar', [\App\Http\Controllers\ProdutoController::class, 'create'])->name('app.produtos.create');
    Route::post('/produtos', [\App\Http\Controllers\ProdutoController::class, 'store'])->name('app.produtos.store');
    Route::get('/produtos/{id}/editar', [\App\Http\Controllers\ProdutoController::class, 'edit'])->name('app.produtos.edit');
    Route::put('/produtos/{id}', [\App\Http\Controllers\ProdutoController::class, 'update'])->name('app.produtos.update');
    Route::delete('/produtos/{id}', [\App\Http\Controllers\ProdutoController::class, 'destroy'])->name('app.produtos.destroy');

    // Rotas de Clientes (CRUD completo)
    Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('app.clientes');
    Route::get('/clientes/criar', [\App\Http\Controllers\ClienteController::class, 'create'])->name('app.clientes.create');
    Route::post('/clientes', [\App\Http\Controllers\ClienteController::class, 'store'])->name('app.clientes.store');
    Route::get('/clientes/{id}/editar', [\App\Http\Controllers\ClienteController::class, 'edit'])->name('app.clientes.edit');
    Route::put('/clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'update'])->name('app.clientes.update');
    Route::delete('/clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'destroy'])->name('app.clientes.destroy');

    // Rotas de Filiais (CRUD completo)
    Route::get('/filiais', [\App\Http\Controllers\FilialController::class, 'index'])->name('app.filiais');
    Route::get('/filiais/criar', [\App\Http\Controllers\FilialController::class, 'create'])->name('app.filiais.create');
    Route::post('/filiais', [\App\Http\Controllers\FilialController::class, 'store'])->name('app.filiais.store');
    Route::get('/filiais/{id}/editar', [\App\Http\Controllers\FilialController::class, 'edit'])->name('app.filiais.edit');
    Route::put('/filiais/{id}', [\App\Http\Controllers\FilialController::class, 'update'])->name('app.filiais.update');
    Route::delete('/filiais/{id}', [\App\Http\Controllers\FilialController::class, 'destroy'])->name('app.filiais.destroy');
    Route::get('/filiais/{id}/produtos', [\App\Http\Controllers\FilialController::class, 'produtos'])->name('app.filiais.produtos');

    // Rotas de Produtos por Filial (Gestão de Preços e Estoques)
    Route::get('/produtos-filiais', [\App\Http\Controllers\ProdutoFilialController::class, 'index'])->name('app.produtos-filiais');
    Route::get('/produtos-filiais/criar', [\App\Http\Controllers\ProdutoFilialController::class, 'create'])->name('app.produtos-filiais.create');
    Route::post('/produtos-filiais', [\App\Http\Controllers\ProdutoFilialController::class, 'store'])->name('app.produtos-filiais.store');
    Route::get('/produtos-filiais/{id}/editar', [\App\Http\Controllers\ProdutoFilialController::class, 'edit'])->name('app.produtos-filiais.edit');
    Route::put('/produtos-filiais/{id}', [\App\Http\Controllers\ProdutoFilialController::class, 'update'])->name('app.produtos-filiais.update');
    Route::delete('/produtos-filiais/{id}', [\App\Http\Controllers\ProdutoFilialController::class, 'destroy'])->name('app.produtos-filiais.destroy');
});

Route::fallback(function(){
    echo "404 Não encontrada.  <a href='/'>Ir para INDEX</a>";
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');
