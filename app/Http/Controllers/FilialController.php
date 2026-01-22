<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filial;

class FilialController extends Controller
{
    public function index()
    {
        $filiais = Filial::withCount('produtoFiliais')->orderBy('filial')->paginate(10);
        return view('app.filial.index', compact('filiais'));
    }

    public function create()
    {
        return view('app.filial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'filial' => 'required|string|max:30|unique:filiais,filial'
        ], [
            'filial.required' => 'O nome da filial é obrigatório',
            'filial.max' => 'O nome da filial deve ter no máximo 30 caracteres',
            'filial.unique' => 'Já existe uma filial com este nome'
        ]);

        Filial::create($request->all());

        return redirect()->route('app.filiais')->with('success', 'Filial cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $filial = Filial::findOrFail($id);
        return view('app.filial.edit', compact('filial'));
    }

    public function update(Request $request, $id)
    {
        $filial = Filial::findOrFail($id);

        $request->validate([
            'filial' => 'required|string|max:30|unique:filiais,filial,' . $id
        ], [
            'filial.required' => 'O nome da filial é obrigatório',
            'filial.max' => 'O nome da filial deve ter no máximo 30 caracteres',
            'filial.unique' => 'Já existe uma filial com este nome'
        ]);

        $filial->update($request->all());

        return redirect()->route('app.filiais')->with('success', 'Filial atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $filial = Filial::findOrFail($id);

        // Verifica se há produtos associados
        if ($filial->produtoFiliais()->count() > 0) {
            return redirect()->route('app.filiais')->with('error', 'Não é possível excluir esta filial pois existem produtos associados a ela.');
        }

        $filial->delete();

        return redirect()->route('app.filiais')->with('success', 'Filial removida com sucesso!');
    }

    public function produtos($id)
    {
        $filial = Filial::findOrFail($id);
        $produtosFilial = $filial->produtoFiliais()->with('produto')->paginate(15);

        return view('app.filial.produtos', compact('filial', 'produtosFilial'));
    }
}
