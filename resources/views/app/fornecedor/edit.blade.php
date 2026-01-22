@extends('app.layouts.basico')

@section('titulo', 'Editar Fornecedor')

@section('conteudo')
    <form action="{{ route('app.fornecedores.update', $fornecedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome *</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $fornecedor->nome) }}" required>
            @error('nome')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="site">Site</label>
            <input type="text" name="site" id="site" class="form-control" value="{{ old('site', $fornecedor->site) }}" placeholder="https://www.exemplo.com.br">
            @error('site')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="uf">UF *</label>
            <select name="uf" id="uf" class="form-control" required>
                <option value="">Selecione</option>
                <option value="AC" {{ old('uf', $fornecedor->uf) == 'AC' ? 'selected' : '' }}>Acre</option>
                <option value="AL" {{ old('uf', $fornecedor->uf) == 'AL' ? 'selected' : '' }}>Alagoas</option>
                <option value="AP" {{ old('uf', $fornecedor->uf) == 'AP' ? 'selected' : '' }}>Amapá</option>
                <option value="AM" {{ old('uf', $fornecedor->uf) == 'AM' ? 'selected' : '' }}>Amazonas</option>
                <option value="BA" {{ old('uf', $fornecedor->uf) == 'BA' ? 'selected' : '' }}>Bahia</option>
                <option value="CE" {{ old('uf', $fornecedor->uf) == 'CE' ? 'selected' : '' }}>Ceará</option>
                <option value="DF" {{ old('uf', $fornecedor->uf) == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                <option value="ES" {{ old('uf', $fornecedor->uf) == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                <option value="GO" {{ old('uf', $fornecedor->uf) == 'GO' ? 'selected' : '' }}>Goiás</option>
                <option value="MA" {{ old('uf', $fornecedor->uf) == 'MA' ? 'selected' : '' }}>Maranhão</option>
                <option value="MT" {{ old('uf', $fornecedor->uf) == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                <option value="MS" {{ old('uf', $fornecedor->uf) == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                <option value="MG" {{ old('uf', $fornecedor->uf) == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                <option value="PA" {{ old('uf', $fornecedor->uf) == 'PA' ? 'selected' : '' }}>Pará</option>
                <option value="PB" {{ old('uf', $fornecedor->uf) == 'PB' ? 'selected' : '' }}>Paraíba</option>
                <option value="PR" {{ old('uf', $fornecedor->uf) == 'PR' ? 'selected' : '' }}>Paraná</option>
                <option value="PE" {{ old('uf', $fornecedor->uf) == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                <option value="PI" {{ old('uf', $fornecedor->uf) == 'PI' ? 'selected' : '' }}>Piauí</option>
                <option value="RJ" {{ old('uf', $fornecedor->uf) == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                <option value="RN" {{ old('uf', $fornecedor->uf) == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                <option value="RS" {{ old('uf', $fornecedor->uf) == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                <option value="RO" {{ old('uf', $fornecedor->uf) == 'RO' ? 'selected' : '' }}>Rondônia</option>
                <option value="RR" {{ old('uf', $fornecedor->uf) == 'RR' ? 'selected' : '' }}>Roraima</option>
                <option value="SC" {{ old('uf', $fornecedor->uf) == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                <option value="SP" {{ old('uf', $fornecedor->uf) == 'SP' ? 'selected' : '' }}>São Paulo</option>
                <option value="SE" {{ old('uf', $fornecedor->uf) == 'SE' ? 'selected' : '' }}>Sergipe</option>
                <option value="TO" {{ old('uf', $fornecedor->uf) == 'TO' ? 'selected' : '' }}>Tocantins</option>
            </select>
            @error('uf')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $fornecedor->email) }}" required>
            @error('email')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('app.fornecedores') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
