<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function home()
    {
        // Estatísticas gerais
        $totalFornecedores = Fornecedor::count();
        $totalProdutos = Produto::count();
        $totalClientes = Cliente::count();
        $totalUsuarios = User::count();

        // Produtos por fornecedor (Top 5)
        $produtosPorFornecedor = Fornecedor::withCount('produtos')
            ->orderBy('produtos_count', 'desc')
            ->limit(5)
            ->get();

        // Produtos recentes (substituindo estoque baixo já que as colunas foram movidas)
        $produtosEstoqueBaixo = Produto::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Últimos clientes cadastrados
        $ultimosClientes = Cliente::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Estatísticas de produtos filiais
        $totalEstoque = DB::table('produto_filiais')->sum('estoque_maximo');
        $valorTotalEstoque = DB::table('produto_filiais')->sum(DB::raw('preco_venda * estoque_maximo'));

        // Clientes por estado (Top 5)
        $clientesPorEstado = Cliente::select('uf', DB::raw('count(*) as total'))
            ->groupBy('uf')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // Fornecedores por estado
        $fornecedoresPorEstado = Fornecedor::select('uf', DB::raw('count(*) as total'))
            ->groupBy('uf')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('app.home', compact(
            'totalFornecedores',
            'totalProdutos',
            'totalClientes',
            'totalUsuarios',
            'produtosPorFornecedor',
            'produtosEstoqueBaixo',
            'ultimosClientes',
            'totalEstoque',
            'valorTotalEstoque',
            'clientesPorEstado',
            'fornecedoresPorEstado'
        ));
    }
}
