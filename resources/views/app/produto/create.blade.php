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

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fornecedor_id" class="form-label">Fornecedor</label>
                        <select name="fornecedor_id"
                                id="fornecedor_id"
                                class="form-control @error('fornecedor_id') is-invalid @enderror">
                            <option value="">Selecione um fornecedor</option>
                            @foreach($fornecedores as $fornecedor)
                                <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>
                                    {{ $fornecedor->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('fornecedor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="unidade_id" class="form-label">Unidade</label>
                        <select name="unidade_id"
                                id="unidade_id"
                                class="form-control @error('unidade_id') is-invalid @enderror">
                            <option value="">Selecione uma unidade</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ old('unidade_id', 1) == $unidade->id ? 'selected' : '' }}>
                                    {{ $unidade->unidade }} - {{ $unidade->descricao }}
                                </option>
                            @endforeach
                        </select>
                        @error('unidade_id')
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
