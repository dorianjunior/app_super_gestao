@extends('app.layouts.basico')

@section('titulo', 'Filiais')

@section('conteudo')
    <!-- Botão Adicionar -->
    <div class="mb-4">
        <a href="{{ route('app.filiais.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i>Nova Filial
        </a>
    </div>

    <!-- Tabela de Filiais -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nome da Filial</th>
                        <th style="width: 150px;">Produtos</th>
                        <th style="width: 250px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($filiais as $filial)
                        <tr>
                            <td><span class="badge bg-secondary">#{{ $filial->id }}</span></td>
                            <td><strong>{{ $filial->filial }}</strong></td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $filial->produto_filiais_count }} produto(s)
                                </span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('app.filiais.produtos', $filial->id) }}"
                                       class="btn btn-info btn-sm"
                                       title="Ver Produtos">
                                        <i class="fas fa-box"></i> Produtos
                                    </a>
                                    <a href="{{ route('app.filiais.edit', $filial->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('app.filiais.destroy', $filial->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta filial?')">
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
                            <td colspan="4">
                                <div class="table-empty-state">
                                    <i class="fas fa-store-alt"></i>
                                    <p>Nenhuma filial cadastrada.</p>
                                    <a href="{{ route('app.filiais.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Cadastrar Primeira Filial
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($filiais->hasPages())
            <div class="d-flex justify-content-center">
                {{ $filiais->links() }}
            </div>
        @endif
    </div>
@endsection
