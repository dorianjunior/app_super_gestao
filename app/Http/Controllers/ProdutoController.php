<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('nome')->paginate(10);
        return view('app.produto.index', compact('produtos'));
    }

    public function create()
    {
        return view('app.produto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'peso' => 'nullable|integer|min:0',
            'preço_venda' => 'required|numeric|min:0.01',
            'estoque_minimo' => 'required|integer|min:0',
            'estoque_maximo' => 'required|integer|min:0'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'preço_venda.required' => 'O campo preço de venda é obrigatório',
            'preço_venda.numeric' => 'O preço deve ser um valor numérico',
            'preço_venda.min' => 'O preço deve ser maior que zero',
            'peso.integer' => 'O peso deve ser um número inteiro',
            'peso.min' => 'O peso não pode ser negativo',
            'estoque_minimo.required' => 'O campo estoque mínimo é obrigatório',
            'estoque_minimo.integer' => 'O estoque mínimo deve ser um número inteiro',
            'estoque_minimo.min' => 'O estoque mínimo não pode ser negativo',
            'estoque_maximo.required' => 'O campo estoque máximo é obrigatório',
            'estoque_maximo.integer' => 'O estoque máximo deve ser um número inteiro',
            'estoque_maximo.min' => 'O estoque máximo não pode ser negativo'
        ]);

        Produto::create($request->all());

        return redirect()->route('app.produtos')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('app.produto.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'peso' => 'nullable|integer|min:0',
            'preço_venda' => 'required|numeric|min:0.01',
            'estoque_minimo' => 'required|integer|min:0',
            'estoque_maximo' => 'required|integer|min:0'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'preço_venda.required' => 'O campo preço de venda é obrigatório',
            'preço_venda.numeric' => 'O preço deve ser um valor numérico',
            'preço_venda.min' => 'O preço deve ser maior que zero',
            'peso.integer' => 'O peso deve ser um número inteiro',
            'peso.min' => 'O peso não pode ser negativo',
            'estoque_minimo.required' => 'O campo estoque mínimo é obrigatório',
            'estoque_minimo.integer' => 'O estoque mínimo deve ser um número inteiro',
            'estoque_minimo.min' => 'O estoque mínimo não pode ser negativo',
            'estoque_maximo.required' => 'O campo estoque máximo é obrigatório',
            'estoque_maximo.integer' => 'O estoque máximo deve ser um número inteiro',
            'estoque_maximo.min' => 'O estoque máximo não pode ser negativo'
        ]);

        $produto->update($request->all());

        return redirect()->route('app.produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('app.produtos')->with('success', 'Produto removido com sucesso!');
    }
}
