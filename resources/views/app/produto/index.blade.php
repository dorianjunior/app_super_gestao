@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <!-- Botão Adicionar -->
    <div class="mb-4">
        <a href="{{ route('app.produtos.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i>Novo Produto
        </a>
    </div>

    <!-- Tabela de Produtos -->
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th style="width: 100px;">Peso (kg)</th>
                        <th style="width: 120px;">Preço</th>
                        <th style="width: 100px;">Est. Mín</th>
                        <th style="width: 100px;">Est. Máx</th>
                        <th style="width: 180px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $produto)
                        <tr>
                            <td><span class="badge bg-secondary">#{{ $produto->id }}</span></td>
                            <td><strong>{{ $produto->nome }}</strong></td>
                            <td><small class="text-muted">{{ Str::limit($produto->descricao, 50) ?? '-' }}</small></td>
                            <td>{{ $produto->peso ?? '-' }}</td>
                            <td><span class="text-success fw-bold">R$ {{ number_format($produto->preço_venda, 2, ',', '.') }}</span></td>
                            <td>{{ $produto->estoque_minimo }}</td>
                            <td>{{ $produto->estoque_maximo }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('app.produtos.edit', $produto->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('app.produtos.destroy', $produto->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
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
                            <td colspan="8">
                                <div class="table-empty-state">
                                    <i class="fas fa-box-open"></i>
                                    <p>Nenhum produto cadastrado.</p>
                                    <a href="{{ route('app.produtos.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Cadastrar Primeiro Produto
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($produtos->hasPages())
            <div class="d-flex justify-content-center">
                {{ $produtos->links() }}
            </div>
        @endif
    </div>
@endsection
