@extends('app.layouts.basico')

@section('titulo', 'Produtos - ' . $filial->filial)

@section('conteudo')
    <!-- Cabeçalho -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-store text-primary me-2"></i>{{ $filial->filial }}
            </h4>
            <p class="text-muted mb-0">Gerencie os produtos e preços desta filial</p>
        </div>
        <a href="{{ route('app.filiais') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
    </div>

    <!-- Botão Adicionar Produto -->
    <div class="mb-4">
        <a href="{{ route('app.produtos-filiais.create') }}?filial_id={{ $filial->id }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i>Adicionar Produto
        </a>
    </div>

    <!-- Tabela de Produtos -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th style="width: 150px;">Preço de Venda</th>
                        <th style="width: 120px;">Est. Mínimo</th>
                        <th style="width: 120px;">Est. Máximo</th>
                        <th style="width: 180px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtosFilial as $produtoFilial)
                        <tr>
                            <td>
                                <strong>{{ $produtoFilial->produto->nome }}</strong>
                                @if($produtoFilial->produto->descricao)
                                    <br><small class="text-muted">{{ Str::limit($produtoFilial->produto->descricao, 50) }}</small>
                                @endif
                            </td>
                            <td><span class="text-success fw-bold">R$ {{ number_format($produtoFilial->preco_venda, 2, ',', '.') }}</span></td>
                            <td>{{ $produtoFilial->estoque_minimo }}</td>
                            <td>{{ $produtoFilial->estoque_maximo }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('app.produtos-filiais.edit', $produtoFilial->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('app.produtos-filiais.destroy', $produtoFilial->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Tem certeza que deseja remover este produto da filial?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Remover">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="table-empty-state">
                                    <i class="fas fa-box-open"></i>
                                    <p>Nenhum produto cadastrado nesta filial.</p>
                                    <a href="{{ route('app.produtos-filiais.create') }}?filial_id={{ $filial->id }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Adicionar Primeiro Produto
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($produtosFilial->hasPages())
            <div class="d-flex justify-content-center">
                {{ $produtosFilial->links() }}
            </div>
        @endif
    </div>
@endsection
