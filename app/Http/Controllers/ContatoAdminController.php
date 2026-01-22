<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoAdminController extends Controller
{
    public function index()
    {
        $contatos = SiteContato::orderBy('created_at', 'desc')->paginate(15);
        $totalNovos = SiteContato::where('status', 'novo')->count();

        return view('app.contato.index', compact('contatos', 'totalNovos'));
    }

    public function show($id)
    {
        $contato = SiteContato::findOrFail($id);

        // Marcar como lido se ainda estiver como novo
        if ($contato->status === 'novo') {
            $contato->status = 'lido';
            $contato->save();
        }

        return view('app.contato.show', compact('contato'));
    }

    public function updateStatus(Request $request, $id)
    {
        $contato = SiteContato::findOrFail($id);

        $request->validate([
            'status' => 'required|in:novo,lido,respondido'
        ]);

        $contato->status = $request->status;
        $contato->save();

        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $contato = SiteContato::findOrFail($id);
        $contato->delete();

        return redirect()->route('app.contatos')->with('success', 'Contato excluído com sucesso!');
    }

    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:site_contatos,id'
        ]);

        SiteContato::whereIn('id', $request->ids)->delete();

        return redirect()->route('app.contatos')->with('success', 'Contatos excluídos com sucesso!');
    }
}
