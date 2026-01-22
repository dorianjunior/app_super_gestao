@extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('app.fornecedores.create') }}" class="btn btn-success">+ Novo Fornecedor</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Site</th>
                <th>UF</th>
                <th>E-mail</th>
                <th style="width: 150px; text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->site ?? '-' }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td style="text-align: center;">
                        <div class="actions">
                            <a href="{{ route('app.fornecedores.edit', $fornecedor->id) }}" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Editar</a>

                            <form action="{{ route('app.fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 30px; color: #7f8c8d;">
                        Nenhum fornecedor cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $fornecedores->links() }}
    </div>
@endsection

