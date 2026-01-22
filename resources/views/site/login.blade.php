@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="login-container">
        <div class="login-card">
            <h1><i class="fas fa-lock me-2"></i>Login</h1>
            
            @if($errors->has('error'))
                <div class="alert alert-danger alert-modern" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('error') }}
                </div>
            @endif

            <form action="{{ route('login.autenticar') }}" method="POST" class="form-modern">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="seu@email.com"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Lembrar-me
                    </label>
                </div>

                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-sign-in-alt me-2"></i>ENTRAR
                </button>
            </form>
        </div>
    </div>

    @include('site.layouts._partials.footer')
@endsection
