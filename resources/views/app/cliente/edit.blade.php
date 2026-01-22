@extends('app.layouts.basico')

@section('titulo', 'Editar Cliente')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nome" class="form-label required">Nome Completo</label>
                        <input type="text"
                               name="nome"
                               id="nome"
                               class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome', $cliente->nome) }}"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="cpf" class="form-label required">CPF</label>
                        <input type="text"
                               name="cpf"
                               id="cpf"
                               class="form-control @error('cpf') is-invalid @enderror"
                               value="{{ old('cpf', $cliente->cpf) }}"
                               placeholder="000.000.000-00"
                               maxlength="14"
                               required>
                        @error('cpf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label required">E-mail</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $cliente->email) }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telefone" class="form-label required">Telefone</label>
                        <input type="text"
                               name="telefone"
                               id="telefone"
                               class="form-control @error('telefone') is-invalid @enderror"
                               value="{{ old('telefone', $cliente->telefone) }}"
                               placeholder="(00) 00000-0000"
                               required>
                        @error('telefone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text"
                       name="endereco"
                       id="endereco"
                       class="form-control @error('endereco') is-invalid @enderror"
                       value="{{ old('endereco', $cliente->endereco) }}"
                       placeholder="Rua, número, complemento">
                @error('endereco')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text"
                               name="cidade"
                               id="cidade"
                               class="form-control @error('cidade') is-invalid @enderror"
                               value="{{ old('cidade', $cliente->cidade) }}">
                        @error('cidade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="uf" class="form-label">UF</label>
                        <select name="uf" id="uf" class="form-select @error('uf') is-invalid @enderror">
                            @include('app._partials.uf-options', ['selected' => old('uf', $cliente->uf)])
                        </select>
                        @error('uf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text"
                               name="cep"
                               id="cep"
                               class="form-control @error('cep') is-invalid @enderror"
                               value="{{ old('cep', $cliente->cep) }}"
                               placeholder="00000-000"
                               maxlength="10">
                        @error('cep')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-save me-2"></i>Atualizar Cliente
                </button>
                <a href="{{ route('app.clientes') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
