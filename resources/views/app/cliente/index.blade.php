@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('app.clientes.create') }}" class="btn btn-success">+ Novo Cliente</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Cidade/UF</th>
                <th style="width: 150px; text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        @if($cliente->cidade && $cliente->uf)
                            {{ $cliente->cidade }}/{{ $cliente->uf }}
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div class="actions">
                            <a href="{{ route('app.clientes.edit', $cliente->id) }}" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Editar</a>

                            <form action="{{ route('app.clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px; color: #7f8c8d;">
                        Nenhum cliente cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $clientes->links() }}
    </div>
@endsection
