@extends('app.layouts.basico')

@section('titulo', 'Novo Fornecedor')

@section('conteudo')
    <div class="form-card">
        <form action="{{ route('app.fornecedores.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
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

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="site" class="form-label">Site</label>
                        <input type="text"
                               name="site"
                               id="site"
                               class="form-control @error('site') is-invalid @enderror"
                               value="{{ old('site') }}"
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
                <option value="">Selecione</option>
                <option value="AC" {{ old('uf') == 'AC' ? 'selected' : '' }}>Acre</option>
                <option value="AL" {{ old('uf') == 'AL' ? 'selected' : '' }}>Alagoas</option>
                <option value="AP" {{ old('uf') == 'AP' ? 'selected' : '' }}>Amapá</option>
                <option value="AM" {{ old('uf') == 'AM' ? 'selected' : '' }}>Amazonas</option>
                <option value="BA" {{ old('uf') == 'BA' ? 'selected' : '' }}>Bahia</option>
                <option value="CE" {{ old('uf') == 'CE' ? 'selected' : '' }}>Ceará</option>
                <option value="DF" {{ old('uf') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                <option value="ES" {{ old('uf') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                <option value="GO" {{ old('uf') == 'GO' ? 'selected' : '' }}>Goiás</option>
                <option value="MA" {{ old('uf') == 'MA' ? 'selected' : '' }}>Maranhão</option>
                <option value="MT" {{ old('uf') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                <option value="MS" {{ old('uf') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                <option value="MG" {{ old('uf') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                <option value="PA" {{ old('uf') == 'PA' ? 'selected' : '' }}>Pará</option>
                <option value="PB" {{ old('uf') == 'PB' ? 'selected' : '' }}>Paraíba</option>
                <option value="PR" {{ old('uf') == 'PR' ? 'selected' : '' }}>Paraná</option>
                <option value="PE" {{ old('uf') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                <option value="PI" {{ old('uf') == 'PI' ? 'selected' : '' }}>Piauí</option>
                <option value="RJ" {{ old('uf') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                <option value="RN" {{ old('uf') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                <option value="RS" {{ old('uf') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                <option value="RO" {{ old('uf') == 'RO' ? 'selected' : '' }}>Rondônia</option>
                <option value="RR" {{ old('uf') == 'RR' ? 'selected' : '' }}>Roraima</option>
                <option value="SC" {{ old('uf') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                <option value="SP" {{ old('uf') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                <option value="SE" {{ old('uf') == 'SE' ? 'selected' : '' }}>Sergipe</option>
                            <option value="TO" {{ old('uf') == 'TO' ? 'selected' : '' }}>Tocantins</option>
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
                               value="{{ old('email') }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Salvar Fornecedor
                </button>
                <a href="{{ route('app.fornecedores') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
