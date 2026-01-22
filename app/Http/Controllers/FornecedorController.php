<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::orderBy('nome')->paginate(10);
        return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('app.fornecedor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'site' => 'nullable|string|max:200',
            'uf' => 'required|string|size:2',
            'email' => 'required|email|max:150|unique:fornecedors,email'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 50 caracteres',
            'uf.required' => 'O campo UF é obrigatório',
            'uf.size' => 'A UF deve ter exatamente 2 caracteres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'email.unique' => 'Este e-mail já está cadastrado'
        ]);

        Fornecedor::create($request->all());

        return redirect()->route('app.fornecedores')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('app.fornecedor.edit', compact('fornecedor'));
    }

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:50',
            'site' => 'nullable|string|max:200',
            'uf' => 'required|string|size:2',
            'email' => 'required|email|max:150|unique:fornecedors,email,' . $id
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 50 caracteres',
            'uf.required' => 'O campo UF é obrigatório',
            'uf.size' => 'A UF deve ter exatamente 2 caracteres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'email.unique' => 'Este e-mail já está cadastrado'
        ]);

        $fornecedor->update($request->all());

        return redirect()->route('app.fornecedores')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('app.fornecedores')->with('success', 'Fornecedor removido com sucesso!');
    }
}
