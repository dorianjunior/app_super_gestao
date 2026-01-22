@extends('app.layouts.basico')

@section('titulo', 'Editar Fornecedor')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.fornecedores.update', $fornecedor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label required">Nome</label>
                        <input type="text"
                               name="nome"
                               id="nome"
                               class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome', $fornecedor->nome) }}"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="site" class="form-label">Site</label>
                        <input type="text"
                               name="site"
                               id="site"
                               class="form-control @error('site') is-invalid @enderror"
                               value="{{ old('site', $fornecedor->site) }}"
                               placeholder="https://www.exemplo.com.br">
                        @error('site')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="uf" class="form-label required">UF</label>
                        <select name="uf" id="uf" class="form-select @error('uf') is-invalid @enderror" required>
                            @include('app._partials.uf-options', ['selected' => old('uf', $fornecedor->uf)])
                        </select>
                        @error('uf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="email" class="form-label required">E-mail</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $fornecedor->email) }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Atualizar Fornecedor
                </button>
                <a href="{{ route('app.fornecedores') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
