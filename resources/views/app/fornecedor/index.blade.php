@extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')
    <!-- Botão Adicionar -->
    <div class="mb-4">
        <a href="{{ route('app.fornecedores.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Fornecedor
        </a>
    </div>

    <!-- Tabela de Fornecedores -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nome</th>
                        <th>Site</th>
                        <th style="width: 80px;">UF</th>
                        <th>E-mail</th>
                        <th style="width: 180px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fornecedores as $fornecedor)
                        <tr>
                            <td><span class="badge bg-secondary">#{{ $fornecedor->id }}</span></td>
                            <td><strong>{{ $fornecedor->nome }}</strong></td>
                            <td>
                                @if($fornecedor->site)
                                    <a href="{{ $fornecedor->site }}" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-external-link-alt me-1"></i>{{ $fornecedor->site }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td><span class="badge bg-info">{{ $fornecedor->uf }}</span></td>
                            <td>
                                <a href="mailto:{{ $fornecedor->email }}" class="text-decoration-none">
                                    <i class="fas fa-envelope me-1"></i>{{ $fornecedor->email }}
                                </a>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('app.fornecedores.edit', $fornecedor->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('app.fornecedores.destroy', $fornecedor->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?')">
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
                            <td colspan="6">
                                <div class="table-empty-state">
                                    <i class="fas fa-truck"></i>
                                    <p>Nenhum fornecedor cadastrado.</p>
                                    <a href="{{ route('app.fornecedores.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Cadastrar Primeiro Fornecedor
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($fornecedores->hasPages())
            <div class="d-flex justify-content-center">
                {{ $fornecedores->links() }}
            </div>
        @endif
    </div>
@endsection
