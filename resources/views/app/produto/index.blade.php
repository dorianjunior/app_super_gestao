@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('app.produtos.create') }}" class="btn btn-success">+ Novo Produto</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Peso (kg)</th>
                <th>Preço</th>
                <th>Est. Mín</th>
                <th>Est. Máx</th>
                <th style="width: 150px; text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ Str::limit($produto->descricao, 50) ?? '-' }}</td>
                    <td>{{ $produto->peso ?? '-' }}</td>
                    <td>R$ {{ number_format($produto->preço_venda, 2, ',', '.') }}</td>
                    <td>{{ $produto->estoque_minimo }}</td>
                    <td>{{ $produto->estoque_maximo }}</td>
                    <td style="text-align: center;">
                        <div class="actions">
                            <a href="{{ route('app.produtos.edit', $produto->id) }}" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Editar</a>

                            <form action="{{ route('app.produtos.destroy', $produto->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 30px; color: #7f8c8d;">
                        Nenhum produto cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $produtos->links() }}
    </div>
@endsection
