@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin: auto;">
                <form action="{{ route('login.autenticar') }}" method="POST">
                    @csrf

                    @if($errors->has('error'))
                        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; border: 1px solid #f5c6cb;">
                            {{ $errors->first('error') }}
                        </div>
                    @endif

                    <input
                        name="email"
                        type="email"
                        placeholder="E-mail"
                        class="borda-preta"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span style="color: red; font-size: 12px;">{{ $message }}</span>
                    @enderror
                    <br>

                    <input
                        name="password"
                        type="password"
                        placeholder="Senha"
                        class="borda-preta"
                        required>
                    @error('password')
                        <span style="color: red; font-size: 12px;">{{ $message }}</span>
                    @enderror
                    <br>

                    <div style="margin-bottom: 10px;">
                        <label style="color: #333; font-size: 14px;">
                            <input type="checkbox" name="remember"> Lembrar-me
                        </label>
                    </div>

                    <button type="submit" class="borda-preta">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
