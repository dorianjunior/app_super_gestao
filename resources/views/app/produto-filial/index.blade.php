@extends('app.layouts.basico')

@section('titulo', 'Produtos por Filial')

@section('conteudo')
    <!-- Botão Adicionar -->
    <div class="mb-4">
        <a href="{{ route('app.produtos-filiais.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i>Adicionar Produto à Filial
        </a>
    </div>

    <!-- Filtro por Filial -->
    @if($filiais->count() > 0)
    <div class="mb-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('app.produtos-filiais') }}" class="row g-3">
                    <div class="col-md-4">
                        <label for="filial_id" class="form-label">Filtrar por Filial</label>
                        <select name="filial_id" id="filial_id" class="form-select" onchange="this.form.submit()">
                            <option value="">Todas as Filiais</option>
                            @foreach($filiais as $filial)
                                <option value="{{ $filial->id }}" {{ request('filial_id') == $filial->id ? 'selected' : '' }}>
                                    {{ $filial->filial }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Tabela de Produtos por Filial -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Filial</th>
                        <th>Produto</th>
                        <th style="width: 150px;">Preço de Venda</th>
                        <th style="width: 120px;">Est. Mínimo</th>
                        <th style="width: 120px;">Est. Máximo</th>
                        <th style="width: 180px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtosFiliais as $produtoFilial)
                        <tr>
                            <td>
                                <span class="badge bg-primary">{{ $produtoFilial->filial->filial }}</span>
                            </td>
                            <td>
                                <strong>{{ $produtoFilial->produto->nome }}</strong>
                                @if($produtoFilial->produto->descricao)
                                    <br><small class="text-muted">{{ Str::limit($produtoFilial->produto->descricao, 40) }}</small>
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
                            <td colspan="6">
                                <div class="table-empty-state">
                                    <i class="fas fa-boxes"></i>
                                    <p>Nenhum produto associado às filiais.</p>
                                    <a href="{{ route('app.produtos-filiais.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Adicionar Produto à Filial
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($produtosFiliais->hasPages())
            <div class="d-flex justify-content-center">
                {{ $produtosFiliais->links() }}
            </div>
        @endif
    </div>
@endsection
