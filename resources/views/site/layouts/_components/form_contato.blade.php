{{ $slot }}

<form action="{{ route('site.contato.salvar') }}" method="post" class="{{ $classe }}">
    @csrf
    <div class="mb-3">
        <input name="nome" type="text" class="form-control" placeholder="Nome" value="{{ old('nome') }}" required>
    </div>

    <div class="mb-3">
        <input name="telefone" type="text" class="form-control" placeholder="Telefone" value="{{ old('telefone') }}" required>
    </div>

    <div class="mb-3">
        <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <select name="motivo_contato" class="form-select" required>
            <option value="">Qual o motivo do contato?</option>
            <option value="1" {{ old('motivo_contato') == '1' ? 'selected' : '' }}>Dúvida</option>
            <option value="2" {{ old('motivo_contato') == '2' ? 'selected' : '' }}>Elogio</option>
            <option value="3" {{ old('motivo_contato') == '3' ? 'selected' : '' }}>Reclamação</option>
        </select>
    </div>

    <div class="mb-3">
        <textarea name="mensagem" class="form-control" placeholder="Preencha aqui a sua mensagem" rows="4" required>{{ old('mensagem') }}</textarea>
    </div>

    <button type="submit" class="btn btn-submit">
        <i class="fas fa-paper-plane me-2"></i>ENVIAR MENSAGEM
    </button>
</form>
