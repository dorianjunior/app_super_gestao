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
        $fornecedores = \App\Models\Fornecedor::orderBy('nome')->get();
        $unidades = \DB::table('unidades')->orderBy('unidade')->get();

        return view('app.produto.create', compact('fornecedores', 'unidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'peso' => 'nullable|integer|min:0'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'peso.integer' => 'O peso deve ser um número inteiro',
            'peso.min' => 'O peso não pode ser negativo'
        ]);

        $dados = $request->all();

        // Definir unidade_id padrão se não for fornecido
        if (!isset($dados['unidade_id'])) {
            $dados['unidade_id'] = 1; // ID da unidade padrão
        }

        Produto::create($dados);

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
            'peso' => 'nullable|integer|min:0'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'peso.integer' => 'O peso deve ser um número inteiro',
            'peso.min' => 'O peso não pode ser negativo'
        ]);

        $produto->update($request->all());

        return redirect()->route('app.produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Deletar registros relacionados antes de deletar o produto
        \DB::table('produto_detalhes')->where('produto_id', $id)->delete();
        \DB::table('produto_filiais')->where('produto_id', $id)->delete();

        $produto->delete();

        return redirect()->route('app.produtos')->with('success', 'Produto removido com sucesso!');
    }
}
