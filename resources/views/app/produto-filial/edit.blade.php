@extends('app.layouts.basico')

@section('titulo', 'Editar Preços e Estoque')

@section('conteudo')
    <div class="form-card">
        <!-- Info do Produto e Filial -->
        <div class="alert alert-primary mb-4">
            <div class="row">
                <div class="col-md-6">
                    <strong><i class="fas fa-store me-2"></i>Filial:</strong> {{ $produtoFilial->filial->filial }}
                </div>
                <div class="col-md-6">
                    <strong><i class="fas fa-box me-2"></i>Produto:</strong> {{ $produtoFilial->produto->nome }}
                </div>
            </div>
        </div>

        <form action="{{ route('app.produtos-filiais.update', $produtoFilial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="preco_venda" class="form-label required">Preço de Venda</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number"
                                   name="preco_venda"
                                   id="preco_venda"
                                   class="form-control @error('preco_venda') is-invalid @enderror"
                                   value="{{ old('preco_venda', $produtoFilial->preco_venda) }}"
                                   min="0.01"
                                   step="0.01"
                                   required>
                        </div>
                        @error('preco_venda')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="estoque_minimo" class="form-label required">Estoque Mínimo</label>
                        <input type="number"
                               name="estoque_minimo"
                               id="estoque_minimo"
                               class="form-control @error('estoque_minimo') is-invalid @enderror"
                               value="{{ old('estoque_minimo', $produtoFilial->estoque_minimo) }}"
                               min="0"
                               step="1"
                               required>
                        @error('estoque_minimo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="estoque_maximo" class="form-label required">Estoque Máximo</label>
                        <input type="number"
                               name="estoque_maximo"
                               id="estoque_maximo"
                               class="form-control @error('estoque_maximo') is-invalid @enderror"
                               value="{{ old('estoque_maximo', $produtoFilial->estoque_maximo) }}"
                               min="0"
                               step="1"
                               required>
                        @error('estoque_maximo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Atualizar
                </button>
                <a href="{{ route('app.produtos-filiais') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
