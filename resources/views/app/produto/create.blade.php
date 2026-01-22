@extends('app.layouts.basico')

@section('titulo', 'Novo Produto')

@section('conteudo')
    <form action="{{ route('app.produtos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome *</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            @error('nome')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
            @error('descricao')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="peso">Peso (kg)</label>
            <input type="number" name="peso" id="peso" class="form-control" value="{{ old('peso') }}" min="0" step="1">
            @error('peso')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="preço_venda">Preço de Venda *</label>
            <input type="number" name="preço_venda" id="preço_venda" class="form-control" value="{{ old('preço_venda') }}" min="0.01" step="0.01" required>
            @error('preço_venda')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="estoque_minimo">Estoque Mínimo *</label>
            <input type="number" name="estoque_minimo" id="estoque_minimo" class="form-control" value="{{ old('estoque_minimo', 1) }}" min="0" step="1" required>
            @error('estoque_minimo')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="estoque_maximo">Estoque Máximo *</label>
            <input type="number" name="estoque_maximo" id="estoque_maximo" class="form-control" value="{{ old('estoque_maximo', 1) }}" min="0" step="1" required>
            @error('estoque_maximo')
                <span style="color: red; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('app.produtos') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
