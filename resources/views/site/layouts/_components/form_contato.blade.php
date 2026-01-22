{{ $slot }}

<form action="{{ route('site.contato.salvar') }}" method="post">
  @csrf
  <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}" required>
  <br>
  <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}" required>
  <br>
  <input name="email" type="email" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}" required>
  <br>
  <select name="motivo_contato" class="{{ $classe }}" required>
      <option value="">Qual o motivo do contato?</option>
      <option value="1" {{ old('motivo_contato') == '1' ? 'selected' : '' }}>Dúvida</option>
      <option value="2" {{ old('motivo_contato') == '2' ? 'selected' : '' }}>Elogio</option>
      <option value="3" {{ old('motivo_contato') == '3' ? 'selected' : '' }}>Reclamação</option>
  </select>
  <br>
  <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem" required>{{ old('mensagem') }}</textarea>
  <br>
  <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
