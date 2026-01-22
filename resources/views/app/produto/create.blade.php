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
