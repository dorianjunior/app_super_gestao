<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoFilial;
use App\Models\Filial;
use App\Models\Produto;

class ProdutoFilialController extends Controller
{
    public function index(Request $request)
    {
        $filiais = Filial::all();

        $query = ProdutoFilial::with(['produto', 'filial']);

        // Aplicar filtro por filial se fornecido
        if ($request->filled('filial_id')) {
            $query->where('filial_id', $request->filial_id);
        }

        $produtosFiliais = $query->orderBy('filial_id')
                                 ->orderBy('produto_id')
                                 ->paginate(20)
                                 ->appends($request->query());

        return view('app.produto-filial.index', compact('produtosFiliais', 'filiais'));
    }

    public function create()
    {
        $filiais = Filial::orderBy('filial')->get();
        $produtos = Produto::orderBy('nome')->get();

        return view('app.produto-filial.create', compact('filiais', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'filial_id' => 'required|exists:filiais,id',
            'preco_venda' => 'required|numeric|min:0.01',
            'estoque_minimo' => 'required|integer|min:0',
            'estoque_maximo' => 'required|integer|min:0'
        ], [
            'produto_id.required' => 'Selecione um produto',
            'produto_id.exists' => 'Produto inválido',
            'filial_id.required' => 'Selecione uma filial',
            'filial_id.exists' => 'Filial inválida',
            'preco_venda.required' => 'O preço de venda é obrigatório',
            'preco_venda.numeric' => 'O preço deve ser um valor numérico',
            'preco_venda.min' => 'O preço deve ser maior que zero',
            'estoque_minimo.required' => 'O estoque mínimo é obrigatório',
            'estoque_minimo.integer' => 'O estoque mínimo deve ser um número inteiro',
            'estoque_minimo.min' => 'O estoque mínimo não pode ser negativo',
            'estoque_maximo.required' => 'O estoque máximo é obrigatório',
            'estoque_maximo.integer' => 'O estoque máximo deve ser um número inteiro',
            'estoque_maximo.min' => 'O estoque máximo não pode ser negativo'
        ]);

        // Verifica se já existe esta combinação produto-filial
        $existe = ProdutoFilial::where('produto_id', $request->produto_id)
                               ->where('filial_id', $request->filial_id)
                               ->exists();

        if ($existe) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Este produto já está cadastrado nesta filial.');
        }

        ProdutoFilial::create($request->all());

        return redirect()->route('app.produtos-filiais')->with('success', 'Produto associado à filial com sucesso!');
    }

    public function edit($id)
    {
        $produtoFilial = ProdutoFilial::with(['produto', 'filial'])->findOrFail($id);

        return view('app.produto-filial.edit', compact('produtoFilial'));
    }

    public function update(Request $request, $id)
    {
        $produtoFilial = ProdutoFilial::findOrFail($id);

        $request->validate([
            'preco_venda' => 'required|numeric|min:0.01',
            'estoque_minimo' => 'required|integer|min:0',
            'estoque_maximo' => 'required|integer|min:0'
        ], [
            'preco_venda.required' => 'O preço de venda é obrigatório',
            'preco_venda.numeric' => 'O preço deve ser um valor numérico',
            'preco_venda.min' => 'O preço deve ser maior que zero',
            'estoque_minimo.required' => 'O estoque mínimo é obrigatório',
            'estoque_minimo.integer' => 'O estoque mínimo deve ser um número inteiro',
            'estoque_minimo.min' => 'O estoque mínimo não pode ser negativo',
            'estoque_maximo.required' => 'O estoque máximo é obrigatório',
            'estoque_maximo.integer' => 'O estoque máximo deve ser um número inteiro',
            'estoque_maximo.min' => 'O estoque máximo não pode ser negativo'
        ]);

        $produtoFilial->update($request->all());

        return redirect()->route('app.produtos-filiais')->with('success', 'Preços e estoques atualizados com sucesso!');
    }

    public function destroy($id)
    {
        $produtoFilial = ProdutoFilial::findOrFail($id);
        $produtoFilial->delete();

        return redirect()->route('app.produtos-filiais')->with('success', 'Produto removido da filial com sucesso!');
    }
}
