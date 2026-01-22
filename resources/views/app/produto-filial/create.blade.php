@extends('app.layouts.basico')

@section('titulo', 'Adicionar Produto à Filial')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.produtos-filiais.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="filial_id" class="form-label required">Filial</label>
                        <select name="filial_id"
                                id="filial_id"
                                class="form-select @error('filial_id') is-invalid @enderror"
                                required>
                            <option value="">Selecione uma filial...</option>
                            @foreach($filiais as $filial)
                                <option value="{{ $filial->id }}" {{ old('filial_id', request('filial_id')) == $filial->id ? 'selected' : '' }}>
                                    {{ $filial->filial }}
                                </option>
                            @endforeach
                        </select>
                        @error('filial_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="produto_id" class="form-label required">Produto</label>
                        <select name="produto_id"
                                id="produto_id"
                                class="form-select @error('produto_id') is-invalid @enderror"
                                required>
                            <option value="">Selecione um produto...</option>
                            @foreach($produtos as $produto)
                                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                                    {{ $produto->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('produto_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

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
                                   value="{{ old('preco_venda') }}"
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
                               value="{{ old('estoque_minimo', 1) }}"
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
                               value="{{ old('estoque_maximo', 1) }}"
                               min="0"
                               step="1"
                               required>
                        @error('estoque_maximo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Dica:</strong> Você está associando um produto a uma filial específica com seu preço e níveis de estoque.
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Salvar
                </button>
                <a href="{{ route('app.produtos-filiais') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
