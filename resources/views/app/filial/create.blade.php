@extends('app.layouts.basico')

@section('titulo', 'Nova Filial')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.filiais.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="filial" class="form-label required">Nome da Filial</label>
                <input type="text"
                       name="filial"
                       id="filial"
                       class="form-control @error('filial') is-invalid @enderror"
                       value="{{ old('filial') }}"
                       placeholder="Ex: Filial Centro, Filial Norte, Matriz..."
                       required
                       maxlength="30">
                @error('filial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Máximo de 30 caracteres</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Salvar Filial
                </button>
                <a href="{{ route('app.filiais') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
