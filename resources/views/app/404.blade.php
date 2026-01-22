@extends('app.layouts.basico')

@section('titulo', '404 - Página Não Encontrada')

@section('conteudo')
<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-card">
                        <!-- Ícone de Erro -->
                        <div class="text-center mb-4">
                            <i class="fas fa-exclamation-circle error-icon-admin"></i>
                        </div>

                        <!-- Código 404 -->
                        <h1 class="error-code-admin">404</h1>

                        <!-- Título -->
                        <h2 class="error-title-admin">Página Não Encontrada</h2>

                        <!-- Mensagem -->
                        <p class="error-message-admin">
                            A página que você está tentando acessar não existe ou foi removida.<br>
                            Você ainda está logado no sistema.
                        </p>

                        <!-- Status de Login -->
                        <div class="login-status">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Você está logado como: <strong>{{ Auth::user()->name }}</strong></span>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="error-actions-admin">
                            <button onclick="window.history.back()" class="btn btn-secondary btn-lg me-2">
                                <i class="fas fa-arrow-left me-2"></i>Voltar
                            </button>
                            <a href="{{ route('app.home') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-th-large me-2"></i>Dashboard
                            </a>
                        </div>

                        <!-- Links Úteis -->
                        <div class="quick-links mt-5">
                            <h5 class="mb-3">Acesso Rápido</h5>
                            <div class="row">
                                <div class="col-md-3 col-6 mb-3">
                                    <a href="{{ route('app.fornecedores') }}" class="quick-link-item">
                                        <i class="fas fa-building"></i>
                                        <span>Fornecedores</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <a href="{{ route('app.produtos') }}" class="quick-link-item">
                                        <i class="fas fa-box"></i>
                                        <span>Produtos</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <a href="{{ route('app.clientes') }}" class="quick-link-item">
                                        <i class="fas fa-users"></i>
                                        <span>Clientes</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <a href="{{ route('app.filiais') }}" class="quick-link-item">
                                        <i class="fas fa-store"></i>
                                        <span>Filiais</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error-card {
        background: white;
        padding: 60px 40px;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,.08);
        text-align: center;
        margin-top: 30px;
    }

    .error-icon-admin {
        font-size: 100px;
        color: #ffc107;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    .error-code-admin {
        font-size: 120px;
        font-weight: 800;
        color: #007bff;
        line-height: 1;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,123,255,.2);
    }

    .error-title-admin {
        font-size: 32px;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 20px;
    }

    .error-message-admin {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .login-status {
        background: #e8f5e9;
        border: 1px solid #c8e6c9;
        border-radius: 10px;
        padding: 15px 20px;
        display: inline-flex;
        align-items: center;
        margin-bottom: 40px;
        font-size: 15px;
    }

    .error-actions-admin {
        margin-bottom: 40px;
    }

    .error-actions-admin .btn {
        padding: 12px 35px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        border: none;
    }

    .error-actions-admin .btn-primary {
        background: #007bff;
        box-shadow: 0 4px 15px rgba(0,123,255,.3);
    }

    .error-actions-admin .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,123,255,.4);
    }

    .error-actions-admin .btn-secondary {
        background: #6c757d;
        box-shadow: 0 4px 15px rgba(108,117,125,.3);
    }

    .error-actions-admin .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(108,117,125,.4);
    }

    .quick-links {
        padding-top: 40px;
        border-top: 2px solid #e9ecef;
    }

    .quick-links h5 {
        color: #343a40;
        font-weight: 700;
    }

    .quick-link-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 15px;
        background: #f8f9fa;
        border-radius: 10px;
        text-decoration: none;
        color: #495057;
        transition: all 0.3s ease;
        height: 100%;
    }

    .quick-link-item:hover {
        background: #007bff;
        color: white;
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,123,255,.3);
    }

    .quick-link-item i {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .quick-link-item span {
        font-size: 14px;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .error-card {
            padding: 40px 20px;
        }

        .error-code-admin {
            font-size: 80px;
        }

        .error-title-admin {
            font-size: 24px;
        }

        .error-message-admin {
            font-size: 14px;
        }

        .error-actions-admin .btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .error-actions-admin .btn.me-2 {
            margin-right: 0 !important;
        }

        .login-status {
            font-size: 13px;
            padding: 12px 15px;
        }
    }
</style>
@endsection
