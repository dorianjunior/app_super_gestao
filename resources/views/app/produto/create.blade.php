@extends('app.layouts.basico')

@section('titulo', 'Novo Produto')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.produtos.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nome" class="form-label required">Nome</label>
                        <input type="text"
                               name="nome"
                               id="nome"
                               class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome') }}"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number"
                               name="peso"
                               id="peso"
                               class="form-control @error('peso') is-invalid @enderror"
                               value="{{ old('peso') }}"
                               min="0"
                               step="1">
                        @error('peso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao"
                          id="descricao"
                          class="form-control @error('descricao') is-invalid @enderror"
                          rows="4"
                          placeholder="Descreva as características do produto...">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="preço_venda" class="form-label required">Preço de Venda</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number"
                                   name="preço_venda"
                                   id="preço_venda"
                                   class="form-control @error('preço_venda') is-invalid @enderror"
                                   value="{{ old('preço_venda') }}"
                                   min="0.01"
                                   step="0.01"
                                   required>
                        </div>
                        @error('preço_venda')
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

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Salvar Produto
                </button>
                <a href="{{ route('app.produtos') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
