@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <!-- Botão Adicionar -->
    <div class="mb-4">
        <a href="{{ route('app.clientes.create') }}" class="btn btn-danger">
            <i class="fas fa-plus-circle me-2"></i>Novo Cliente
        </a>
    </div>

    <!-- Tabela de Clientes -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nome</th>
                        <th style="width: 140px;">CPF</th>
                        <th>E-mail</th>
                        <th style="width: 130px;">Telefone</th>
                        <th>Cidade/UF</th>
                        <th style="width: 180px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td><span class="badge bg-secondary">#{{ $cliente->id }}</span></td>
                            <td><strong>{{ $cliente->nome }}</strong></td>
                            <td><code>{{ $cliente->cpf }}</code></td>
                            <td>
                                <a href="mailto:{{ $cliente->email }}" class="text-decoration-none">
                                    <i class="fas fa-envelope me-1"></i>{{ $cliente->email }}
                                </a>
                            </td>
                            <td>
                                <a href="tel:{{ $cliente->telefone }}" class="text-decoration-none">
                                    <i class="fas fa-phone me-1"></i>{{ $cliente->telefone }}
                                </a>
                            </td>
                            <td>
                                @if($cliente->cidade && $cliente->uf)
                                    <i class="fas fa-map-marker-alt me-1 text-muted"></i>
                                    {{ $cliente->cidade }}/{{ $cliente->uf }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('app.clientes.edit', $cliente->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('app.clientes.destroy', $cliente->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="table-empty-state">
                                    <i class="fas fa-users"></i>
                                    <p>Nenhum cliente cadastrado.</p>
                                    <a href="{{ route('app.clientes.create') }}" class="btn btn-danger mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Cadastrar Primeiro Cliente
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($clientes->hasPages())
            <div class="d-flex justify-content-center">
                {{ $clientes->links() }}
            </div>
        @endif
    </div>
@endsection
