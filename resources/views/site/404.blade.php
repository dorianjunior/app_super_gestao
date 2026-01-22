@extends('site.layouts.basico')

@section('titulo', '404 - Página Não Encontrada')

@section('conteudo')
<section class="error-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-content">
                    <!-- Ícone de Erro -->
                    <div class="error-icon mb-4">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>

                    <!-- Código 404 -->
                    <h1 class="error-code">404</h1>

                    <!-- Título -->
                    <h2 class="error-title">Página Não Encontrada</h2>

                    <!-- Mensagem -->
                    <p class="error-message">
                        Ops! A página que você está procurando não existe ou foi movida.
                    </p>

                    <!-- Botões de Ação -->
                    <div class="error-actions">
                        <button onclick="window.history.back()" class="btn btn-primary btn-lg me-2">
                            <i class="fas fa-arrow-left me-2"></i>Voltar
                        </button>
                        <a href="{{ route('site.index') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-home me-2"></i>Ir para Home
                        </a>
                    </div>

                    <!-- Informações Adicionais -->
                    <div class="error-help mt-5">
                        <p class="mb-2">Precisa de ajuda?</p>
                        <a href="{{ route('site.contato') }}" class="text-primary">
                            <i class="fas fa-envelope me-1"></i>Entre em contato conosco
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .error-section {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        padding: 60px 0;
    }

    .error-content {
        background: white;
        padding: 60px 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,.1);
    }

    .error-icon {
        font-size: 80px;
        color: #ffc107;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    .error-code {
        font-size: 120px;
        font-weight: 800;
        color: #007bff;
        line-height: 1;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,123,255,.2);
    }

    .error-title {
        font-size: 36px;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 20px;
    }

    .error-message {
        font-size: 18px;
        color: #6c757d;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .error-actions {
        margin-bottom: 30px;
    }

    .error-actions .btn {
        padding: 12px 35px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .error-actions .btn-primary {
        background: #007bff;
        border: none;
        box-shadow: 0 4px 15px rgba(0,123,255,.3);
    }

    .error-actions .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,123,255,.4);
    }

    .error-actions .btn-outline-primary {
        border: 2px solid #007bff;
        color: #007bff;
    }

    .error-actions .btn-outline-primary:hover {
        background: #007bff;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,123,255,.3);
    }

    .error-help {
        padding-top: 30px;
        border-top: 1px solid #dee2e6;
        color: #6c757d;
    }

    .error-help a {
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }

    .error-help a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .error-content {
            padding: 40px 20px;
        }

        .error-code {
            font-size: 80px;
        }

        .error-title {
            font-size: 28px;
        }

        .error-message {
            font-size: 16px;
        }

        .error-actions .btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .error-actions .btn.me-2 {
            margin-right: 0 !important;
        }
    }
</style>
@endsection
