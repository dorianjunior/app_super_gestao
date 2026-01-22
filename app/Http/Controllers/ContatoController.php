<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato()
    {
        return view('site.contato', ['titulo' => 'Contato']);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:50',
            'telefone' => 'required|string|min:10|max:20',
            'email' => 'required|email|max:80',
            'motivo_contato' => 'required|integer|between:1,3',
            'mensagem' => 'required|string|max:2000'
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 50 caracteres',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.min' => 'O telefone deve ter no mínimo 10 caracteres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'motivo_contato.required' => 'Selecione o motivo do contato',
            'motivo_contato.between' => 'Motivo de contato inválido',
            'mensagem.required' => 'O campo mensagem é obrigatório',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres'
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.contato')->with('success', 'Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.');
    }
}
