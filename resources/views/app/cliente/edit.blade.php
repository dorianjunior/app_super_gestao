@extends('app.layouts.basico')

@section('titulo', 'Editar Cliente')

@section('conteudo')
    <form action="{{ route('app.clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome *</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
            @error('nome')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cpf">CPF * (formato: 000.000.000-00)</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $cliente->cpf) }}" placeholder="000.000.000-00" maxlength="14" required>
            @error('cpf')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email) }}" required>
            @error('email')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="telefone">Telefone *</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}" placeholder="(00) 00000-0000" required>
            @error('telefone')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $cliente->endereco) }}">
            @error('endereco')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="{{ old('cidade', $cliente->cidade) }}">
            @error('cidade')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <select name="uf" id="uf" class="form-control">
                <option value="">Selecione</option>
                <option value="AC" {{ old('uf', $cliente->uf) == 'AC' ? 'selected' : '' }}>Acre</option>
                <option value="AL" {{ old('uf', $cliente->uf) == 'AL' ? 'selected' : '' }}>Alagoas</option>
                <option value="AP" {{ old('uf', $cliente->uf) == 'AP' ? 'selected' : '' }}>Amapá</option>
                <option value="AM" {{ old('uf', $cliente->uf) == 'AM' ? 'selected' : '' }}>Amazonas</option>
                <option value="BA" {{ old('uf', $cliente->uf) == 'BA' ? 'selected' : '' }}>Bahia</option>
                <option value="CE" {{ old('uf', $cliente->uf) == 'CE' ? 'selected' : '' }}>Ceará</option>
                <option value="DF" {{ old('uf', $cliente->uf) == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                <option value="ES" {{ old('uf', $cliente->uf) == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                <option value="GO" {{ old('uf', $cliente->uf) == 'GO' ? 'selected' : '' }}>Goiás</option>
                <option value="MA" {{ old('uf', $cliente->uf) == 'MA' ? 'selected' : '' }}>Maranhão</option>
                <option value="MT" {{ old('uf', $cliente->uf) == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                <option value="MS" {{ old('uf', $cliente->uf) == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                <option value="MG" {{ old('uf', $cliente->uf) == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                <option value="PA" {{ old('uf', $cliente->uf) == 'PA' ? 'selected' : '' }}>Pará</option>
                <option value="PB" {{ old('uf', $cliente->uf) == 'PB' ? 'selected' : '' }}>Paraíba</option>
                <option value="PR" {{ old('uf', $cliente->uf) == 'PR' ? 'selected' : '' }}>Paraná</option>
                <option value="PE" {{ old('uf', $cliente->uf) == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                <option value="PI" {{ old('uf', $cliente->uf) == 'PI' ? 'selected' : '' }}>Piauí</option>
                <option value="RJ" {{ old('uf', $cliente->uf) == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                <option value="RN" {{ old('uf', $cliente->uf) == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                <option value="RS" {{ old('uf', $cliente->uf) == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                <option value="RO" {{ old('uf', $cliente->uf) == 'RO' ? 'selected' : '' }}>Rondônia</option>
                <option value="RR" {{ old('uf', $cliente->uf) == 'RR' ? 'selected' : '' }}>Roraima</option>
                <option value="SC" {{ old('uf', $cliente->uf) == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                <option value="SP" {{ old('uf', $cliente->uf) == 'SP' ? 'selected' : '' }}>São Paulo</option>
                <option value="SE" {{ old('uf', $cliente->uf) == 'SE' ? 'selected' : '' }}>Sergipe</option>
                <option value="TO" {{ old('uf', $cliente->uf) == 'TO' ? 'selected' : '' }}>Tocantins</option>
            </select>
            @error('uf')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $cliente->cep) }}" placeholder="00000-000" maxlength="10">
            @error('cep')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('app.clientes') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
