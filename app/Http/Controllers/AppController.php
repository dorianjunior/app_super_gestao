<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Cliente;

class AppController extends Controller
{
    public function home()
    {
        $totalFornecedores = Fornecedor::count();
        $totalProdutos = Produto::count();
        $totalClientes = Cliente::count();

        return view('app.home', compact('totalFornecedores', 'totalProdutos', 'totalClientes'));
    }
}
