<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nome')->paginate(10);
        return view('app.cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('app.cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|size:14|unique:clientes,cpf',
            'email' => 'required|email|max:150|unique:clientes,email',
            'telefone' => 'required|string|max:20',
            'endereco' => 'nullable|string|max:200',
            'cidade' => 'nullable|string|max:100',
            'uf' => 'nullable|string|size:2',
            'cep' => 'nullable|string|max:10'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.size' => 'O CPF deve ter 14 caracteres (formato: 000.000.000-00)',
            'cpf.unique' => 'Este CPF já está cadastrado',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'email.unique' => 'Este e-mail já está cadastrado',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.max' => 'O telefone deve ter no máximo 20 caracteres',
            'uf.size' => 'A UF deve ter exatamente 2 caracteres'
        ]);

        Cliente::create($request->all());

        return redirect()->route('app.clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('app.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|size:14|unique:clientes,cpf,' . $id,
            'email' => 'required|email|max:150|unique:clientes,email,' . $id,
            'telefone' => 'required|string|max:20',
            'endereco' => 'nullable|string|max:200',
            'cidade' => 'nullable|string|max:100',
            'uf' => 'nullable|string|size:2',
            'cep' => 'nullable|string|max:10'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.size' => 'O CPF deve ter 14 caracteres (formato: 000.000.000-00)',
            'cpf.unique' => 'Este CPF já está cadastrado',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'email.unique' => 'Este e-mail já está cadastrado',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.max' => 'O telefone deve ter no máximo 20 caracteres',
            'uf.size' => 'A UF deve ter exatamente 2 caracteres'
        ]);

        $cliente->update($request->all());

        return redirect()->route('app.clientes')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('app.clientes')->with('success', 'Cliente removido com sucesso!');
    }
}
